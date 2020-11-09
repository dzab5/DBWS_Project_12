<?php

$servername = "10.72.1.14";
$username = "group12";
$password = "SynPaR";
$dbname = "group12";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn -> connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// define variables and set to empty values
$comidErr = $comtypeErr = $comnameErr = $comdescriptionErr = $comramErr = $compriceErr = $combrandErr = "";
$comid = $comtype = $comname = $comdescription = $comram = $comprice = $combrand = "";
 
   if (empty($_POST["comtype"])) {
    $comtypeErr = "Computer type is required";
  } else {
    $comtype = test_input($_POST["comtype"]);
  }
  
  if (empty($_POST["comname"])) {
    $comnameErr = "Computer name is required";
  } else {
    $comname = test_input($_POST["comname"]);
  }

  if (empty($_POST["comdescription"])) {
    $comdescriptionErr = "";
  } 
  else {
   $comdescription = test_input($_POST["comdescription"]);
   }
  
  
  if (empty($_POST["comram"])) {
    $comram = "";
  } else {
    $comram = test_input($_POST["comram"]);
  }

  if (empty($_POST["comprice"])) {
    $comprice = "";
  } else {
    $comprice= test_input($_POST["comprice"]);
  }

  if (empty($_POST["combrand"])) {
    $combrand = "";
  } else {
    $combrand = test_input($_POST["combrand"]);
  }

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
$comid = uniqid(rand(),true);

// printing to the screen 
echo "<h2>Your Input:</h2>";
echo $comid;
echo "<br>";
echo $comtype;
echo "<br>";
echo $comname;
echo "<br>";
echo $comdescription;
echo "<br>";
echo $comram;
echo "<br>";
echo $comprice;
echo "<br>";
echo $combrand;
echo "<br>";



$sql = "INSERT INTO Computer(ComputerID , ComputerType, ComputerName, ComputerDescr, RAM, ComputerPrice, ComputerBrand, ComputerPhoto)
VALUES ('".$comid."','".$comtype."', '".$comname."','".$comdescription."', '".$comram."', '".$comprice."', '".$combrand."','none')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
