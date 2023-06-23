<?php

include 'db.php';

// getting patient id
$Doctors_ID = $_GET["Doctors_ID"];

$sql = "SELECT * FROM doctors WHERE Doctors_ID='$Doctors_ID'";

$result = $conn->query($sql);

// $doctor = mysqli_fetch_object($result);

while ($row = mysqli_fetch_assoc($result)) {

    $Name = $row['Name'];
    $Surname = $row['Surname'];
    $ProfileImage = $row['ProfileImage'];
    $Specialisation = $row['Specialisation'];
    $Gender = $row['Gender'];
    $DoB = $row['DoB'];
    $IDNumber = $row['IDNumber'];
    $Email = $row['Email'];
    $PhoneNumber = $row['PhoneNumber'];
}

// echo json_encode($doctor); // Returning the JSON string

echo json_encode(
    [
        'Name' => $Name,
        'Surname' => $Surname,
        'ProfileImage' => $ProfileImage,
        'Specialisation' => $Specialisation,
        'Gender' => $Gender,
        'DoB' => $DoB,
        'IDNumber' => $IDNumber,
        'Email' => $Email,
        'PhoneNumber' => $PhoneNumber
    ]
);

$conn->close();

?>