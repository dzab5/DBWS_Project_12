<html>
    <head>
        <script src="//code.jquery.com/jquery-1.12.4.js"></script>
        <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.js"></script>
        <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    </head>

    <link href="style.css" rel="stylesheet" type="text/css"/>
    <title> LAPTIC</title>

    <body>
        <div class="header">
            <h3> <img src="photos/laptic%20logo1.png" alt="logo"/> Top yourself with the perfect choice for you
            <div class = "header-right">
                <a class="active" href="Home.php">Home</a>
                <a href="search.php">Search</a>
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
	
        <style>
            html, body {
                height: 100%;
                padding: 0;
                margin: 0;
            }
            #map {
                /* configure the size of the map */
                width: 50%;
                height: 50%;
            }
        </style>
        <form method="post">
            <h1>Map</h1>
            <div id="map"></div>
            <script>
                $.getJSON('https://ipapi.co/json/', function(data) {
                    console.log(JSON.stringify(data, null, 2));
                    x = data["latitude"];
                    y = data["longitude"];
                    var map = L.map('map').setView([x, y], 7);

                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                    }).addTo(map);

                    L.marker([x, y]).addTo(map)
                    .bindPopup(data["ip"])
                    .openPopup();
                });
            </script>
        </form>
    </body>
</html>