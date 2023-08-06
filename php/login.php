<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sunnyspot";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the user is already logged in
if(isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
  header("Location: adminMenu.php"); // Redirect to the admin page if already logged in
  exit;
}

// Login form submission
if($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // SQL query to check if the username and password are correct
  $sql = "SELECT * FROM admin WHERE UserName = '$username' AND Password = '$password'";
  $result = $conn->query($sql);

  if ($result && $result->num_rows == 1) {  
    // Login successful
    $row = $result->fetch_assoc();
    $_SESSION['admin_logged_in'] = true;
    $_SESSION['admin_id'] = $row['StaffID'];
    $_SESSION['admin_username'] = $row['UserName'];
    $_SESSION['admin_name'] = $row['FirstName'] . ' ' . $row['LastName'];
    date_default_timezone_set("Australia/Sydney");
    $_SESSION['LoginDate'] = date("Y-m-d h:i:sa");
    header("Location: adminMenu.php"); // Redirect to the admin page
    exit;
  } else 
  {
    // Login failed
    header("Location: adminlogin.php"); // Redirect to the admin page
}
}
?>