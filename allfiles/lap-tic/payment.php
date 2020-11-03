 



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
$firstnameErr = $lastnameErr  = $adressErr = $methodErr = $amountErr = $emailErr = "";
$firstname = $lastname =  $address = $method = $email = $amount = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // if first name is given, put it in variable firstname
  // and check if it's a valid firstname (consists of chars and spaces only)
  if (empty($_POST["firstname"])) {
    $nameErr = "Name is required";
  } else {
    $firstname = test_input($_POST["firstname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$firstname)) {
      $firstnameErr = "Only letters and white space allowed";
    }
  }
  
   if (empty($_POST["lastname"])) {
    $nameErr = "Name is required";
  } else {
    $lastname = test_input($_POST["lastname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$lastname)) {
      $lastnameErr = "Only letters and white space allowed";
    }
  }
 

  if (empty($_POST["address"])) {
    $addressErr = "no address";
  } else {
    $address = test_input($_POST["address"]);
  }
  
  
   if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
  
  if (empty($_POST["methdo"])) {
    $methdoErr = "no method given";
  } else {
    $method = test_input($_POST["methdo"]);
  }
  
  if (empty($_POST["amount"])) {
    $amountErr = "no amount given";
  } else {
    $amount = test_input($_POST["amount"]);
  }
 
  

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$paymentID =  uniqid (rand (),true);
// printing to the screen 
echo "<h2>Your Input:</h2>";

echo $firstname;
echo "<br>";
echo $lastname;
echo "<br>";
echo $email;

echo "<br>";
echo $address;
echo "<br>";



$sql = "INSERT INTO Payment (PaymentID, UserName, LastName, FirstName, Email, Method, Address, Payment)
VALUES ('".$paymentID."', 'dzab', '".$lastname."', '".$firstname."', 
'".$email."','".$method."', '".$address."', '".$amount."' )";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?> 
