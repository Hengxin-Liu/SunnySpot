<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: adminlogin.php "); // Redirect to the login page if not logged in
    exit;
}

// Logout logic
if (isset($_GET['logout']) && $_GET['logout'] == 1) {
    // Destroy all session data
    session_unset();
    session_destroy();
    header("Location: adminlogin.php"); // Redirect to the login page after logout
    exit;
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>
<body>
    <header> 
      <div class="flex-content">
        <div class="flex-box">
            <img src="../images/accommodation.png" alt="Accommodation">
            <h1>Sunnyspot Accomodation</h1>
        </div>
        <a href="logout.php?StaffID=<?php echo $_SESSION['admin_id']?>&LoginDate=<?php echo $_SESSION['LoginDate']?>"> <P> Log Out</P></a>
      </div>
    </header>
    <main>
      <div class="menu-content">
        <div class="list-group">
         <h2>Hello <?php echo $_SESSION['admin_name']; ?></h2>
         <ul class="list-group">
           <li class="list-group-item"><a href="index.html">Home</a></li>
           <li class="list-group-item"><a href="ShowAllCabins.php">Show Cabins</a></li>
           <li class="list-group-item"><a href="insertCabin.php">Insert a new cabin</a></li>
           <li class="list-group-item"><a href="updateCabin.php">Update a cabin</a></li>
           <li class="list-group-item"><a href="deleteCabin.php">Delete a cabin</a></li>
         </ul>
        </div>
      </div>
    
    </main>

    <footer> 
        &copy; Copyright
    </footer>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>