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
   $servername = "localhost";
   $username = "root";
   $password = "";/* Put your password */
   $dbname = "sunnyspot";
   $conn = new mysqli($servername, $username, $password,$dbname);
   if ($conn->connect_error)
   {
    die("Connection failed: " . $conn->connect_error);
   }
   $sql = "SELECT * FROM cabin";
   $result=$conn->query($sql)
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
  <main>
  <div class="table-content">
        <table class="table table-bordered">
            <button type="button" class="add float-right btn btn-primary" data-toggle="modal" data-target="#addCabin" >Add</button>
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">CabinType</th>
                <th scope="col">CabinDescription</th>
                <th scope="col">PricePerNight</th>
                <th scope="col">PricePerWeek</th>
                <th scope="col">Photo</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
          <?php  while ($row = $result->fetch_assoc()) { ?>
              <tr>
                <th scope="row"><?php echo $row["CabinID"]; ?></th>
                <td><?php echo $row["CabinType"]; ?></td>
                <td><?php echo $row["CabinDescription"]; ?></td>
                <td><?php echo $row["PricePerNight"]; ?></td>
                <td><?php echo $row["PricePerWeek"]; ?></td>
                <td><img src="../images/<?php echo $row["Photo"]; ?>" alt="<?php echo $row["Photo"]; ?>"></td>
                <td>
                   <a href="CabinDetails.php?
                   id=<?php echo $row["CabinID"];?>
                   &CabinType=<?php echo $row["CabinType"];?>
                   &CabinDescription=<?php echo $row["CabinDescription"];?>
                   &PricePerNight=<?php echo $row["PricePerNight"]; ?>
                   &PricePerWeek=<?php echo $row["PricePerWeek"]; ?>
                   &Photo=<?php echo $row["Photo"]; ?> ">
                   <button type="button" class="btn btn-outline-primary"> Update</button> </a>
                   <a href="AddInc.php?
                   id=<?php echo $row["CabinID"];?> ">
                   <button type="button" class="btn btn-outline-primary"> Add Inclusion</button> </a>
                   <a href="DeleteCabin.php?
                   id=<?php echo $row["CabinID"];?>">
                    <button type="button" class="btn btn-outline-danger"> Delete </button></a>
                </td>
              </tr>
          <?php  } ?>
              <tr>
            </tbody>
          </table> 
        </div>
        <div class="addcabin">
            <div class="modal fade" id="addCabin" tabindex="-1" role="dialog" aria-labelledby="AddCabinTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="CabinDetailTitle">Cabin Details</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="InsertCabin.php" enctype="multipart/form-data">
                            <div class="form-group">
                              <label for="CabinType">CabinType</label>
                              <input type="text" class="form-control" id="CabinType"  name="CabinType">
                            </div>
                            <div class="form-group">
                              <label for="CabinDescription">CabinDescription</label>
                              <textarea class="form-control" id="CabinDescription" name="CabinDescription"></textarea>
                            </div>
                            <div class="form-group">
                              <label for="PricePerNight">PricePerNight</label>
                              <input type="number" class="form-control" id="PricePerNight"  name="PricePerNight">
                            </div>
                            <div class="form-group">
                              <label for="PricePerWeek">PricePerWeek</label>
                              <input type="number" class="form-control" id="PricePerWeek"  name="PricePerWeek">
                            </div>
                            <div class="form-group">
                                <label for="Photo">Example file input</label>
                                <input type="file" class="form-control-file" id="Photo" name="Photo" accept="image/*">
                             </div>
                          <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" name="submit" class="btn btn-primary">Create</button>
                         </div>
                        </form>
                    </div>
                   
                  </div>
                </div>
            </div>
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