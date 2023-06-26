<?php

include 'db.php';

$Receptionists_ID = $_POST['Receptionists_ID'];
$Name = $_POST['Name'];
$Surname = $_POST['Surname'];
$Rank = $_POST['Rank'];
$DoB = $_POST['DoB'];
$Gender = $_POST['Gender'];
$Email = $_POST['Email'];
$PhoneNumber = $_POST['PhoneNumber'];
$Username = $_POST['Username'];
$Password = $_POST['Password'];
$Banned = $_POST['Banned'];

$sql = "UPDATE receptionists SET Name = '$Name', Surname = '$Surname', Rank = '$Rank', DoB = '$DoB', Gender = '$Gender', Email = '$Email', PhoneNumber = '$PhoneNumber', Username = '$Username', Password = '$Password', Banned = '$Banned' WHERE Receptionists_ID = '$Receptionists_ID'";

$result = $conn->query($sql);

$conn->close();

header("location: profile.php");

?>