
<?php
session_start();
    $userid="";
  


if(isset($_SESSION['id']))  {


    $userid=$_SESSION['id'];
    

    // db connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "krishaak";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if($userid == $_SESSION['id']){
            $stmt="SELECT * FROM users  where  id='$userid'";
            $returnobject= $conn->query($stmt);

            $tb= $returnobject->fetchAll(PDO::FETCH_NUM);
            
            
            // echo "exists" ;

            
            $cusname=$tb[0][0];
            $num=$tb[0][1];

            $pass=$tb[0][2];
            $mail=$tb[0][3];
            $dist=$tb[0][4];
            $subdist=$tb[0][5];
            $vill = $tb[0][6];

            
        }

        

    }catch(PDOException $e) {
        echo "Database operation error";
     }

    $conn = null;

   }
   else{
    echo"missing data / no data entered ";
   }

?>

<!DOCTYPE html>
<html lang="zxx">

<head>
<link rel="icon" href="/krishaan/img/krishaan1.png">
    <meta charset="UTF-8">
    <meta name="description" content="Yoga Studio Template">
    <meta name="keywords" content="Yoga, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>update</title>

    <!-- Google Font -->
    

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
<style>
.btn-lg {
  padding: -0.5rem 0rem;
  font-size: 1.25rem;
  line-height: 1.5;
  border-radius: 2.3rem;
  margin-top: 8px;

}
.btn-block {
    display: block;
    width: 51%;
}
.btn-primary, .btn-primary:active, .btn-primary:visited {
    background-color: #82D026 !important;
    border-color: #82D026;
}
.btn-primary:hover{
  background-color: #fff !important;
  border-color: #82d026;
  color: #82d026;
}
.srch {
    float: right;
    height: 68px;
    left: 942px;
    bottom: 46px;
    padding: 10px 20px;
    
}
</style>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="container-fluid">
            <div class="inner-header">
                <div class="row">


                    <div class="col-lg-10 col-md-10">
                        <nav class="main-menu mobile-menu">
                            <ul class="srch">
                                
                                <nav class="navbar navbar-light bg-success">
                                    <form class="container-fluid justify-content-start">
                                        <a class="btn btn-success" href="index.php">মূলপাতা</a>
    
                                    </form>
                                </nav>
                            </ul>
                        </nav>
                        <div id="mobile-menu-wrap"></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->
    <!-- Hero Section Begin -->
    <div class="hero-section set-bg" data-setbg="img/events-5.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hero-text">
                        <h1></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Section End -->
    <!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container">
            <div align="center">
            <div class="row">
                <div class="col-lg-12">

                    <div class="contact-text">
                        <div class="section-title">
                            <h2>Edit Profile</h2>

                        </div>



                        <div class="contact-widget">
                            <ul>
                                <li></li>
                                <li></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
          </div>

        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Classes Time Section End -->
    <div class="classes-time-section spad " style="  padding-top: 65px;padding-bottom: 211px;padding-left:250px;">
        <div class="container">
          <div align="center">
            <div class="row">

              </div>

              <form method="post" action="cus_update2.php">

              

              <div class="form-group row">

                <label for="cusname" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-6">
                   <input type="text" id="cusname" name="cusname" value="<?php echo $cusname;?>"class="form-control">
                </div>
              </div>

              <div class="form-group row">

                <label for="dist" class="col-sm-2 col-form-label">District</label>

                <div class="col-sm-6">
                    <input type="text" id="dist" name="dist" value="<?php echo $dist;?>" class="form-control" >
                </div>
              </div>
                <div class="form-group row">

                <label for="subdist" class="col-sm-2 col-form-label">Sub district</label>

                <div class="col-sm-6">
                    <input type="text" id="subdist" name="subdist" value="<?php echo $subdist;?>" class="form-control" >
                </div>
              </div>
                <div class="form-group row">

                <label for="vill" class="col-sm-2 col-form-label">Village</label>

                <div class="col-sm-6">
                    <input type="text" id="vill" name="vill" value="<?php echo $vill;?>" class="form-control" >
                </div>
              </div>

              <div class="form-group row">

                <label for="phone" class="col-sm-2 col-form-label">Phone</label>


                <div class="col-sm-6">
                    <input type="text" id="phone" name="phone"  value="<?php echo $num;?>"  class="form-control" >
                </div>
              </div>

              <div class="form-group row">

                <label for="mail" class="col-sm-2 col-form-label">Email </label>


                <div class="col-sm-6">
                    <input type="text" id="mail" name="mail" value="<?php echo $mail;?>" class="form-control" >
                </div>
              </div>

              


              <div class="form-group row">

                <label for="cuspass" class="col-sm-2 col-form-label">password </label>


                <div class="col-sm-6">
                    <input type="password"  id="cuspass" name="cuspass" value="<?php echo $pass;?>" class="form-control" >
                </div>
              </div>



              <div class="form-group row">
                <div class="col-sm-10">
                  <button type="submit" name="update" value="update" class="btn btn-primary">Update</button>
                </div>
              </div> </div>
  </form>

  <?php
      if(isset($_GET['status'])){
          $status=$_GET['status'];
          if($status=='invalid'){
              echo "<script>window.alert('invalid input')</script>";
          }
          else if($status=='dberror'){
              echo "<script>window.alert('Database Connection Error')</script>";
          }
          else if($status=='wrongdata'){
              echo "<script>window.alert('wrong/missing input')</script>";
          }
      }

  ?>









            </div>
        </div>
    </div>
    <div class="search-model">
		<div class="h-100 d-flex align-items-center justify-content-center">
			<div class="search-close-switch">+</div>
      <form method="post" class="search-model-form" action="sch_by_vnname-cus.php">
        <input type="text" name="vnname" placeholder="Search Venues here.....">
        <br>
        <br>
          <a href="search_venue-cus.php" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Search Venues By Filter</a>

      </form>
      <form class="search-model-form" method="post" action="sch_by_vdname-cus.php">
				<input type="text" id="vdname" name="vdname" placeholder="Search Vendors here.....">
                <br>
                <br>
                <a href="search_vendor-cus.php" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Search Vendors By Filter</a>
			</form>

		</div>
	</div>

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/circle-progress.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
