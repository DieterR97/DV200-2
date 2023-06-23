<?php
session_start();
include "db.php";

// if username and password is posted
if (isset($_POST['username']) && isset($_POST['password'])) {

    // validate function
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // validate both username and password
    $username = validate($_POST['username']);
    $password = validate($_POST['password']);

    // if username is empty
    if (empty($username)) {
        header("Location: index.php?error=Username is required");
        exit();
    } else if (empty($password)) { // if password is empty
        header("Location: index.php?error=Password is required");
        exit();
    } else {
        // sql query to check if records exists that matches username and password
        $sql = "SELECT * FROM receptionists WHERE Username='$username' AND Password='$password'";

        $result = mysqli_query($conn, $sql);

        // if there is a result that matches username and password
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['Username'] === $username && $row['Password'] === $password) {
                $_SESSION['Username'] = $row['Username'];
                $_SESSION['Name'] = $row['Name'];
                $_SESSION['Receptionists_ID'] = $row['Receptionists_ID'];
                header("Location: dashboard.php");
                exit();
            } else {
                header("Location: index.php?error=Incorect User name or password");
                exit();
            }
        } else {
            header("Location: index.php?error=Incorect User name or password");
            exit();
        }
    }

} else {
    header("Location: index.php"); // if username and password is not posted
    exit();
}
?>