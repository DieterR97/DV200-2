<?php
session_start();

// remove session variables
session_unset();
session_destroy();

// send user back to index
header("Location: index.php");
?>