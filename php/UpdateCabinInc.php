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
 if(isset($_POST['submit'])){
  $CabinID = $_POST['CabinID'];
  $checkbox1=$_POST['Inc'];  
  $chk="";  
  for ($i=0; $i<sizeof ($checkbox1);$i++) {  
    $sql="INSERT INTO cabininclusion VALUES ('','$CabinID','$checkbox1[$i]')";  
    $conn->query($sql) or die(mysql_error());  
    }  
    echo '<script>alert("New Record Inserted successfully")</script>';
    echo '<script>window.location = "ShowAllCabins.php"</script>';
   $conn->close();
}
?>