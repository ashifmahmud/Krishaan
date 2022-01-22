<?php 
session_start();
ob_start();
?>
<html>
<head>
    <title>Payment</title>
    <link rel="icon" href="img/krishaan1.png">
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <style> 
            body{
            background-image: url("img/krishak2.jpg");
            background-color: #cccccc;
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-size: cover;
            backface-visibility: visible;
            }
        #bg{
            border-radius: 30px;
        }
    </style>
<body class="container" style="margin-top:100px">
    <h2 class="bg-success" id="bg">
    <b><form method="post" style="margin-left:50px; margin-top:50px">
        <br>    Transaction Id : <input type="text" name="txnid" id="txnid" placeholder="TxnId" required style="margin-left:40px"><br>
        ঠিকানা :
        <textarea name="delivery" style="margin-top:30px; margin-left:150px" id="delivery" rows="2" cols="40" placeholder="ঠিকানা" required></textarea><br/><br>
        যোগাযোগ :
        <input type="tel" name="number" id="number" style="margin-left:90px" placeholder="Phone Number" required ><br/><br>
        <button type="submit" name="confirm" id="confirm" class="btn-lg btn-warning flex-fill"><strong>Confirm Order</strong></button> 
        <br>
        <br>
    </form></b>
    </h2>
    
<?php
    if(isset($_POST['confirm']))
    {
        
    $txnid=$daddress=$cnumber=$payment_id=$user_id=$total="";
    if(isset($_SESSION['p_total'])) $total=$_SESSION['p_total'];
    if(isset($_SESSION['id'])) $user_id=$_SESSION['p_total'];
    if(isset($_POST['txnid'])) $txnid=$_POST['txnid'];
    if(isset($_POST['delivery'])) $daddress=$_POST['delivery'];
    if(isset($_POST['number'])) $cnumber=$_POST['number'];
    
    $con= mysqli_connect('localhost','root');
    mysqli_select_db($con,'krishaak');
    $con->set_charset("utf8");
    
    $query= "INSERT INTO payment(Payment_id,Total,tx_id,usersphone_num,usersid,delivery_address)
    VALUES('$payment_id','$total','$txnid','$cnumber','$user_id','$daddress')";
    
    $queryfire= mysqli_query($con,$query);
    $_SESSION['cnumber']=$cnumber;
        header("Location: order.php");
    }
    ?>

    </body>
</html>