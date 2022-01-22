<!DOCTYPE html>
<html>
  <head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Map</title>
  <link rel="icon" href="/krishaan/img/krishaan1.png">
    <title>মানচিত্র</title>

    <style type="text/css">
      #map {
        height: 1000px;
        width: 80%;
      }
    </style>
<?php

$servername = "localhost";
$user = "root";
$pass = "";
$dbname ="krishaak";
$id = $_GET['id'];




try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $user, $pass);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  // use exec() because no results are returned
  $query = "SELECT * FROM farm_specialist WHERE id LIKE '$id'";
  $statement = $conn->query($query);
  
  foreach($statement as $row){
   $lat = $row['latitude'];
   $lng = $row['longitude'];



  }
  
 

    
    
  }
  
  
  
catch(PDOException $ex)
  {
  echo $e->getMessage();
  }

$conn = null;




?>
    <script>
      function initMap() {
        const loc = { lat: <?php echo $lat; ?>, lng:<?php echo $lng; ?> }; //latitude and longitude here
        const map = new google.maps.Map(document.getElementById("map"), {
          zoom: 16, //zoom here
          center: loc,
        });
        const marker = new google.maps.Marker({
          position: loc,
          map: map,
        });
      }
    </script>
  </head>
  <body>
    <<nav class="navbar navbar-light bg-success">
  <form class="container-fluid justify-content-start">
    <a class="btn btn-primary" href="expert.php">পিছনে</a>
    
    
  </form>
    <div id="map"></div>

    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB9qgRlRwx_95QnboYziBxhs8wOo6W0zPc&callback=initMap&libraries=&v=weekly"
      async
     ></script> <!-- key="key here"&callback...... -->
  </body>
</html>