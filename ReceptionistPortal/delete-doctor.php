<?php

include 'db.php';

$Doctors_ID = $_GET['Doctors_ID'];

$sql = "DELETE FROM doctors WHERE Doctors_ID = $Doctors_ID";

$conn->query($sql);

$conn->close();

header("location: doctors.php");

?>