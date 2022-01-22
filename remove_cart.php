<?php 
ob_start();  

    $con = mysqli_connect('localhost','root');
    mysqli_select_db($con,'krishaak');
    $con->set_charset("utf8");

        if(isset($_POST['rcart']))
        {
            if(isset($_POST['phname'])) $pname=$_POST['phname'];
            $query2= "DELETE FROM cart
                      WHERE name LIKE '$pname'";
            $queryfire2 = mysqli_query($con,$query2);
            header("Location: cart.php");
        }
        ?>