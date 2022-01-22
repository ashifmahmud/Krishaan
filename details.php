<?php
ob_start();
session_start();
?>


<html>
    <head>
    <title>Details</title>
    <link rel="icon" href="img/krishaan1.png">
        
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .navbar-item a:hover{
            background-color: black;
            border-radius: 10px;
        }    
        .navbar{
            background-color: limegreen;
        }

    </style>
        
    </head>
        
    <nav class="navbar sticky-top navbar-expand-lg mb-5 ">
        <img src="img/last.png" class="nav-link">
        <ul class="navbar-nav">
            <li class="navbar-item">
                <strong><a class="nav-link text-white" href="index.php">হোমপেইজ</a></strong>
            </li>
            
            <li class="navbar-item">
            <strong><a class="nav-link text-white " href="products.php">পণ্যসামগ্রী</a></strong>
            </li>
            
            <li class="navbar-item">
            <strong><a class="nav-link text-white" href="cart.php">কার্ট</a></strong>
            </li>
        </ul>

        </nav>
 
  <body class="container">  
    <?php 
    $pname="";
    if(isset($_POST['pname'])) $pname=$_POST['pname'];
    
    $con = mysqli_connect('localhost','root');
    mysqli_select_db($con,'krishaak');
    $con->set_charset("utf8");
    
        $query= "SELECT * 
            FROM product
            WHERE name LIKE '$pname'";
    $queryfire = mysqli_query($con,$query);
    
    $details = mysqli_fetch_array($queryfire);
    ?>
    <a name="dback" id="dback" href="products.php" class="btn-lg btn-success float-right mb-5"><strong>পেছনে</strong></a>
    <img name="cartimg" src="<?php echo $details['image']; ?>">
    
    <h2><strong><?php echo $details['name']; ?></strong><br></h2>
    <p><strong><?php echo $details['details']; ?></strong><br></p>
  

   </body> 
    
</html>   