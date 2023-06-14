<?php

include 'db.php';

// getting patient id
$Patients_ID = $_GET["Patients_ID"];

$sql = "SELECT * FROM patients WHERE Patients_ID='$Patients_ID'";

$result = $conn->query($sql);

// $doctor = mysqli_fetch_object($result);

while ($row = mysqli_fetch_assoc($result)) {

    $Name = $row['Name'];
    $Surname = $row['Surname'];
    $ProfileImage = $row['ProfileImage'];
    $MedicalAidNumber = $row['MedicalAidNumber'];
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
        'MedicalAidNumber' => $MedicalAidNumber,
        'Gender' => $Gender,
        'DoB' => $DoB,
        'IDNumber' => $IDNumber,
        'Email' => $Email,
        'PhoneNumber' => $PhoneNumber
    ]
);

$conn->close();

?>