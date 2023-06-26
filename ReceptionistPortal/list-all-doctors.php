<?php

error_reporting(0);

include 'db.php';

// 1. Capture the contents of the db (sql)
$sql = "SELECT * FROM doctors";

// $conn from the db.php file
$result = $conn->query($sql);
// $results will be an array holding the info from the sql statement

// 2. Display the contents inside doctors.php in their cards (loop)
while ($row = $result->fetch_assoc()) {

    echo '<div class="card shadow rounded m-3 mx-auto" style="width: 20rem;">';
    echo '<div class="card-body mx-auto">';

    //If the id is the same as the id of the row that has been clicked
    if ($row['Doctors_ID'] == $_GET['Doctors_ID']) {

        echo '<form class="form-inline m-2" id="form-update-img" action="" enctype="multipart/form-data" method="post">';
        echo '<div class="upload">';
        $id = $row["Doctors_ID"];
        $name = $row["Name"];
        $surname = $row["Surname"];
        $image = $row["ProfileImage"];
        echo '<label for="Picture">Profile Image:</label>';
        echo '<img src="profile_img/' . $image . '" class="img-fluid rounded-circle" alt="Profile Image" title="' . $image . '">';
        // echo '<img src="img/' . $row['Picture'] . '" class="img-fluid rounded-circle" alt="Profile Image" title="' . $row['Picture'] . '">';
        echo '<div class="round">';
        echo '<input type="hidden" name="id" value="' . $id . '">';
        echo '<input type="hidden" name="name" value="' . $name . '">';
        echo '<input type="hidden" name="surname" value="' . $surname . '">';
        echo '<input type="file" class="form-control-file" id="image" name="image" accept = ".jpg, .jpeg, .png">';
        echo '<i class="fa fa-camera" style="color: #fff;"></i>';
        echo '</div>';
        echo '</div>';
        echo '</form>';

        echo '<form class="form-inline m-2" action="update-doctor.php" method="POST">';
        echo '<label for="Name">Name:</label>';
        echo '<h5 class="card-title"><input type="text" class="form-control" name="Name" value="' . $row['Name'] . '" required></h5>';
        echo '<label for="Surname">Surname:</label>';
        echo '<h5 class="card-title"><input type="text" class="form-control" name="Surname" value="' . $row['Surname'] . '" required></h5>';
        // echo '<h6 class="card-subtitle mb-2 text-muted">' . $row['ID_Number'] . '</h6>';
        echo '<label for="Specialisation">Specialisation:</label>';
        echo '<p class="card-text"><input type="text" class="form-control" name="Specialisation" value="' . $row['Specialisation'] . '" required></p>';
        echo '<label for="Rating">Rating:</label>';
        echo '<p class="card-text"><input type="number" step="0.1" min="0" max="5" class="form-control" name="Rating" value="' . $row['Rating'] . '" required></p>';
        echo '<label for="DoB">DoB:</label>';
        echo '<input type="date" class="form-control" name="DoB" value="' . $row['DoB'] . '" required>';
        echo '<label for="Gender">Gender:</label>';
        echo '<p class="card-text"><input type="text" class="form-control" name="Gender" value="' . $row['Gender'] . '" required></p>';
        echo '<label for="Email">Email:</label>';
        echo '<p class="card-text"><input type="email" class="form-control" name="Email" value="' . $row['Email'] . '" required></p>';
        echo '<label for="PhoneNumber">Phone:</label>';
        echo '<p class="card-text"><input type="text" class="form-control" name="PhoneNumber" value="' . $row['PhoneNumber'] . '" required></p>';

        echo '<div class="btn-group" role="group" aria-label="Actions">';
        echo '<button type="submit" class="btn btn-success">Save</button>';
        echo '<input type="hidden" name="Doctors_ID" value="' . $row['Doctors_ID'] . '">';
        echo '</form>';

    } else {

        echo '<div class="upload grow">';
        echo '<img src="profile_img/' . $row['ProfileImage'] . '" class="img-fluid rounded-circle" alt="Profile Image" title="' . $row['ProfileImage'] . '">';
        echo '</div>';

        echo '<h4 class="card-title bbold">' . $row['Name'] . ' ' . $row['Surname'] . '</h4>';
        echo '<p class="card-subtitle mb-2 text-muted">' . $row['Email'] . '</p>';
        // echo '<h6 class="card-subtitle mb-2 text-muted">' . $row['IDNumber'] . '</h6>';
        echo '<p class="card-text">Specialisation: ' . $row['Specialisation'] . '</p>';
        // echo '<p class="card-text">DoB: ' . $row['DoB'] . '</p>';

        $currentDate = date_create();
        $birthdate = date_create($row['DoB']);
        $age = $birthdate->diff($currentDate);
        $ageInYears = $age->y;
        // echo '<p class="card-text">Age: ' . $ageInYears . ' years</p>';

        // echo '<p class="card-text">Gender: ' . $row['Gender'] . '</p>';
        echo '<p class="card-text">Phone: ' . $row['PhoneNumber'] . '</p>';
        echo '<div class="btn-group" role="group" aria-label="Actions">';
        // echo '<a class="btn btn-warning" onclick="toggleForm()" href="doctors.php?Doctors_ID=' . $row['Doctors_ID'] . '" role="button">Edit</a>';
        echo '<a class="btn btn-warning" onclick="toggleForm()" href="?action=edit&Doctors_ID=' . $row['Doctors_ID'] . '" role="button">Edit</a>';

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
    echo '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalView" id="' . $row['Doctors_ID'] . '" onClick="showDetailsDoctor(this);">';
    echo 'View';
    echo '</button>';

    echo '<a class="btn btn-danger" href="delete-doctor.php?Doctors_ID=' . $row['Doctors_ID'] . '" role="button">Delete</a>';

    // echo '<a href="javascript:void(0);" onclick="confirmation(' . $row['Name'] . ', ' . $row['Surname'] . ', ' . $row['Doctors_ID'] . ');">Delete</a>';
    // echo '<a href="javascript:void(0);" onclick="return confirmation(' . $row['Name'] . ', ' . $row['Surname'] . ', ' . $row['Doctors_ID'] . ');" role="button">Delete</a>';
    // echo '<a href="delete-doctor.php?Doctors_ID=' . $row['Doctors_ID'] . '" onclick="return confirm("Are you sure to delete?")">Delete</a>';

    echo '</div>';
    echo '</div>';
    echo '</div>';

}
;

$conn->close();

?>