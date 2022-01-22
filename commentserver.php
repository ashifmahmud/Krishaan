<?php

$servername = "localhost";
$user = "root";
$pass = "";
$dbname = "krishaak";

if(isset($_POST["submitc"])){
  $details =$_POST['postbody'];
  $usernum = $_SESSION['phone'];
  $userid = $_SESSION['id'];
  $catg = $_SESSION['catg'];
  
  




  try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $user, $pass);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $conn->exec("set names utf8");
      if(empty($details)){
        $sql = "INSERT INTO comment(details,date,farm_specialistphone_num,PostPost_id)
        VALUES('$details',CURDATE(),'$usernum','$_SESSION[postid]')";
       // use exec() because no results are returned
       $conn->exec($sql);
      ///echo "Post successful";

      }
      else{
        
        if($_SESSION['catg']==1){
          $sql = "INSERT INTO comment(details,name,date,farm_specialistphone_num,PostPost_id)
          VALUES('$details','$_SESSION[name]',CURDATE(),'$usernum','$_SESSION[postid]')";
          // use exec() because no results are returned
          $conn->exec($sql);
          ///echo "Post successful";
          
            
        }
        else{
          $sql = "INSERT INTO comment(details,name,date,usersphone_num,PostPost_id)
            VALUES('$details','$_SESSION[name]',CURDATE(),'$usernum','$_SESSION[postid]')";
            // use exec() because no results are returned
            $conn->exec($sql);
            ///echo "Post successful";


        }
      }
      }
  catch(PDOException $e)
      {
         echo $sql . "<br>" . $e->getMessage();
      }

  $conn = null;
    }
?>