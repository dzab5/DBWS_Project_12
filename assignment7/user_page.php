
<html> 


<link href="user_page.css" rel="stylesheet" type="text/css" />
<title> LAPTIC</title>

<body>
<div class="header">
    
    <h3> <img src="photos/laptic%20logo1.png" alt="logo"/> Top yourself with the perfect choice for you
    <div class = "header-right">
    
        <a href="Home.html">Home</a>
        <a class="active" href="sign_in.html">Log In</a>
        <a href="about.html">About Us</a>
        <a href="imprint.html">Imprint</a>
        
    </div>
    </h3>
</div>


      
     
</body>      

</html>
   

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

$User_ID = $_COOKIE["UserID"];

if ($User_ID != '')
{
  $sql="SELECT * FROM User WHERE UserName = '$User_ID'";
  $result = mysqli_query($conn, $sql);
  
  //$query = mysqli_query($conn, $sql) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);

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
  
  


  else {
    echo "0 results found";
}
}
?> 

 


