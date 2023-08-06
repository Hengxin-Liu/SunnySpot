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
  $CabinType = $_POST['CabinType']; 
  $CabinDescription = $_POST['CabinDescription'];
  $PricePerNight = $_POST['PricePerNight'];
  $PricePerWeek = $_POST['PricePerWeek'];
  if($_FILES['Photo']['name']){
    $target_dir = "../images/"; // Directory to store the uploaded images
    $target_file = $target_dir . basename($_FILES['Photo']['name']);
    if(move_uploaded_file($_FILES['Photo']['tmp_name'], $target_file)) {
        $New_Image = $_FILES['Photo']['name'];
     }
  }else{
    $New_Image = $_GET['Image'];
  }

  $sql =
   "UPDATE cabin 
    SET CabinType ='$CabinType', CabinDescription ='$CabinDescription', PricePerNight ='$PricePerNight', PricePerWeek ='$PricePerWeek',Photo='$New_Image'
    WHERE CabinID ='$CabinID'";
    if ($conn->query($sql) === TRUE) {    
      echo '<script>alert("Cabin Record Updated successfully")</script>'; 
      echo '<script>window.location = "ShowAllCabins.php"</script>';
     }
     else {
      echo "Error Updating " . $conn->error;
     }
     $conn->close();
 }
?>