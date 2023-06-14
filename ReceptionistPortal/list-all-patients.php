<?php

error_reporting(0);

include 'db.php';

// 1. Capture the contents of the db (sql)
$sql = "SELECT * FROM patients";

// $conn from the db.php file
$result = $conn->query($sql);
// $results will be an array holding the info from the sql statement

// 2. Display the contents inside doctors.php in their cards (loop)
while ($row = $result->fetch_assoc()) {

    echo '<tr>';

    //If the id is the same as the id of the row that has been clicked
    if ($row['Patients_ID'] == $_GET['Patients_ID']) {

        echo '<form class="form-inline m-2" action="update-patient.php" method="POST">';
        echo '<td><input type="text" class="form-control" name="Name" value="' . $row['Name'] . '" required></td>';
        echo '<td><input type="text" class="form-control" name="Surname" value="' . $row['Surname'] . '" required></td>';
        echo '<td><input type="number" class="form-control" name="IDNumber" value="' . $row['IDNumber'] . '" required></td>';
        echo '<td><input type="text" class="form-control" name="Gender" value="' . $row['Gender'] . '" required></td>';
        echo '<td><input type="date" class="form-control" name="DoB" value="' . $row['DoB'] . '" required></td>';
        echo '<td><input type="email" class="form-control" name="Email" value="' . $row['Email'] . '" required></td>';
        echo '<td><input type="number" class="form-control" name="PhoneNumber" value="' . $row['PhoneNumber'] . '" required></td>';
        echo '<td><input type="text" class="form-control" name="MedicalAidNumber" value="' . $row['MedicalAidNumber'] . '" required></td>';
        echo '<td>';
        echo '<button type="submit" class="btn btn-success btn-sm" title="Save"><i class="fas fa-save"></i></button>';
        echo '<input type="hidden" name="Patients_ID" value="' . $row['Patients_ID'] . '">';
        echo '</form>';

    } else {

        echo '<td>' . $row['Name'] . '</td>';
        echo '<td>' . $row['Surname'] . '</td>';
        echo '<td>' . $row['IDNumber'] . '</td>';
        echo '<td>' . $row['Gender'] . '</td>';
        echo '<td>' . $row['DoB'] . '</td>';
        echo '<td>' . $row['Email'] . '</td>';
        echo '<td>' . $row['PhoneNumber'] . '</td>';
        echo '<td>' . $row['MedicalAidNumber'] . '</td>';
        echo '<td>';
        echo '<a class="btn btn-info btn-sm" title="Edit" href="patients.php?Patients_ID=' . $row['Patients_ID'] . '" role="button"><i class="fas fa-edit"></i></a>';

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
    echo '<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#ModalView" id="' . $row['Patients_ID'] . '" onClick="showDetailsPatient(this);" title="View"><i class="fas fa-eye"></i></button>';
    echo '<a class="btn btn-danger btn-sm" href="delete-patient.php?Patients_ID=' . $row['Patients_ID'] . '" title="Delete" role="button"><i class="fas fa-trash-alt"></i></a>';
    echo '</td>';
    echo '</tr>';

}
;

$conn->close();

?>