<?php

include 'db.php';

$Receptionists_ID = $_GET['Receptionists_ID'];

$sql = "DELETE FROM receptionists WHERE Receptionists_ID = $Receptionists_ID";

$conn->query($sql);

$conn->close();

header("location: receptionists.php");

?>