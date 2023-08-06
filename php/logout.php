<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sunnyspot";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$StaffID = $_GET['StaffID'];
$LoginDate = $_GET['LoginDate'];
date_default_timezone_set("Australia/Sydney");
$LogoffDate = date("Y-m-d h:i:sa");
$sql = "INSERT INTO log VALUES ('','$StaffID','$LoginDate','$LogoffDate')";
if ($conn->query($sql) === TRUE) {   
    header("Location: adminlogin.php"); ;
   }
   else {
    echo "Error Updating " . $conn->error;
   }
   $conn->close();
// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the login page
header("Location: adminlogin.php");
exit;
?>
