<?php

session_start();

$servername = "localhost";
$user = "root";
$pass = "";
$dbname = "krishaak";

$id_no = $_GET['rn'];



  
  




  try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $user, $pass);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $conn->exec("set names utf8");
    
        $sql = "DELETE FROM post WHERE Post_id='$id_no' ";
       // use exec() because no results are returned
       $conn->exec($sql);
      ///echo "Post successful";

      if($_SESSION['admin']==1){
        header('location:admin_forum.php');

      }
      else{
        header('location:myforum.php');
      }
      

      }
  catch(PDOException $e)
      {
         echo $sql . "<br>" . $e->getMessage();
      }

  $conn = null;
    
?>