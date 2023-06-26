<?php

include 'db.php';

$Doctors_ID = $_POST['Doctors_ID'];
$Name = $_POST['Name'];
$Surname = $_POST['Surname'];
$Specialisation = $_POST['Specialisation'];
$Rating = $_POST['Rating'];
$DoB = $_POST['DoB'];
$Gender = $_POST['Gender'];
$Email = $_POST['Email'];
$PhoneNumber = $_POST['PhoneNumber'];
// $Picture = $_POST['Picture'];

// $sql = "UPDATE employees SET Name = '$Name', Surname = '$Surname', Role = '$Role', DoB = '$DoB', Gender = '$Gender', Race = '$Race', Picture = '$Picture' WHERE employee_ID = '$employee_ID'";
$sql = "UPDATE doctors SET Name = '$Name', Surname = '$Surname', Specialisation = '$Specialisation', Rating = '$Rating', DoB = '$DoB', Gender = '$Gender', Email = '$Email', PhoneNumber = '$PhoneNumber' WHERE Doctors_ID = '$Doctors_ID'";

$result = $conn->query($sql);

$conn->close();

header("location: doctors.php");

?>