<?php 
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['usertype']==2){

$service=$_GET['servicename'];


include("connection.php");
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

$featured=1;




// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE allservices SET fstatus=$featured WHERE servicename LIKE '$service'";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
  header("Location:index.php");
  
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

}
else{
 echo "You don't have permission to access this page";
}
?>