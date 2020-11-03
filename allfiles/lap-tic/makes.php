<link href="sign_up.css" rel="stylesheet" type="text/css" />
<title> LAPTIC</title>
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

<form action="makes_action.php" method="post" style="border:1px solid #ccc">
    <div class="container">
        <select name ='username'>
        <?php 
            $db = mysqli_connect("10.72.1.14", "group12", "SynPaR", "group12");
            $res = mysqli_query($db, "SELECT * FROM User");
            while($row = mysqli_fetch_array($res)) {
                echo("<option value='".$row['UserName']."'>".$row['UserName']."</option>");
            }
            
        ?>
        </select>

    </div>
    <div class="container">
        <select name = 'reviewid'>
        <?php 
            $db = mysqli_connect("10.72.1.14", "group12", "SynPaR", "group12");
            $res = mysqli_query($db, "SELECT * FROM Reviews");
            while($row = mysqli_fetch_array($res)) {
                echo("<option value='".$row['ReviewID']."'>".$row['ReviewID']."</option>");
            }
        ?>  
        </select>
        <input type="submit">
    </div>                    
</form>
