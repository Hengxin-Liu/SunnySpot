<?php 
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
    <div class="flex-box">
      <img src="../images/accommodation.png" alt="Accommodation">
      <h1>Sunnyspot Accomodation</h1>
    </div>
    <nav>
      <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="cabin_show.html">Contact</a></li>
        <li><a href="adminlogin.php">Login</a></li>
      </ul>
    </nav>
  </header>
  <section>
  <?php
   $i=0;
   while($row = mysqli_fetch_array($result))
   {
   ?>
    <article>
      <h2><?php echo $row["CabinType"]; ?></h2>
      <img src="../images/<?php echo $row["Photo"]; ?>" alt="<?php echo $row["Photo"]; ?>">
      <p><span>Details: </span><?php echo $row["CabinDescription"]; ?></p>
      <p><span>Price per night: </span><?php echo $row["PricePerNight"]; ?></p>
      <p><span>Price per week: </span><?php echo $row["PricePerWeek"]; ?></p>
    </article>
    <?php
    $i++;
     }
    ?>
     </article>

</section>

<footer> 
  &copy; Copyright
</footer>
</body>
</html>