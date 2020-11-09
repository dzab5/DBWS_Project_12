<html>
    <?php
    session_start();
   
    if (!($_SESSION['user_type'] == "Admin"))
    {
        header("Location: admins.php");
    }
    ?>
    <head> 
        <meta charset="utf-8">
        <title> Maintenance Page</title>    
        <link href="soon.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <header>
        <div class = "Soon">
            <p> Patience is key to greatness </p>
            <h1> WE ARE UNDER MAINTENANCE</h1>
            <hr>
        </div>
            <h2><br><br></h2>
    
        <div class="wrapper">
            <a href="sign_up.html" class="button">Sign-Up</a>
            <a href="computer.html" class="button">Computer</a>
            <a href="cart.html" class="button">Cart</a>
            <a href="order.html" class="button">Order</a>
            <a href="payment.html" class="button" >Payment</a>
            <a href="review.html" class="button">Reviews</a>
            <a href="makesan.php" class="button">Makes-an</a>
            <a href="makes.php" class="button" >Makes</a>
            <a href="shippedto.php" class="button">Shipped-to</a>
            <a href="log_out.php" class="button">log-out</a>

        </div>
        </header>
        
    </body>

</html>
