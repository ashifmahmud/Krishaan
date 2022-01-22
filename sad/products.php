<html>
    <head>
    <title>Products</title>
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
        #name{
            background-color: springgreen;
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
            
           <form class="form-inline my-2 my-lg-0 ml-5" method="post">
            <input class="form-control mr-sm-2" type="text" name="search" id="search" placeholder="Search">
            
            <li class="navbar-item">
                 <button type="submit" class="btn btn-outline-light btn-light text-success my-2 my-sm-0" aria-label="Search" name="searchb" id="searchb"><strong>অনুসন্ধান করুন</strong></button>
            </li>
            </form>
        </ul>

        </nav>
    
    <body class="container">
        <div class="row">
         
                    
<?php
    $search=null;
    if (isset($_POST['search']))
    {
        $search= $_POST['search'];
    }
	$con = mysqli_connect('localhost','root');
    mysqli_select_db($con,'krishaak');
    $con->set_charset("utf8");

     
    $query= "SELECT * 
            FROM product
            WHERE name LIKE '%$search%'";
    $queryfire = mysqli_query($con,$query);
    
    $num= mysqli_num_rows($queryfire);
            if($num > 0)
            {
                while($product = mysqli_fetch_array($queryfire))
                {
                    ?>
            
            <div class="col-lg-4 col-md-4 col-sm-12 mb-5 mt-3">
            
                <div class="card">
                    
                    <h4 name="name" id="name" style="opacity:.9" class="card-title p-3 text-center"> <strong> <?php echo 
                        $product['name']; ?></strong> </h4>
                    
                    <div class="card-body" id="body">
                    <img name="image" id="image" src=" <?php echo 
                    $product['image']; ?> " alt="phone" class="img-fluid mb-2" style="margin-left:35px">
                    <h5 name="price" id="price" class="card-title"><strong> Tk <?php echo 
                    $product['Price']; ?></strong> </h5>
                
                <form method="POST" action="cart.php">
                    <input type="number" name="quantity" id="quantity" class="form-control mb-2" placeholder="পরিমাণ" required  min=1>
                    <input type="hidden" name="pname" value="<?php echo $product['name']?>">
                    <input type="hidden" name="pimage" value="<?php echo $product['image']?>">
                    <input type="hidden" name="pprice" value="<?php echo $product['Price']?>">
                    <input type="hidden" name="pid" value="<?php echo $product['product_id']?>">
                   
                    
                    <div class="btn-group d-flex">
                        <button type="submit" name="cart" id="cart" class="btn btn-success flex-fill"><strong>কার্টে যোগ করুন</strong></button>
                        
                        <button type="submit" name="buy" id="buy" class="btn btn-warning flex-fill"><strong>ক্রয় করুন</strong></button><br>            
                    </div>
                    
                </form>
                        <div class="btn-group d-flex">
                        <form action="details.php" method="post">
                        <input type="hidden" name="pname" value="<?php echo $product['name']?>">
                        
                            <button type="submit" name="details" id="details" class="btn btn-primary flex-fill text-light"><strong>বিস্তারিত</strong></button>
                        
                        </form>
                        </div>
                    </div>
            </div>
                 
                
            
            </div>
            <?php
            }
            
            }
            

            ?>
            
            
            
            
        </div>
    </body>
</html>