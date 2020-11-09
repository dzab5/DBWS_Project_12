<html>


<link href="sign_up.css" rel="stylesheet" type="text/css" />
<title> LAPTIC</title>


<div class="header">
    
    <h3> <img src="photos/laptic%20logo1.png" alt="logo"/> Top yourself with the perfect choice for you
    <div class = "header-right">
        <a href="Home.php">Home</a>
        <a href="about.html">About Us</a>
        <a href="imprint.html">Imprint</a>
        <a href="maintenance.php"> maintenance</a>
         <?php
          session_start();

            if (isset($_SESSION['user_type'])) {

                echo  '<a href="log_out.php"> log out</a>';
              
            }
            else 
            {
              echo '<a href="sign_in.php">Log In</a>';
            }
          ?>
    
        
    </div>
    </h3>

</div>    
<body>
<h2> You have to log in as admin to access this page <h2>
<form method="post" style="border:1px solid #ccc">
  <div class="container">
    <h1>Log In</h1>


    
	
	username: <input type="text" placeholder="Enter username" name="username" >
    	
	Password: <input type="password" placeholder="Enter username" name="psw" >
    
    <div class="clearfix">
      <button type="button" class="cancelbtn">Cancel</button>
      <button type="submit" class="signupbtn">Log In</button>
    </div>
    
  </div>
</form>

</body>
</html>


<?php


include 'config.php';


// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
  $myusername = mysqli_real_escape_string($conn, $_POST['username']);
  $mypassword = mysqli_real_escape_string($conn, $_POST['psw']);
  
  $sql = "SELECT * FROM User WHERE UserName = ? AND Password = ? and Type = 'Admin'";
  
  $result = mysqli_query($conn,$sql);

  $stmt = mysqli_stmt_init($conn);
  // prepare the statment
  if (!mysqli_stmt_prepare ($stmt, $sql))
  {
    echo "Sql Statment Failed";
  }
  else
  {
    // bind the parameter
    mysqli_stmt_bind_param($stmt, "ss", $myusername, $mypassword);
    // run the parameters in the database
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) == 1) {
    // output data of each row
    
  
      $user = $result->fetch_object();
      $_SESSION['user_id'] = $user->UserName;
      $_SESSION['user_type'] = $user->Type;

      echo $_SESSION['user_id'];
      header("Location: maintenance.php");

  
    
    }
    else{
      echo "unauthorized user <br>";
      echo "only admin users are allowed";
    }
   }
}
   $conn->close();

?>
