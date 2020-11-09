 
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="query.css" rel="stylesheet" type="text/css" />
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
	
	<script>
		
	
  function setCookie(cname,cvalue,exdays) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  var expires = "expires=" + d.toGMTString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
	
	</script>

</div>    
<body>

<form  method="post" >
	<h2> Enter Brand: </h2>
	<input type="text"  name="search" placeholder="Brand.. "> <br><br>
	<input class = "submit"  type="submit" value="Search"> <br><br>
	 
</form>


</body>
</html>



<?php



include 'config.php';




// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//$access = "GRANT SELECT ON *.* TO 'root'@'localhost' IDENTIFIED BY ''";
//mysqli_query($conn, $access);
// define variables and set to empty values
$searchErr = '' ;
$search = '';


if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // if first name is given, put it in variable firstname
  // and check if it's a valid firstname (consists of chars and spaces only)
  if (empty($_POST["search"])) {
    $searchErr = "Name is required";
  } 
  else {
    $search = "%{$_POST['search']}%";
  }

}






if ($search != '')
{
  // create a template
  $sql=" SELECT * FROM Computer WHERE ComputerBrand like ?";
  $stmt = mysqli_stmt_init($conn);
  // prepare the statment
  if (!mysqli_stmt_prepare ($stmt, $sql))
  {
    echo "Sql Statment Failed";
  }
  else
  {
    // bind the parameter
    mysqli_stmt_bind_param($stmt, "s", $search);
    // run the parameters in the database
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $cookie_name = "ID";
    if (mysqli_num_rows($result) > 0) {
    // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
        echo "ComputerBrand: " .$row["ComputerBrand"]. "<br>";
        echo " Computer type: " . $row["ComputerType"]. "<br>"; 
        echo "Name: " . $row["ComputerName"]. "<br>" ;
        echo "Description: " .$row["ComputerDescr"]. "<br>";
        echo "RAM: " .$row["RAM"]. "<br>";
        echo "Price: " .$row["ComputerPrice"]. "<br>";
        // setting cookie value and using it onClick for each link
        $cookie_value = $row["ComputerID"];
        printf('<a href= "product_page.php" onClick="setCookie(\'%s\', \'%s\', 365);">click here </a> ', $cookie_name, $cookie_value);
        echo "<br><br>";
      }
    }
  } 
}
  else {
    echo "0 results found";
}






$conn->close();

 
?> 
