 



<?php

$servername = "10.72.1.14";
$username = "group12";
$password = "SynPaR";
$dbname = "group12";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// define variables and set to empty values
$quantityErr = $costErr = "";
$quantity = $cost = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // if first name is given, put it in variable firstname
  // and check if it's a valid firstname (consists of chars and spaces only)
  
 

  if (empty($_POST["quantity"])) {
    $quantityErr = "Quantity not given";
  } else {
    $quantity = test_input($_POST["quantity"]);
  }
  
   if (empty($_POST["cost"])) {
    $costErr = "Quantity not given";
  } else {
    $cost = test_input($_POST["cost"]);
  }
  
 
  

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$cartID =  uniqid (rand (),true);
// printing to the screen 
echo "<h2>Your Input:</h2>";

echo $quantity;
echo "<br>";
echo $cost;



$sql = "INSERT INTO Cart (CartID, NumOfProducts, TotalCost)
VALUES ('".$cartID."',  '".$quantity."', '".$cost."')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?> 
