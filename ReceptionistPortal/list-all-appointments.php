<?php

error_reporting(0);

include 'db.php';

// 1. Capture the contents of the db (sql)
$sql = "SELECT * FROM appointments ORDER BY AppointmentDate ASC";

// $conn from the db.php file
$result = $conn->query($sql);
// $results will be an array holding the info from the sql statement

// 2. Display the contents
while ($row = $result->fetch_assoc()) {

    // Query to fetch a single record
    $sql2 = "SELECT Name FROM doctors WHERE Doctors_ID = '$row[DoctorsID]' LIMIT 1";

    // Execute the query
    $result2 = $conn->query($sql2);

    if ($result2->num_rows > 0) {
        // Fetch the row
        $row2 = $result2->fetch_assoc();

        // Assign the column value to a variable
        $DoctorName = $row2['Name'];

    } else {
        echo "No records found.";
    }

    // Query to fetch a single record
    $sql3 = "SELECT Name FROM patients WHERE Patients_ID = '$row[PatientsID]' LIMIT 1";

    // Execute the query
    $result3 = $conn->query($sql3);

    if ($result3->num_rows > 0) {
        // Fetch the row
        $row3 = $result3->fetch_assoc();

        // Assign the column value to a variable
        $PatientName = $row3['Name'];

    } else {
        echo "No records found.";
    }

    // Query to fetch a single record
    $sql4 = "SELECT Name FROM receptionists WHERE Receptionists_ID = '$row[BookedByReceptionistID]' LIMIT 1";

    // Execute the query
    $result4 = $conn->query($sql4);

    if ($result4->num_rows > 0) {
        // Fetch the row
        $row4 = $result4->fetch_assoc();

        // Assign the column value to a variable
        $ReceptionistName = $row4['Name'];

    } else {
        echo "No records found.";
    }

    echo '<tr>';

    //If the id is the same as the id of the row that has been clicked
    if ($row['Appointments_ID'] == $_GET['Appointments_ID']) {

        echo '<form class="form-inline m-2" action="update-appointment.php" method="POST">';
        echo '<td><input type="number" class="form-control" name="PatientsID" value="' . $row['PatientsID'] . '" required></td>';
        echo '<td><input type="number" class="form-control" name="DoctorsID" value="' . $row['DoctorsID'] . '" required></td>';
        echo '<td><input type="date" class="form-control" name="AppointmentDate" value="' . $row['AppointmentDate'] . '" required></td>';
        echo '<td><input type="time" class="form-control" name="AppointmentTime" value="' . $row['AppointmentTime'] . '" required></td>';
        echo '<td><input type="number" class="form-control" name="DurationMinutes" value="' . $row['DurationMinutes'] . '" required></td>';
        echo '<td><input type="text" class="form-control" name="ReasonForAppointment" value="' . $row['ReasonForAppointment'] . '" required></td>';
        echo '<td><input type="number" class="form-control" name="BookedByReceptionistID" value="' . $row['BookedByReceptionistID'] . '" required></td>';
        echo '<td>';
        echo '<button type="submit" class="btn btn-success btn-sm" title="Save">Save</button>';
        echo '<input type="hidden" name="Appointments_ID" value="' . $row['Appointments_ID'] . '">';
        echo '</form>';

    } else {
        echo '<td>' . $PatientName . '</td>';
        echo '<td>' . $DoctorName . '</td>';
        echo '<td>' . $row['AppointmentDate'] . '</td>';
        echo '<td>' . $row['AppointmentTime'] . '</td>';
        echo '<td>' . $row['DurationMinutes'] . '</td>';
        echo '<td>' . $row['ReasonForAppointment'] . '</td>';
        echo '<td>' . $ReceptionistName . '</td>';

        echo '<td>';
        echo '<a class="btn btn-info btn-sm" title="Edit" href="appointments.php?Appointments_ID=' . $row['Appointments_ID'] . '" role="button">Edit</a>';

        echo '
        <script>
            window.addEventListener("beforeunload", function() {
                localStorage.setItem("scrollPos", window.pageYOffset);
            });

            window.addEventListener("load", function() {
                var scrollPos = localStorage.getItem("scrollPos");
                if (scrollPos) {
                    window.scrollTo(0, scrollPos);
                    localStorage.removeItem("scrollPos");
                }
            });
        </script>';


    }

    echo '<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#ModalView" id="' . $row['Appointments_ID'] . '" onClick="showDetailsAppointments(this);" title="View">View</button>';
    echo '<a class="btn btn-danger btn-sm" href="delete-appointment.php?Appointments_ID=' . $row['Appointments_ID'] . '" title="Delete" role="button">Delete</a>';

    echo '</td>';
    echo '</tr>';

}
;

$conn->close();

?>