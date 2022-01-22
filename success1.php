
<!DOCTYPE html>
<html lang="en">
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
  <title>News</title>
  <link rel="icon" href="/krishaan/img/krishaan1.png">

  <style>
    
    h1{
      background:#00cccc;
      border : 5px solid #00cccc;
      padding: 10px;
      text-align:center;
      color: white;
      
    }
    body{
      background-image: url("/krishaan/newsbg1.jpg");
      background-repeat: no-repeat;
      background-size: cover;
      background-attachment: fixed;
      font-family: Arial, Helvetica, sans-serif;
    }
    #title{
      display:block;
      background:#83E745;
      font-family: Arial, Helvetica, sans-serif;
      padding:10px;
      border-radius:5px;

    }
    #news{
      margin:auto;
      text-align:center;
    }
  </style>
</head >
<body class=container>
<nav class="navbar navbar-light bg-success">
  <form class="container-fluid justify-content-start">
    <a class="btn btn-success" href="index.php">মূলপাতা</a><br>
    <a class="btn btn-success" href="products.php">পিছনে</a>
    
  </form>
</nav>
<?php

session_start();

$trxid=$_SESSION['tranxid'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "krishaak";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM success WHERE success.tranx_id='$trxid'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    //echo "name: " . $row["name"]. " - phone: " . $row["phone"]. "txid " . $row["tranx_id"]. "status" . $row["status"]."date" . $row["date"]."amount " . $row["amount"]. "card" . $row["cardtype"]."<br>";
      
      $username=$row["name"];
      $phone=$row["phone"];
      $tid=$row["tranx_id"];
      $tstatus=$row["status"];
      $tdate=$row["date"];
      $tamount=$row["amount"];
      $tcard=$row["cardtype"];
  }
} else {
  echo "0 results";
}

$conn->close();
    
//echo $trxid;

?>
<div>
     <h3> নাম : <?php echo $username; ?></h3>
     <h3> মোবাইল নাম্বার : <?php echo $phone; ?></h3> 
     <h3> লেনদেন নং : <?php echo $tid;  ?></h3>  
     <h3>লেনদেন তারিখ : <?php echo $tdate;  ?></h3>
     <h3>লেনদেন অবস্থা: <?php echo $tstatus;  ?></h3>
     <h3>টাকা : <?php echo $tamount;  ?></h3>
     <h3> কার্ড এর ধরন : <?php echo $tcard;  ?></h3><br>
     <h2>আপনার অর্থ প্রদান সফল হয়েছে।</h2>
     <h2>আমাদের সাথে থাকার জন্য ধন্যবাদ । ভালো থাকবেন ।</h2>
     <?PHP $_SESSION['name'] = $username;
          
          $_SESSION['phone'] = $phone;
  

          ?>

    
</div>