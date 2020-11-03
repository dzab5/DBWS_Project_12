 
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="query.css" rel="stylesheet" type="text/css" />
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
$searchErr = '' ;
$search = '';


if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // if first name is given, put it in variable firstname
  // and check if it's a valid firstname (consists of chars and spaces only)
  if (empty($_POST["search"])) {
    $searchErr = "Name is required";
  } 
  else {
    $search = test_input($_POST["search"]);
  }

}




function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}




if ($search != '')
{
  $sql=" SELECT * FROM Computer WHERE ComputerBrand like '%".$search."%' ";
  $result = mysqli_query($conn, $sql);
  $cookie_name = "ID";
  if (mysqli_num_rows($result) > 0) {
  // output data of each row
    echo "Computers based on their brand <br> results of: "; 
    echo $search;
    echo "<br><br>" ;
    while($row = mysqli_fetch_assoc($result)) {
      echo "ComputerBrand: " .$row["ComputerBrand"]. "<br>";
      echo " Computer type: " . $row["ComputerType"]. "<br>"; 
      echo "Name: " . $row["ComputerName"]. "<br>" ;
      echo "Description: " .$row["ComputerDescr"]. "<br>";
      echo "RAM: " .$row["RAM"]. "<br>";
      echo "Price: " .$row["ComputerPrice"]. "<br>";
      
      
      $cookie_value = $row["ComputerID"];
      printf('<a href= "product_page.php" onClick="setCookie(\'%s\', \'%s\', 365);">click here </a> ', $cookie_name, $cookie_value);
      echo "<br><br>";
  }
}

  else {
    echo "0 results found";
}
}





$conn->close();

 
?> 
