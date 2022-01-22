<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <title>Comments</title>
  <style>
    body{
      background-image:url('/krishaan/img/comment.jpeg');
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
<body>



  <!-- <form action="#">
    <div>
      <a href="forumwrite.php"> <h1>Write post... </h1></a>
    </div>

  <br><br> -->
  <span>
    <a href="forum.php">Back</a>
    <a href="index.php">  Home</a>
  </span>

<div id="showpost">  
  <?php

  $servername = "localhost";
  $user = "root";
  $pass = "";
  $dbname = "krishaak";
  $_SESSION['postid'] = $_GET['id'];


  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $user, $pass);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // use exec() because no results are returned
    $query1 = "SELECT * FROM post AS ps JOIN users AS us ON us.phone_num = ps.usersphone_num WHERE ps.Post_id LIKE '$_GET[id]' ORDER BY ps.Post_id DESC";//get post
    $statement1 = $conn->query($query1);

    foreach ($statement1 as $row1) {
      echo '<div class = bg-info p-2 >
          <div id = "name"><label class = "label">' . $row1["name"] . '<label></div>
           
          <div id = "title"><label class = "labelt">Title:' . $row1["title"] . '<label></div>
          
          <div id = "post"><label class = "labeld">' . $row1["details"] . '<label></div>
          
          
          </div>
          ';?>

  <div>

    <div id="response">
      <textarea name="postbody" id="postbody" cols="60" rows="5" placeholder="Write comment..."></textarea><br>
      <input type="button" name="submitp" id="submitp" value="Comment" onclick="callajax()"><br><br>
      
      
    </div>

  </div>  
        
        <?php    
    }
  } catch (PDOException $ex) {
    echo $e->getMessage();
  }
  $query = "SELECT * FROM comment AS cmnt JOIN users AS us ON us.phone_num = cmnt.usersphone_num WHERE POSTPOST_id ='$_SESSION[postid]' ORDER BY cmnt.Comment_id DESC";
  $statement = $conn->query($query);


foreach ($statement as $row) {
  echo '<div class = bg-info p-2 >
      <div id = "name"><label class = "label">' . $row["name"] . '<label></div>
       
      <div id = "title"><label class = "labelt">' . $row["details"] . '<label></div>
      
      
      </div>
      <br>';
}

  $conn = null;

  ?>

</div>

  <!-- </form> -->
  <script>
    var httprequest;
    function callajax() {
      httprequest=new XMLHttpRequest();

     // var titlecomp=document.getElementById('title');
      var pbodycomp=document.getElementById('postbody');
      //var titleval=titlecomp.value;
      var pbodyval=pbodycomp.value;

      httprequest.onreadystatechange=showupdategui;

      httprequest.open("GET","ajaxcomment.php?body="+pbodyval);
      httprequest.send();
      

    }


    function showupdategui(){
      console.log(this.readyState);
      if(this.readyState === XMLHttpRequest.DONE){
        console.log("I am called");
          if(this.status==200){
            ///alert(httprequest.responseText);
            var catchedupdatedgui=httprequest.responseText;
            var showpostcomp=document.getElementById('showpost');
            ///deleting the previous html codes
            showpost.innerHTML="";
            ///placing the new html codes
            showpost.innerHTML=catchedupdatedgui;
            //location.reload();
            
          }
      }
    }
  </script>
</body>
</html>