<?php

include 'db.php';

// getting doctor id
$Receptionists_ID = $_GET["Receptionists_ID"];

$sql = "SELECT * FROM receptionists WHERE Receptionists_ID='$Receptionists_ID'";

$result = $conn->query($sql);

// $doctor = mysqli_fetch_object($result);

while ($row = mysqli_fetch_assoc($result)) {

    $Name = $row['Name'];
    $Surname = $row['Surname'];
    $ProfileImage = $row['ProfileImage'];
    $Rank = $row['Rank'];
    $Gender = $row['Gender'];
    $DoB = $row['DoB'];
    $Email = $row['Email'];
    $PhoneNumber = $row['PhoneNumber'];
    $Banned = $row['Banned'];
    $Username = $row['Username'];

}

// echo json_encode($doctor); // Returning the JSON string

echo json_encode(
    [
        'Name' => $Name,
        'Surname' => $Surname,
        'ProfileImage' => $ProfileImage,
        'Rank' => $Rank,
        'Gender' => $Gender,
        'DoB' => $DoB,
        'Email' => $Email,
        'PhoneNumber' => $PhoneNumber,
        'RoomsID' => $RoomsID,
        'Banned' => $Banned,
        'Username' => $Username

    ]
);

$conn->close();

?>