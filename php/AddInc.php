<?php session_start();

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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sunnspot Accommodation</title>
    <link href="https://fonts.googleapis.com/css?family=Quando&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>All Cabin</title>
    <link rel="stylesheet" href="../css/style.css">

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
    <?php
    $CabinId= $_GET["id"];?>
                  <form method="post" action="UpdateCabinInc.php" enctype="multipart/form-data">
                        <div class="form-group">
                          <label for="CabinType">CabinId</label>
                          <input type='text' class="form-control" id="CabinId"  name="CabinID" readonly value="<?php echo trim($CabinId)  ?>">
                        </div>
                        <div class="form-group">
                          <input type="checkbox" id="Inc1" name="Inc[]" value="1">
                          <label for="vehicle1"> 1 bathroom</label><br>
                          <input type="checkbox" id="Inc2" name="Inc[]" value="2">
                          <label for="vehicle1"> 1+ bathroom</label><br>
                          <input type="checkbox" id="Inc3" name="Inc[]" value="3">
                          <label for="vehicle1"> 2 bathroom</label><br>
                          <input type="checkbox" id="Inc4" name="Inc[]" value="4">
                          <label for="vehicle1"> Air conditioner</label><br>
                          <input type="checkbox" id="Inc5" name="Inc[]" value="5">
                          <label for="vehicle1"> Ceiling fans</label><br>
                          <input type="checkbox" id="Inc6" name="Inc[]" value="6">
                          <label for="vehicle1"> Bunk bed</label><br>
                          <input type="checkbox" id="Inc7" name="Inc[]" value="7">
                          <label for="vehicle1"> 2 single beds</label><br>
                          <input type="checkbox" id="Inc8" name="Inc[]" value="8">
                          <label for="vehicle1"> Double bed</label><br>
                          <input type="checkbox" id="Inc9" name="Inc[]" value="9">
                          <label for="vehicle1"> Dishwasher</label><br>
                          <input type="checkbox" id="Inc10" name="Inc[]" value="10">
                          <label for="vehicle1">DVD Player</label><br>
                          <input type="checkbox" id="Inc11" name="Inc[]" value="11">
                          <label for="vehicle1"> Hair Dryer</label><br>
                        </div>
                         <div class="modal-footer">
                           <button type="submit" name="submit" class="btn btn-primary">Save</button>
                         </div>
                     </form>
                     </main>
  <footer> 
  &copy; Copyright
</footer>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>