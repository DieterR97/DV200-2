<?php

error_reporting(0);

session_start();

include 'db.php';

// 1. Capture the contents of the db (sql)
$sql = "SELECT * FROM receptionists WHERE Receptionists_ID = $_SESSION[Receptionists_ID]";

// $conn from the db.php file
$result = $conn->query($sql);
// $results will be an array holding the info from the sql statement

// 2. Display the contents
while ($row = $result->fetch_assoc()) {

    echo '<div class="text-center">';

    //If the id is the same as the id of the row that has been clicked
    if ($row['Receptionists_ID'] == $_GET['Receptionists_ID']) {

        echo '<form class="form-inline m-2" id="form-update-img" action="" enctype="multipart/form-data" method="post">';
        echo '<div class="upload">';
        $id = $row["Receptionists_ID"];
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

        echo '<form class="form-inline m-2" action="update-receptionist-profile.php" method="POST">';
        echo '</div>';
        echo '<h4 class="card-title text-center mt-3">' . $row['Name'] . ' ' . $row['Surname'] . '</h4>';
        echo '<div class="row">';
        echo '<div class="col-6">';

        echo '<label for="Name">Name:</label>';
        echo '<p><input type="text" class="form-control" name="Name" value="' . $row['Name'] . '" required></p>';
        echo '<label for="Surname">Surname:</label>';
        echo '<p><input type="text" class="form-control" name="Surname" value="' . $row['Surname'] . '" required></p>';
        echo '<label for="DoB">DoB:</label>';
        echo '<p><input type="date" class="form-control" name="DoB" value="' . $row['DoB'] . '" required></p>';
        echo '<label for="Gender">Gender:</label>';
        echo '<p><input type="text" class="form-control" name="Gender" value="' . $row['Gender'] . '" required></p>';
        echo '</div>';
        echo '<div class="col-6">';
        echo '<label for="PhoneNumber">Phone:</label>';
        echo '<p><input type="text" class="form-control" name="PhoneNumber" value="' . $row['PhoneNumber'] . '" required></p>';
        echo '<label for="Email">Email:</label>';
        echo '<p><input type="email" class="form-control" name="Email" value="' . $row['Email'] . '" required></p>';
        echo '<label for="Username">Username:</label>';
        echo '<p><input type="text" class="form-control" name="Username" value="' . $row['Username'] . '" required autocomplete="off"></p>';
        echo '<label for="Rank">Rank:</label>';
        echo '<p><input type="text" class="form-control" name="Rank" value="' . $row['Rank'] . '" required></p>';

        echo '<div class="btn-group" role="group" aria-label="Actions">';
        echo '<button type="submit" class="btn btn-success">Save</button>';
        echo '<input type="hidden" name="Receptionists_ID" value="' . $row['Receptionists_ID'] . '">';
        echo '</form>';

    } else {

        echo '<div class="upload grow">';
        echo '<img src="profile_img/' . $row['ProfileImage'] . '" class="img-fluid rounded-circle" alt="Profile Image" title="' . $row['ProfileImage'] . '">';
        echo '</div>';
        echo '</div>';
        echo '<h4 class="card-title text-center mt-3">'. $row['Name'] . ' ' . $row['Surname'] . '</h4>';
        echo '<div class="row">';
        echo '<div class="col-6">';
        echo '<p><strong>Name:</strong> '. $row['Name'] . '</p>';
        echo '<p><strong>Surname:</strong> ' . $row['Surname'] . '</p>';
        echo '<p><strong>Date of Birth:</strong> ' . $row['DoB'] . '</p>';
        echo '<p><strong>Gender:</strong> ' . $row['Gender'] . '</p>';
        echo '</div>';
        echo '<div class="col-6">';
        echo '<p><strong>Phone Number:</strong> ' . $row['PhoneNumber'] . '</p>';
        echo '<p><strong>Email:</strong> ' . $row['Email'] . '</p>';
        echo '<p><strong>Username:</strong> ' . $row['Username'] . '</p>';
        echo '<p><strong>Rank:</strong> ' . $row['Rank'] . '</p>';

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
    echo '</div>';
    echo '</div>';
}
;

$conn->close();

?>