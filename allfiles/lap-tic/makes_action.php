<?php

    // Create connection to database
    $servername = "10.72.1.14";
    $username = "group12";
    $password = "SynPaR";
    $dbname = "group12";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
 
    //declare variables
    $username = $_POST['username'];
    $reviewid = $_POST['reviewid'];

    //insert into Makes table in database
    $sql = "INSERT INTO Makes (UserName, ReviewID) VALUES ('$username', '$reviewid')";

    //check if query worked
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    //close connection
    $conn->close();
    
?>
