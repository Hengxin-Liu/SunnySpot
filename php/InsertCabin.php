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
  $CabinType = $_POST['CabinType'];
  $CabinDescription = $_POST['CabinDescription']; 
  $PricePerNight = $_POST['PricePerNight'];
  $PricePerWeek = $_POST['PricePerWeek'];
  $Image = $_FILES['Photo']['name'];
 
 $target_dir = "../images/"; // Directory to store the uploaded images
 $target_file = $target_dir . basename($_FILES['Photo']['name']);
 $uploadOk = 1;
 $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
   if( $PricePerNight < 0){
   echo '<script>alert("PricePerNight should be greater than 0")</script>';
   echo '<script>window.location = "ShowAllCabins.php"</script>';
   }
   if($PricePerNight * 5 < $PricePerWeek ){
    echo '<script>alert("PricePerWeek is not more than 5 times the PricePerNight ")</script>';
   }
 //Check if the file is an actual image
 if($Image !== ""){
 if (isset($_POST['submit'])) {
     $check = getimagesize($_FILES['Photo']['tmp_name']);
     if ($check !== false) {
        $uploadOk = 1;
     } else {
         echo "File is not an image.";
         $uploadOk = 0;
     }
 }

 // Check if the file already exists
 if (file_exists($target_file)) {
    echo '<script>alert("Sorry, the file already exists")</script>';
    echo '<script>window.location = "ShowAllCabins.php"</script>';
     $uploadOk = 0;
 }

 // Check the file size
 if ($_FILES['Photo']['size'] > 500000) {
     echo "Sorry, the file is too large.";
     $uploadOk = 0;
 }

// Allow only certain file formats (modify this as per your requirements)
 if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
     && $imageFileType != "gif") {
     echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
     $uploadOk = 0;
 }

 // If the file upload is successful, move the file to the target directory
 if ($uploadOk == 1) {
     if (move_uploaded_file($_FILES['Photo']['tmp_name'], $target_file)) {
         // Insert the product record into the database
        
         $sql = " INSERT INTO cabin 
           VALUES ('','$CabinType','$CabinDescription','$PricePerNight','$PricePerWeek','$Image')";

         if ($conn->query($sql) === TRUE) {
            echo '<script>alert("New Product Record Inserted successfully")</script>';
            echo '<script>window.location = "ShowAllCabins.php"</script>';
         } else {
             echo "Error Inserting into table: " . $conn->error;
         }
     } else {
         echo "Sorry, there was an error uploading your file.";
     }
 } else {
     echo "Sorry, your file was not uploaded.";
 }
 }
 else{
    $Image ="testCabin.jpg";
    $sql = " INSERT INTO cabin 
    VALUES ('','$CabinType','$CabinDescription','$PricePerNight','$PricePerWeek','$Image')";

  if ($conn->query($sql) === TRUE) {
     echo '<script>alert("New Product Record Inserted successfully")</script>';
     echo '<script>window.location = "ShowAllCabins.php"</script>';
  } else {
      echo "Error Inserting into table: " . $conn->error;
  }
 }
 $conn->close();
}
?>