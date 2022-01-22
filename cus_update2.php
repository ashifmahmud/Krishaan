

<?php

session_start();
$userid=$_SESSION['id'];



    if(isset($_POST['cusname']) && isset($_POST['dist']) && isset($_POST['subdist']) && isset($_POST['mail'])&& isset($_POST['cuspass'])  && isset($_POST['vill'])  ){
        $cusname=$_POST['cusname'];
        $num=$_POST['phone'];

        $pass=$_POST['cuspass'];
        $mail=$_POST['mail'];
        $dist=$_POST['dist'];
        $subdist=$_POST['subdist'];
        $vill = $_POST['vill'];
        
        

        //db connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "krishaak";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            if(isset($_POST['update']) ){

                                                                               // update  venue info
                $set1 = "update users set  name ='$cusname',  phone_num ='$num', password='$pass' ,  email='$mail', district='$dist', subdistrict ='$subdist', village = '$vill'   where id='$userid' ";
               // echo "$set1";
                $conn->exec($set1);
                //echo"venue updated";

                //echo "Data updated successfully";


            }
         }catch(PDOException $e)
            {
                echo "Database operation error";
             }

          $conn = null;

       }else{
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

    <style >
    .table {
 margin: auto;
 width: 24% !important;
 background-color: #82D066;
}
.contact-section {
    padding-top: 89px;
    padding-bottom: 220px;
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

<body class="container">

    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="container-fluid">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                           
                        </div>
                    </div>
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

    <!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container">
            <div align="center">
            <div class="row">
                <div class="col-lg-12">

                    <div class="contact-text">
                        <div class="section-title">
                            <h2>Data Updated Successfully </h2>

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

        <form >

          <table class="table table-borderless table-dark">
            <tbody>
              <tr>
                <td> Id </td>
                <td > : <?php echo $userid;?> </td>
              </tr>

              <tr>
                <td> Name </td>
                <td > : <?php echo $cusname; ?> </td>
              </tr>
              <tr>
                <td> Mail </td>
                <td > : <?php echo $mail; ?> </td>
              </tr>

              <tr>
                <td> District </td>
                <td > : <?php echo $dist; ?> </td>
              </tr>

              <tr>
                <td> Sub district </td>
                <td > : <?php echo $subdist;?> </td>
              </tr>

              <tr>
                <td> Village </td>
                <td > : <?php echo $vill;?> </td>
              </tr>

              <tr>
                <td> Phone </td>
                <td > : <?php echo $num; ?>  </td>
              </tr>

              <tr>
                <td> Password </td>
                <td > : <?php echo $pass; ?> </td>
              </tr>
              

            </tbody>
          </table>

        </form>
    </section>




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
