 



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
$commentErr = $starsErr  = $dateErr = "";
$comment = $stars =  $date = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {


  if (empty($_POST["comment"])) {
    $commentErr = "no comment given";
  } else {
    $comment = test_input($_POST["comment"]);
  }
  
  if (empty($_POST["stars"])) {
    $starsErr = "no stars given";
  } else {
    $stars = test_input($_POST["stars"]);
  }
  if (empty($_POST["date"])) {
    $dateErr = "no comment given";
  } else {
    $date = test_input($_POST["date"]);
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

echo $stars;
echo "<br>";
echo $date;
echo "<br>";
echo $comment;





$sql = "INSERT INTO Reviews (ReviewID, UserName, ComputerID, ReviewComment, ReviewStars, ReviewDate)
VALUES ('".$paymentID."', 'dzab', '1', '".$comment."', '".$stars."', '".$date."' )";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?> 
