 



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
$firstnameErr = $lastnameErr = $emailErr = $stateErr = $adressErr = $passErr = $RpassErr = $usernameErr = "";
$firstname = $lastname = $email = $state = $address = $pass = $Rpass = $username = "";
$user_type = "free";

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
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
  

  if (empty($_POST["username"])) {
    $usernameErr = "";
  } 
  else {
   $username = test_input($_POST["username"]);
   
   // querying over all the user names and checking that it is unique
   $query = "SELECT * FROM User WHERE Username = '".$username."' ";
   $result = mysqli_query($conn,$query);
   if(mysqli_num_rows($result)!=0){
   	echo $username." is already taken";
    }
  }
    
    
  if (empty($_POST["state"])) {
    $state = "";
  } else {
    $state = test_input($_POST["state"]);
    // check if URL address syntax is valid
    if (!preg_match("/^[a-zA-Z-' ]*$/",$state))
      $stateErr = "Invalid URL";
    }    
 

  if (empty($_POST["address"])) {
    $addess = "";
  } else {
    $address = test_input($_POST["address"]);
  }

  if (empty($_POST["psw"])) {
    $pass = "";
  } else {
    $pass = test_input($_POST["psw"]);
    
  }

  if (empty($_POST["psw-repeat"])) {
    $Rpass = "";
  } else {
    $Rpass = test_input($_POST["psw-repeat"]);

    if ($Rpass != $pass) // this isn't working yet
    	throw new Exception("PASSWORDS DON'T MATCH");
    // hashing the password if they match
    else
     $pass = password_hash($pass,PASSWORD_BCRYPT);

  }
  
    if (!empty($_POST["premium"])) {

    	$user_type = test_input($_POST["premium"]);
  }

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

// printing to the screen 
echo "<h2>Your Input:</h2>";
echo $user_type;
echo "<br>";
echo $firstname;
echo "<br>";
echo $lastname;
echo "<br>";
echo $email;
echo "<br>";
echo $state;
echo "<br>";
echo $address;
echo "<br>";
echo $pass;
echo "<br>";





$sql = "INSERT INTO User (UserName, Type, Password, LastName, FirstName, Email, Address, State)
VALUES ('".$username."', '".$user_type."', '".$pass."','".$lastname."', '".$firstname."', '".$email."', '".$address."', '".$state."')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?> 
