<?php
  session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="/krishaan/img/krishaan1.png">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login | Sign up</title>

  <style>
    body{
      font-family:Arial, Helvetica, sans-serif;
      
    
      background-image: url("/krishaan/img/loginsign.jpg");
    
      background-size:cover;  
      color:white;
    }

    #log:hover{
      padding: 10px;
      font-family:Arial, Helvetica, sans-serif;
      font-size:20px;
      background:#00cccc;
      border:3px solid green;
      width:500px;
      
      }
      #log{
        padding: 10px;
        transition:0.6s ease;
        font-size : 16px;
        width:500px;
        background:#00e600;
        border-radius:10px;
      }

    
  </style>
</head>
<body>

<form action="#">
  <div>
    <img src="/krishaan/img/krishaan1.png" alt="" width=400 height=320>
  
  </div>
  <div id = log>
    <a href="login.php" style="text-decoration: none">Log in | প্রবেশ করুন</a>
  </div>
  <br>
  <div id = log>
    <a href="login_expert.php" style="text-decoration: none">Experts Log in । অভিজ্ঞরা প্রবেশ করুন</a>
  </div>
  <h4>Not a member?</h4>
  
  <div id = log>
    <a href="register.php" style="text-decoration: none">Sign up now! এখনই নিবন্ধন করুন </a>
  </div>
  <br>
  <div id = log>
    
    <a href="register_expert.php" style="text-decoration: none">Experts Sign up here! অভিজ্ঞরা এখানে নিবন্ধন করুন </a>
  </div>


</form>

<script type = "text/javascript">
    function changeHashOnLoad() {
        window.location.href += "#";
        setTimeout("changeHashAgain()", "50");
    }

    function changeHashAgain() 
    {          
        window.location.href += "1";
    }

    var storedHash = window.location.hash;
    window.setInterval(function () {
        if (window.location.hash != storedHash) {
            window.location.hash = storedHash;
        }
    }, 50);

    </script>
  
</body>
</html>