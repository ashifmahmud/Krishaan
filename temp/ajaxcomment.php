<?php
session_start();

$servername = "localhost";
$user = "root";
$pass = "";
$dbname = "krishaak";

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $user, $pass);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$catg = null;
///receiving the values
//$title= $_GET["title"];
$postbody = $_GET["body"];
$usernum = $_SESSION['phone'];
$userid = $_SESSION['id'];
$catg = $_SESSION['catg'];



if(empty($title) || empty($postbody)){
  ///echo "No post or title found";
}
else{
  if($_SESSION['catg']==1){
    $sql = "INSERT INTO comment(details,date,farm_specialistphone_num,PostPost_id)
            VALUES('$postbody',CURDATE(),'$usernum','$_SESSION[postid]')";
      // use exec() because no results are returned
      $conn->exec($sql);
      ///echo "Post successful";
  }
  else{
    $sql = "INSERT INTO comment(details,date,usersphone_num,PostPost_id)
    VALUES('$postbody',CURDATE(),'$usernum','$_SESSION[postid]')";
    // use exec() because no results are returned
    $conn->exec($sql);
    ///echo "Post successful";

  }
    
}


// use exec() because no results are returned
//need to do for experts
if($_SESSION==1){
  $query = "SELECT * FROM comment AS cmnt JOIN farm_specialist AS us ON fs.phone_num = cmnt.usersphone_num WHERE POSTPOST_id ='$_SESSION[postid]' ORDER BY cmnt.Comment_id DESC";
  $statement = $conn->query($query);

}
else{
  $query = "SELECT * FROM comment AS cmnt JOIN users AS us ON us.phone_num = cmnt.usersphone_num WHERE POSTPOST_id ='$_SESSION[postid]' ORDER BY cmnt.Comment_id DESC";
  $statement = $conn->query($query);
}
$output="";
foreach ($statement as $row) {
  $output=$output.'<div class = bg-info p-2 >
      <div id = "name"><label class = "label">' . $row["name"] . '<label></div>
       
      <div id = "title"><label class = "labelt">' . $row["details"] . '<label></div>
      
      
      </div>
      <br>';
}

echo $output;

?>