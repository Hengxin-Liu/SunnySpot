<?php
$CabinID= intval($_GET["id"]);
echo $CabinID;
$servername = "localhost";
$username = "root";
$password = "";/* Put your password */
$dbname = "sunnyspot";
$conn = new mysqli($servername, $username, $password,$dbname);
if ($conn->connect_error)
{
 die("Connection failed: " . $conn->connect_error);
}

$sql = " DELETE FROM cabin WHERE CabinID = $CabinID " ;   
$sql2 = " DELETE FROM cabininclusion WHERE CabinID = $CabinID" ;



 if($conn->query($sql2) === TRUE){
   if ($conn->query($sql) === TRUE) {
      echo '<script>alert("Delete successfully")</script>';
      echo '<script>window.location = "ShowAllCabins.php"</script>';
   }
 }
 else{
   if ($conn->query($sql) === TRUE) {
      echo '<script>alert("Delete successfully")</script>';
      echo '<script>window.location = "ShowAllCabins.php"</script>';
   }
 }

echo "Error Deleting " . $conn->error;
$conn->close();

?>