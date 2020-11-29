<html>
    

<link href="style.css" rel="stylesheet" type="text/css" />
<title> LAPTIC</title>
<body>

<div class="header">
    
    <h3> <img src="photos/laptic%20logo1.png" alt="logo"/> Top yourself with the perfect choice for you
    <div class = "header-right">
        <a class="active" href="Home.php">Home</a>
        <a href="search.php">Search</a>
        <a href="map.php">Map</a>
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

    
<h2> Our best sellers </h2>
<div class="responsive">
    <div class="product">
      <a target="_blank" href="photos/laptop%201.jpg">
        <img src="photos/laptop%201.jpg" alt="Laptop">
      </a>
      <div class="desc"> Dell XPS 13: notebook with 13.4 inch display, Core ™ i7 processor, 16 GB RAM, 512 GB SSD, Intel Iris Plus graphics, platinum silver / black <br> 1400€</div>
    </div>
</div>
<div class="responsive">
    <div class="product">
      <a target="_blank" href="photos/laptop%202.jpg">
        <img src="photos/laptop%202.jpg" alt="Laptop">
      </a>
      <div class="desc"> MICROSOFT Surface Laptop 3: Microsoft Surface Laptop 3, 13.5 inch laptop (Intel Core i5, 8GB RAM, 128GB SSD, Win 10 Home) platinum <br> 1120 €</div>
    </div>
</div>    
<div class="responsive">
    <div class="product">
      <a target="_blank" href="photos/laptop%203.jpg">
        <img src="photos/laptop%203.jpg" alt="Gaming Laptop">
      </a>
      <div class="desc">MSI GL75 10SDR-222 43,9 cm (17,3 Zoll/144Hz) Gaming-Laptop (Intel Core i7-10750H, 16GB RAM, 512GB PCIe SSD + 1TB HDD, Nvidia GeForce GTX 1660 Ti 6GB, Windows 10 Home) <br> 1250€</div>
    </div>
</div>

<div class="clearfix"></div> 
    
<h2>Which type do you want?</h2>
    
<div class="wrapper">
    <a href="Laptop.html" class="button" >Normal Use Laptops</a>
    <a href="gaming.html" class="button">Gaming Laptops</a>
    <a href="PC.html" class="button">PCs</a>
</div>



</body>
</html>
