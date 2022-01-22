<?php 
session_start();
ob_start();

$con= mysqli_connect('localhost','root');
mysqli_select_db($con,'krishaak');
$con->set_charset("utf8");

?>

<html>
    <head>
    <title>Order</title>
    <link rel="icon" href="img/krishaan1.png">
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <form action="index.php">
    <button type="submit" name="order" id="order" class="btn-lg btn-warning float-top mt-2"><b>হোমপেইজ</b></button>  
    </form>
    </head>
    <style>
            body{
            background-image: url("img/krishak2.jpg");
            background-color: #cccccc;
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-size: cover;
            }
        #mark{
            border-radius: 40px;
            background-color: aqua;
        }
    </style>
    
    <body class="container" style="margin-top:80px">
<?php 
        
        $userid=$username=$orderid=$cnumber=$pname=$ordertime=$deldate="";
        $deldate=date('Y-m-d', strtotime("+3 days"));
        $ordertime= date("Y-m-d h:i:sa",strtotime('+5 hour'));
                
        if(isset($_SESSION['order_details'])) $pname=$_SESSION['order_details'];
        
        if(isset($_SESSION['cnumber'])) $cnumber=$_SESSION['cnumber'];
        if(isset($_SESSION['id'])) $userid=$_SESSION['id'];
        if(isset($_SESSION['name'])) $username=$_SESSION['name'];
            
            $query= "INSERT INTO `order`(usersid,Order_by,order_details,Order_id,usersphone_num,Order_dateTime,delivery_within) VALUES('$userid','$username','$pname','$orderid','$cnumber','$ordertime','$deldate')";
            
            $queryfire = mysqli_query($con,$query);
        
        ?>        
        
        
        
        
       <b> <div class="text-center mb-3 mt-3" id="mark">  
            <br>
            <h1>
            অর্ডার সম্পন্ন হয়েছে ।
            </h1>
            <h3> নাম : <?php echo $username; ?></h3>
            <h3> মোবাইল নাম্বার : <?php echo $cnumber; ?></h3>
            
            <h3> অর্ডার সময় : <?php echo $ordertime;  ?></h3>
            <h3> সম্ভাব্য প্রাপ্তির দিন : <?php echo $deldate;  ?></h3><br><br>
            <h1>
          আমাদের সাথে থাকার জন্য ধন্যবাদ । ভালো থাকবেন ।
            </h1>
           <br>
        </div>
        </b>
        <?php  
        $query1= "DELETE FROM cart";
        $queryfire1 = mysqli_query($con,$query1);
        
        ?>
    </body>
</html>