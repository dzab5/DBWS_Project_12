
<html> 


<link href="user_page.css" rel="stylesheet" type="text/css" />
<title> LAPTIC</title>

<body>
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


      
     
</body>      

</html>
   

<?php

include 'config.php';

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$User_ID = $_COOKIE["UserID"];

if ($User_ID != '')
{
  $sql="SELECT * FROM User WHERE UserName = ?";
  $stmt = mysqli_stmt_init($conn);
  // prepare the statment
  if (!mysqli_stmt_prepare ($stmt, $sql))
  {
    echo "Sql Statment Failed";
  }
  else
  {
    // bind the parameter
    mysqli_stmt_bind_param($stmt, "s", $User_ID);
    // run the parameters in the database
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);


    if (mysqli_num_rows($result) > 0) {
    
      while($row = mysqli_fetch_assoc($result)) {
      	$image="photos/user.png";
  	    print"<img src=\"$image\" width=\"100px\" height=\"100px\"\/>";
        
        $msg = "<h3>" . $row['UserName'] . "</h3>";
        echo $msg;
        
        $msg = "<div class='desc'>" . $row['FirstName'] . "<br> <br>". $row['LastName'] . "<br> <br>" . $row['Email'] ."<br> <br>". $row['Address'] . "<br> <br>". $row['State'] .  " <br><br><br><br><br><br><br><br><br> </div>";
        echo $msg;
        }
      }
    }
    
  }


  else {
    echo "0 results found";
  }

?> 

 


