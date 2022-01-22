<?php
ob_start();
session_start();
?>
<html>
    <head>
    <title>Cart</title>
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
        
        body{
            background-image: url("img/krishak2.jpg");
            background-color: #cccccc;
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-size: cover;
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
        </ul>

        </nav>   
    
    <body class="container">
<?php 
    
    $price=$name=$image=$quantity=$id="";
	$con = mysqli_connect('localhost','root');
    mysqli_select_db($con,'krishaak');
    $con->set_charset("utf8");
    
    

if( isset($_POST['buy'])){
    
    if(isset($_POST['pname'])) $name= $_POST['pname'];
    if(isset($_POST['pid'])) $id= $_POST['pid'];
    if(isset($_POST['pprice'])) $price= $_POST['pprice'];
    if(isset($_POST['pimage'])) $image= $_POST['pimage'];
    if(isset($_POST['quantity'])) $quantity= $_POST['quantity'];
    
    $query= "INSERT INTO cart(product_id,image,name,price,quantity)
    VALUES('$id','$image','$name','$quantity'*'$price','$quantity')";
    $queryfire = mysqli_query($con,$query);

}

if( isset($_POST['cart']) )
{

    if(isset($_POST['pname'])) $name= $_POST['pname'];
    if(isset($_POST['pid'])) $id= $_POST['pid'];
    if(isset($_POST['pprice'])) $price= $_POST['pprice'];
    if(isset($_POST['pimage'])) $image= $_POST['pimage'];
    if(isset($_POST['quantity'])) $quantity= $_POST['quantity'];
    
    $query= "INSERT INTO cart(product_id,image,name,price,quantity)
    VALUES('$id','$image','$name','$quantity'*'$price','$quantity')";
    
    $queryfire = mysqli_query($con,$query);
    
    header("Location: products.php");

} 
    $odetails="";
    ?>
    
    <div class="row">
   <?php 
    $cquery= "SELECT * 
            FROM cart "; 
    $cqueryfire = mysqli_query($con,$cquery);
    $total=0;
    while($cartp = mysqli_fetch_array($cqueryfire))
    { ?>
     <div class="col-lg-3 col-md-3 col-sm-12 mb-5">    
    <div class="card">
    <img name="cartimg" src="<?php echo $cartp['image']; ?>">
    <div class="card-body text-center">
    <strong><?php echo $cartp['name']; ?></strong><br>
    <strong><?php echo $cartp['quantity'].' X মূল্য = '.$cartp['price'].'TK'; ?></strong>
        <br><br>
        <form action="remove_cart.php" method="post">
         <input type="hidden" name="phname" value="<?php echo $cartp['name']?>">
            
        <button type="submit" name="rcart" id="rcart" class="btn btn-success flex-fill"><strong>কার্ট থেকে সরান</strong></button>
        </form>

    </div>
    </div>
    </div> 
    <?php
     $total= $total+$cartp['price'];
     
     $odetails.= " ".$cartp['quantity']." * ".$cartp['name']." -"; 
    }
        
        

        
        
        $_SESSION['p_total']=$total;
        $_SESSION['order_details']=$odetails;

     ?>
    
     </div>
    <?php
        
    
    if($total>0)
    {
    ?>
    <h1 class=" bg-success text-white" style="opacity:.9">
    <?php echo 'মোট মূল্য: TK '.$total;?>    </h1>
    <form action="payment.php">
     <div class="btn-group">
        <a href="checkout.php?price=<?php echo $total?>" class="btn btn-primary btn-sm">টাকা প্রদান</a>
        </div>  
<!--    <button type="submit" name="order" id="order" class="btn-lg btn-warning flex-fill float-right mb-5"><strong> অর্ডার করুন</strong></button>  -->
    </form>
    <?php 
    }
    else{
        ?> <h1 class="text-white">কার্টে কোন পণ্য নেই ।</h1>
    <?php 
    }
    ?>
    </body>
</html>