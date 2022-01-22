<?php
session_start();

$servername = "localhost";
$user = "root";
$pass = "";
$dbname = "krishaak";

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $user, $pass);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$conn->exec("set names utf8");
///receiving the values



$title= $_GET["title"];
$postbody = $_GET["body"];
$usernum = $_SESSION['phone'];
$userid = $_SESSION['id'];

if($_SESSION['fileStatus']==0){
  
  $image=null;
}
else{
  $image = $_SESSION['filename'];
  $_SESSION['fileStatus']=0;

}



if(empty($title) || empty($postbody)){
  ///echo "No post or title found";
}
else{
  $sql = "INSERT INTO post(title, images, details, usersphone_num, usersid, date)
          VALUES('$title','$image','$postbody','$usernum','$userid',CURDATE())";
    // use exec() because no results are returned
    $conn->exec($sql);
    ///echo "Post successful";

    
    
}


// use exec() because no results are returned
$query = "SELECT * FROM post AS ps JOIN users AS us ON us.phone_num = ps.usersphone_num ORDER BY ps.Post_id DESC";
$statement = $conn->query($query);

$output="";
foreach ($statement as $row) {
  if($row['images']!=null){
  $output=$output.'<div class="card">
  <h5 class="card-header">'.$row["name"].'                      ('.$row['date'].')</h5>
  <div class="card-body">
      <img class="img" src=uploads/'.$row['images'].'>
      <h5 class="card-title text-success">'.$row["title"].'</h5>
      <p class="card-text">'.$row["details"].'</p>
      <a class="btn btn-primary" href="comment.php?id='.$row['Post_id'].'">কমেন্ট দেখুন</a>
    </div>
  </div>
  <br>
  <br>
';}
    else{$output=$output.'<div class="card">
      <h5 class="card-header">'.$row["name"].'                      ('.$row['date'].')</h5>
      <div class="card-body">
          
          <h5 class="card-title text-success">'.$row["title"].'</h5>
          <p class="card-text">'.$row["details"].'</p>
          <a class="btn btn-primary" href="comment.php?id='.$row['Post_id'].'">কমেন্ট দেখুন</a>
        </div>
      </div>
      <br>
      <br>
    ';

    }
    $_SESSION['fileStatus']=0;


}

echo $output;

?>