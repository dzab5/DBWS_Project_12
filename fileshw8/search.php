<html>
    

<link href="style.css" rel="stylesheet" type="text/css" />
<title> LAPTIC</title>
<body>

<div class="header">
    
    <h3> <img src="photos/laptic%20logo1.png" alt="logo"/> Top yourself with the perfect choice for you
    <div class = "header-right">
        <a class="active" href="search.php">Search</a>
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

    

    
<h2>THE QUERIES YOU CAN ACCESS</h2>
    
<div class="wrapper">
    <a href="query.php" class="link" >Search Computers based on Brands</a> <br> <br>
    <a href="query2.php" class="link" >Search Computers based on maximum Price</a></a> <br> <br>
    <a href="query3.php" class="link" >Search Users based on their State</a> <br> <br>
</div>



</body>
</html>