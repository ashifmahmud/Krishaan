<?php
$servername = "localhost";
$user = "root";
$pass = "";
$dbname = "krishaak";

if(isset($_POST["register"])){
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password1"];
  $password1 = $_POST["password2"];
  $mobile = $_POST["mobile"];
  $dist = $_POST["dist"];
  $subdist = $_POST["subdist"];
  $vill = $_POST["vill"];
  $post = $_POST["post"];




  try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $user, $pass);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      if($password!=$password1 || empty($username) || empty($mobile)){
        echo "Fill up the form correctly!";
        echo "";
        if($password != $password1){
          echo "Incorrect password!";
          header('location: register.php');
        }

      }
      else{
        $sql = "INSERT INTO users (name, email, phone_num, password, district, subdistrict, village, post)
                VALUES ('$username','$email','$mobile','$password1','$dist','$subdist','$vill','$post')";
          // use exec() because no results are returned
          $conn->exec($sql);
          echo "New record created successfully";
          
      }
      }
  catch(PDOException $e)
      {
      #echo $sql . "<br>" . $e->getMessage();
      echo "Phone number already used/আপনার মোবাইল নাম্বার ইতি মধ্যে নিবন্ধিত হয়েছে, দয়া করে নতুন নাম্বার লিখুন";
      }

  $conn = null;
    }
?>