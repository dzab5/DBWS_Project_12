
<html>


<link href="product_page.css" rel="stylesheet" type="text/css" />
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

$laptop_ID = $_COOKIE["ID"];

if ($laptop_ID != '')
{
  $sql="SELECT * FROM Computer WHERE ComputerID = ? ";
  $stmt = mysqli_stmt_init($conn);
  // prepare the statment
  if (!mysqli_stmt_prepare ($stmt, $sql))
  {
    echo "Sql Statment Failed";
  }
  else
  {
    // bind the parameter
    mysqli_stmt_bind_param($stmt, "s", $laptop_ID);
    // run the parameters in the database
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
  
  //$query = mysqli_query($conn, $sql) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
    if (mysqli_num_rows($result) > 0) {
    // output data of each row
      //echo "Computers based on their brand <br> results of: "; 
      //echo $laptop_name;
      //echo "<br><br>" ;
      while($row = mysqli_fetch_assoc($result)) {
        $msg = "<a target='_blank' href='photos/'".$row['ComputerPhoto']."' '> <img class = 'pic' src='photos/".$row['ComputerPhoto']."' ' alt='Laptop'> </a>";
        echo $msg;
        
        $msg = "<h3>" . $row['ComputerName'] . "</h3>";
        echo $msg;
        
        $msg = "<div class='desc'>" . $row['ComputerDescr'] . "<br> <br>" . $row['ComputerPrice'] .  "€ <br><br><br><br><br><br><br><br><br> </div>";
        echo $msg;
      }
    }
    
  
  }
}

  else {
    echo "0 results found";
}

?> 
<html>
 
    </div>
</div>  
<div class="wrapper">
    <a class="button" href="payment.html"  >buy now</a>
    <a class="button" href="cart.html" >add to cart</a>

</div>


