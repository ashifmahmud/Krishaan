<?php
  session_start();
  if($_SESSION['name']==true){
    unset($_SESSION['name']); 
    session_destroy();
    header("location:loginsign.php");

  }
  else{
    
    header("location:loginsign.php");
  }
?>