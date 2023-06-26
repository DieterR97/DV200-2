<?php

// Before everything, acknowledge this file.
include 'db.php';

//include the ID of the element you get it from in the square brackets.
$Name = $_POST['Name'];
$Surname = $_POST['Surname'];
$IDNumber = $_POST['IDNumber'];
$MedicalAidNumber = $_POST['MedicalAidNumber'];
$DoB = $_POST['DoB'];
$Gender = $_POST['Gender'];
$Email = $_POST['Email'];
$PhoneNumber = $_POST['PhoneNumber'];
$ProfileImage = $_POST['ProfileImage'];

if ($_FILES['ProfileImage']['size'] == 0) {
    // No file was selected for upload, your (re)action goes here
    // sql query:
    $sql = "INSERT INTO patients (Name, Surname, IDNumber, MedicalAidNumber, DoB, Gender, Email, PhoneNumber, ProfileImage) VALUES ('$Name', '$Surname', '$IDNumber', '$MedicalAidNumber', '$DoB', '$Gender', '$Email', '$PhoneNumber', 'noprofil.jpg')";

    // $conn is from db.php. This runs the code with the authentication from the db.php file.
    $conn->query($sql);
}

if (isset($_FILES["ProfileImage"])) {
    // File upload logic here
    $name = $_POST["Name"];

    $file = $_FILES['ProfileImage'];


    // Check for errors
    if ($file['error'] === UPLOAD_ERR_OK) {
        // File upload was successful


        $imageName = $file['name'];
        $imageSize = $file['size'];
        $tmpName = $file['tmp_name'];

        // Image validation
        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $imageName);
        $imageExtension = strtolower(end($imageExtension));

        if (!in_array($imageExtension, $validImageExtension)) {
            echo
                "
                <script>
                    alert('Invalid Image Extension');
                    document.location.href = 'patients.php';
                </script>
            ";
        } elseif ($imageSize > 1200000) {
            echo
                "
                <script>
                    alert('Image Size Is Too Large');
                    document.location.href = 'patients.php';
                </script>
            ";
        } else {

            $newImageName = $name . " - " . date("Y.m.d") . " - " . date("h.i.sa"); // Generate new image name
            $newImageName .= '.' . $imageExtension;

            move_uploaded_file($tmpName, 'profile_img/' . $newImageName);

            // sql query:
            $sql = "INSERT INTO patients (Name, Surname, IDNumber, MedicalAidNumber, DoB, Gender, Email, PhoneNumber, ProfileImage) VALUES ('$Name', '$Surname', '$IDNumber', '$MedicalAidNumber', '$DoB', '$Gender', '$Email', '$PhoneNumber', '$newImageName')";

            //$conn is from db.php. This runs the code with the authentication from the db.php file.
            $conn->query($sql);

            echo
                '
                <script>
                    alert("Patient ' . $name . ' Successfully Added!");
                    document.location.href = "patients.php";
                </script>
                ';
        }

    } else {
        // File upload encountered an error
        echo "File upload failed with error code: " . $file['error'];
    }
}

//You need to close the connection after running the sql to avoid errors.
$conn->close();

// This gives an instruction to go back to a different page
header("location: patients.php");

?>