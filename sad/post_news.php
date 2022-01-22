<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<link rel="icon" href="/krishaan/img/krishaan1.png">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <title>Post news</title>
  <style>
    #postdiv{
      border:10px solid #00cccc;
    }
    #nav{
      display: block;
      background: #00cccc;
      padding: 10px;
    }
    body{
      background-image: url("/krishaan/myforum.jpg");
      background-repeat: no-repeat;
      background-size: cover;
      background-attachment: fixed;
      
    }
    span{
      display:inline block;
      background:#00cccc;
      border:2px solid black;
      padding:6px;
      
    }
    #name {
      display: ;
      border: 5px solid #C6EAF9;



      background: #C6EAF9;

      font-family: Arial, Helvetica, sans-serif;
      font-size: 16px;
    }

    #title {
      display: ;
      border: 1px solid black;



      background: #C6EAF9;

      font-family: Arial, Helvetica, sans-serif;
      font-size: 16px;
    }

    #post {
      display: ;
      border: 2px solid #DDF9AD;



      background: #DDF9AD;

      font-family: Arial, Helvetica, sans-serif;
      font-size: 16px;
    }
    #comment{
      background:white;

    }


    .label {

      position: relative;
      left: 15px;
      color: Green;

      font-weight: bold;
    }

    .labelt {
      position: relative;
      left: 30px;
      color: BLACK;


    }

    .labeld {
      position: relative;
      left: 30px;
      color: black;


    }


    .form {
      background: yellow;

    }
  </style>
</head>

<body class = container>
 
<div id="nav">
  <span>
    <a href="admin_index.php" ><font color="white">মূ্লপাতা</font></a>
  </span>
  
  </div>
  <form action="#" method="post">
  <div>
    
    <div id="response">
      <textarea name="title" id="title" cols="136" rows="2" placeholder="শিরোনাম.."></textarea><br>
    </div>
    <div id="response">
      <textarea name="postbody" id="postbody" cols="150" rows="4" placeholder="পোস্ট লিখুন..."></textarea><br>
      <textarea name="link" id="link" cols="150" rows="4" placeholder="link..."></textarea><br>
      <input type="submit" name="submitp" class="btn btn-primary" value="পোস্ট করুন" ><br>
      
    </div>
  </form>

  </div>
</div>

<?php
$servername = "localhost";
$user = "root";
$pass = "";
$dbname = "krishaak";

if(isset($_POST["submitp"])){
  $title = $_POST['title'];
  $details = $_POST['postbody'];
  $link = $_POST['link'];
  $usernum = $_SESSION['phone'];
  $userid = $_SESSION['id'];

  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $user, $pass);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("set names utf8");
    
    $sql = "INSERT INTO news(post_name,details,link,Adminphone_num,Adminid)
    VALUES('$title','$details','$link','$usernum','$_SESSION[id]')";
     // use exec() because no results are returned
    $conn->exec($sql);
    echo "Post successful";

    
  }
  catch(PDOException $e)
  {
     echo $sql . "<br>" . $e->getMessage();
  }

$conn = null;
}



  

?>
</body>
</html>

