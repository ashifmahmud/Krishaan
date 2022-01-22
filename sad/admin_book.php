<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Book</title>
  <link rel="icon" href="/krishaan/img/krishaan1.png">

  <style>

    h1{
      color:white;
      background-color: green;
      text-align: center;
      padding:8px
    }
    #title{
      font-weight:bold;
      color: white;
      background-color: black;
      padding: 8px;
      border-radius: 2px;
      
    }

    body{
      background-image: url("/krishaan/books.jpg");
      background-repeat: no-repeat;
      background-size: cover;
      background-attachment: fixed;
      font-family: Arial, Helvetica, sans-serif;
    }

  .image{
    height:300px ;
    width:250px;
    padding: 10px;
  }
  #dbook{
    text-align: center;
    
    margin-bottom:15px;
    

  }
  #book{
    padding:10px;
  
    
  }
  #but{
    background:blueviolet;
  }

  
  </style>
</head>
<body class="container">
  
<nav class="navbar navbar-light bg-success">
  <form class="container-fluid justify-content-start">
    <a class="btn btn-success" href="index.php">মূলপাতা</a>
    
    
  </form>
</nav>
  
<h1>কৃষি বিষয়ক বই সমূহ </h1>

<form action="book_upload.php" method="POST" enctype="multipart/form-data">
      <input type="file" name="file" class="hidden">
      <br>
      <button type="submit" class="btn btn-primary" name="submit">Upload</button>
  
  </form>
  <form action="#" method="post">
  <div>
    
    
    <div id="response">
      <textarea name="postbody" id="postbody" cols="150" rows="2" placeholder="বইয়ের নাম..."></textarea><br>
      <textarea name="postbody_eng" id="postbody" cols="150" rows="2" placeholder="Name in english..."></textarea><br>
      <textarea name="author" id="postbody" cols="150" rows="2" placeholder="author..."></textarea><br>
      <textarea name="link" id="link" cols="150" rows="2" placeholder="link..."></textarea><br>
      <input type="submit" name="submitp" class="btn btn-primary" value="পোস্ট করুন" ><br>
      
    </div>
  </form>



<?php
    $servername = "localhost";
    $user = "root";
    $pass = "";
    $dbname ="krishaak";



    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $user, $pass);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $conn->exec("set names utf8");
     
      
      // use exec() because no results are returned
      if(isset($_POST["submitp"])){
        $image = $_SESSION['filename1'];
        $post = $_POST['postbody'];
        $post_eng = $_POST['postbody_eng'];
        $link = $_POST['link'];
        $author = $_POST['author'];


      

      $sql = "INSERT INTO book(title,title_eng,author,images, dlink)
          VALUES('$post','$post_eng','$author','$image','$link')";
    // use exec() because no results are returned
    $conn->exec($sql);
      }




      $query = "SELECT * FROM book";
      $statement = $conn->query($query);
      

      foreach($statement as $row){  //fetching datas
        echo "<div id=dbook >";
        echo '<span id=book>';
        //echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image']).'" height=300px width=250px style="padding:10px;"><br>';
        echo '<img class="image" src=uploads/'.$row['images'].'>';
        echo '<div id=title class="bg-success">'.$row['title'].'<br>';
        echo ''.$row['author'].'</div><br>';
        echo '<span> <a href="'.$row["dlink"].'" target="_blank">ডাউনলোড করুন অথবা পড়ুন</a></span><br>';

       
        


        echo '</span>';
        echo '</div>';
      }
      
    }
      
  catch(PDOException $ex)
      {
      echo $e->getMessage();
      }
  
  $conn = null;
  

   



?>
</body>
</html>