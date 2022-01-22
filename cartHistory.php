
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
  <title>Order history</title>
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

$cphone=$_SESSION['phone'];

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

$sql = "SELECT * FROM success WHERE success.phone='$cphone'";
$result = $conn->query($sql);

//if ($result->num_rows > 0) {
  // output data of each row
 // while($row = $result->fetch_assoc()) {
   // echo "name: " . $row["name"]. " - phone: " . $row["phone"]. "-  txid: " . $row["tranx_id"]. "- status:" . $row["status"]."- date:" . $row["date"]."- amount: " . $row["amount"]. "- card:" . $row["cardtype"]."<br>";

//  }
//} 

?>
<html>
    <head>
        <style>
            th,td{
                border: 1px solid black;
            }
        .table {
          background-color: black;
          color: white;
          border: 2px solid black;
          margin: 20px;
          padding: 20px;
        }
        </style>
</head>
<div class="table">
    <table>
     <tr>
         <th>আপনার-নাম</th>
         <th>আপনার ফোন-নম্বর</th>
         <th>লেনদেন-নং</th>
         <th>লেনদেন-তারিখ</th>
         <th>লেনদেন অবস্থা </th>
         <th>টাকা</th>
         <th>কার্ড এর ধরন</th>
         <th>অবস্থা</th>

     </tr>
     <?php
         if (mysqli_num_rows($result)>0) {
         // output data of each row
         while($row = mysqli_fetch_array($result)) {
          ?>
            <tr>
                <td><?php echo $row["name"];?></td>
                <td><?php echo $row["phone"];?></td>
                <td><?php echo $row["tranx_id"];?></td>
                <td><?php echo $row["date"];?></td>
                <td><?php echo $row["status"];?></td>
                <td><?php echo $row["amount"];?></td>
                <td><?php echo $row["cardtype"];?></td>
                <td><?php echo $row["stat"];?></td>
            </tr>     
          <?php
          
             }
         }
       else {
         echo "0 results";
         }

$conn->close();
       ?>
    </table>
</div>
</body>

</html>    