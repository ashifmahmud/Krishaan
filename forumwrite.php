<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Write Post</title>
</head>
<body>
  <form action="#" method = "post">
    <div id = "response">
      <textarea name="title" id="title" cols="60" rows="2" placeholder = "Title.."></textarea><br>
      

    </div>
    <div id = "response">
      <textarea name="postbody" id="postbody" cols="60" rows="10" placeholder = "Write post.."></textarea><br>
      <input type="submit" name="submitp" id="submitp" value = "post">

    </div>
  
  </form>

  <?php


    $servername = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "krishaak";

    if(isset($_POST["submitp"])){
      $title= $_POST["title"];
      $postbody = $_POST["postbody"];
      $usernum = $_SESSION['phone'];
      $userid = $_SESSION['id'];
      
    }

      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $user, $pass);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if(empty($title) || empty($postbody)){
          echo "No post or title found";
  
        }
        else{
          $sql = "INSERT INTO post (title, details, usersphone_num, usersid, date)
                  VALUES ('$title','$postbody','$usernum','$userid',CURDATE())";
            // use exec() because no results are returned
            $conn->exec($sql);
            echo "Post successful";
            
        }
        }
    catch(PDOException $e)
        {
        echo $sql . "<br>" . $e->getMessage();
        }
  
    $conn = null;
      
  ?>
  
</body>
</html>