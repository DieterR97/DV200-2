<?php

// -- This is the configuration file

//Short for connection
$conn = new mysqli("localhost", "root", "", "doctor_db");
//Server, username, password, database name. By default the username is "root" and the password is blank.

// if no connection / connection failed
if (!$conn) {
    echo "Connection failed!";
}

?>