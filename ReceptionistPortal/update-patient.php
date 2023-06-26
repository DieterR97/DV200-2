<?php

include 'db.php';

$Patients_ID = $_POST['Patients_ID'];
$Name = $_POST['Name'];
$Surname = $_POST['Surname'];
$MedicalAidNumber = $_POST['MedicalAidNumber'];
$DoB = $_POST['DoB'];
$Gender = $_POST['Gender'];
$Email = $_POST['Email'];
$PhoneNumber = $_POST['PhoneNumber'];
$IDNumber = $_POST['IDNumber'];
// $Picture = $_POST['Picture'];

$sql = "UPDATE patients SET Name = '$Name', Surname = '$Surname', MedicalAidNumber = '$MedicalAidNumber', DoB = '$DoB', Gender = '$Gender', Email = '$Email', PhoneNumber = '$PhoneNumber', IDNumber = '$IDNumber' WHERE Patients_ID = '$Patients_ID'";

$result = $conn->query($sql);

$conn->close();

header("location: patients.php");

?>