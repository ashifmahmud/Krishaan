<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "krishaak";

try{

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $id=$_GET['id'];

    $s = "UPDATE success SET stat = '' WHERE trans_id = '$id'";
    $conn->query($s);

    $s1 = "UPDATE success SET stat = 'Cancelled' WHERE trans_id = '$id'";
    
    $conn->query($s1);

    header('location: order_list.php');

}
catch(PDOException $e){
    header('location: adminpage.php');
}

?>