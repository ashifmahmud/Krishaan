<?php

session_start();

if(isset($_POST['submit'])){

  $file = $_FILES['file'];
  print_r($file);
  $fileName = $_FILES['file']['name'];
  $fileTmpName = $_FILES['file']['tmp_name'];
  $target = "uploads/".basename($_FILES['file']['name']);

  move_uploaded_file($_FILES['file']['tmp_name'],$target);

  if($fileName!=null){

  $_SESSION['filename1'] = $fileName;
  $_SESSION['tmp_filename']=$fileName;
  $_SESSION['fileStatus'] = 1;
  }
  header('location:admin_book.php');


 




 
}

?>