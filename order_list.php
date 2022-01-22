
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Yoga Studio Template">
    <meta name="keywords" content="Yoga, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order list</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,500,600,700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">

    <style>
        .srch {
    float: right;
    height: 10px;
    left: 942px;
    bottom: 46px;
    padding: 10px 20px;
}
.t {
        color: black;
        font-size: 30px;
        text-align: center;
        font-family: "Times New Roman", Times, serif;
        float: left; 
        margin-right: 30px; 
    }
    </style>
</head>

<body>
    <!-- Page Preloder -->
   
    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="container-fluid">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="./index.html"><img src="img/logo2.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-10">
                        <nav class="main-menu mobile-menu">

                            <ul class="srch">
                                <li><a href="admin_index.php">মূলপাতা</a></li>
                                
                                
                            </ul>
                        </nav>
                        <div id="mobile-menu-wrap"></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container">
            <div align="center">
            <div class="row">
                <div class="col-lg-12">

                    <div class="contact-text">
                        <div class="section-title">
                            <h2>Order List</h2>

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
    <div class="classes-time-section spad set-bg" data-setbg="img/pic-1.jpg">
        <div class="container">
            <div class="row">
              <table class="table table-striped table-dark">
  <thead>
    <tr>
    <th>ID</th>
    <th>User Name</th>
    <th>Phone No.</th>
    <th>Transaction ID</th>
    <th>Validity</th>
    <th>Date of Payment & Time</th>
    <th>Paid Amount</th>
    <th>Type of payment</th>
    <th>Status</th>
    </tr>
  </thead>
  <tbody>
    <?php
         $host = "localhost";
         $username = "root";
         $password = "";
         $dbname = "krishaak";

       try{
           $con = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

           $stmt="SELECT * FROM success ORDER BY date";
           $returnobject=$con->query($stmt);

           $table=$returnobject->fetchAll(PDO::FETCH_NUM);

           foreach($table as $row){
              echo "<tr> <td>"
                  . $row[0]. "</td><td>"
                  . $row[1]. "</td><td>"
                  . $row[2]. "</td><td>"
                  . $row[3]. "</td><td>"
                  . $row[4]. "</td><td>"
                  . $row[5]. "</td><td>"
                  . $row[6]. "</td><td>"
                  . $row[7]. "</td><td>"
                  . $row[8]. "</td><td>"
                  ?><a class="btn btn-primary btn-block" href="ok.php?id=<?php echo $row[0] ?>">success</a><a class="btn btn-primary btn-block" href="del.php?id=<?php echo $row[0] ?>">cancel</a><?php "</td></tr>"  ;

           }

       }
       catch(PDOException $ex){
           echo "<script>window.location.assign('index.php?status=dberror')</script>";
       }

   ?>
  </tbody>
</table>
            </div>
        </div>
    </div>
    
    <!-- Search model -->
	<div class="search-model">
		<div class="h-100 d-flex align-items-center justify-content-center">
			<div class="search-close-switch">+</div>
      <form method="post" class="search-model-form" action="sch_by_vnname-ad.php">
        <input type="text" name="vnname" placeholder="Search Venues here.....">
        <br>
        <br>
          <a href="search_venue-ad.php" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Search Venues By Filter</a>

      </form>
      <form class="search-model-form" method="post" action="sch_by_vdname-ad.php">
				<input type="text" id="vdname" name="vdname" placeholder="Search Vendors here.....">
                <br>
                <br>
                <a href="search_vendor-ad.php" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Search Vendors By Filter</a>
			</form>

		</div>
	</div>
    <!-- Search model end -->

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
