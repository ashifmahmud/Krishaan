<?php 
  session_start();
  echo $_SESSION['catg'];
  if ($_SESSION['name']){ 
    
    
    
  }
  else{
   header('location: loginsign.php');
  }
  $_SESSION['admin']=1;
?>
<!DOCTYPE html>
<html><link rel="icon" href="/krishaan/img/krishaan1.png">

  <head><link rel="icon" href="/krishaan/img/krishaan1.png"></head>
<link rel="icon" href="/krishaan/img/krishaan1.png">
<title>Krishaan</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/project/Css/home.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}

body, html {
  height: 100%;
  line-height: 1.8;
}

/* Full height image header */
.bgimg-1 {
  background-position: center;
  background-size: cover;
  background-image: url("/krishaan/img/krishak.png");
  min-height: 100%;
}

.w3-bar .w3-button {
  padding: 16px;
}
</style>
<body>


<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-green w3-card" id="myNavbar">
    <a href="#home" class="w3-bar-item w3-button w3-wide">
      <?php
          echo "স্বাগতম ".$_SESSION['name'];
          //here
      ?>
    </a>
    <!-- Right-sided navbar links -->
    <div class="w3-right w3-hide-small">
      <a href="#about" class="w3-bar-item w3-button">আমাদের সম্পর্কিত</a>
      <a href="admin_forum.php" class="w3-bar-item w3-button"><i class="fa fa-user"></i>ফোরাম</a>
      <a href="products.php" class="w3-bar-item w3-button"><i class="fa fa-th"></i> পণ্য সামগ্রী</a>
      
      <a href="admin_news.php" class="w3-bar-item w3-button"><i class="fa fa-newspaper-o"></i>সংবাদ</a>
      <a href="expert.php" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i> বিষেশজ্ঞ</a>
      <a href="admin_book.php" class="w3-bar-item w3-button"><i class="fa fa-book"></i>বই</a>
      <a href="helpline.php" class="w3-bar-item w3-button"><i class="fa fa-phone"></i>হেল্পলাইন</a>
      
      <a href="logout.php" class="w3-bar-item w3-button"><i class="fa fa-reply"></i>লগ আউট </a>
    </div>
    <!-- Hide right-floated links on small screens and replace them with a menu icon -->

    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
</div>

<!-- Sidebar on small screens when clicking the menu icon -->
<nav class="w3-sidebar w3-bar-block w3-black w3-card w3-animate-left w3-hide-medium w3-hide-large" style="display:none" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">Close ×</a>
  <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button">ABOUT</a>
  <a href="#team" onclick="w3_close()" class="w3-bar-item w3-button">TEAM</a>
  <a href="#work" onclick="w3_close()" class="w3-bar-item w3-button">WORK</a>
  <a href="#pricing" onclick="w3_close()" class="w3-bar-item w3-button">PRICING</a>
  <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button">CONTACT</a>
</nav>

<!-- Header with full-height image -->
<header class="bgimg-1 w3-display-container w3-grayscale-min" id="home">
<link rel="icon" href="/krishaan/img/krishaan1.png">
  <div class="w3-display-left w3-text-white" style="padding:48px">
    <span class="w3-jumbo w3-hide-small">কৃষাণ: সবুজ মাঠে কৃষকের হাসি</span><br>
    <span class="w3-xxlarge w3-hide-large w3-hide-medium">কৃষাণ সবুজ মাঠে কৃষকের হাসি</span><br>
    <span class="w3-large">চলুন গড়ি সবুজ সোনালী বাংলাদেশ</span>
    <p><a href="#about" class="w3-button w3-white w3-padding-large w3-large w3-margin-top w3-opacity w3-hover-opacity-off">আজই ব্যবহার করুন!</a></p>
  </div> 
  <div class="w3-display-bottomleft w3-text-grey w3-large" style="padding:24px 48px">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
  </div>
</header>

<!-- About Section -->
<div class="w3-container" style="padding:128px 16px" id="about">
  <h3 class="w3-center">আমাদের ওয়েবসাইট সম্পর্কিত কিছু তথ্য</h3>
  <p class="w3-center w3-large">আমাদের কোম্পানীর মূল ফিচার সমূহ</p>
  <div class="w3-row-padding w3-center" style="margin-top:64px">
    <div class="w3-quarter">
      <i class="fa fa-desktop w3-margin-bottom w3-jumbo w3-center"></i>
      <p class="w3-large">প্রতিক্রিয়াশীল</p>
      <p>আমাদের ওয়েবসাইট অন্য যে কোন কৃষি বিষয়ক ওয়েবসাইট থেকে বেশি প্রতিক্রিয়াশীল</p>
    </div>
    <div class="w3-quarter">
      <i class="fa fa-heart w3-margin-bottom w3-jumbo"></i>
      <p class="w3-large">লক্ষ্য</p>
      <p>আমাদের মূল লক্ষ্য হচ্ছে একটি অনলাইন কৃষক সম্প্রদায় গড়ে তোলা যেখান থেকে কৃ্ষকরা বিভিন্ন রকম কৃষি বিষয়ক তথ্য ও সাহায্য নিতে পারবেন এবং উন্নত বিশ্বের সাথে সংযোগ স্থাপণ করতে পারবেন</p>
    </div>
    <div class="w3-quarter">
      <i class="fa fa-diamond w3-margin-bottom w3-jumbo"></i>
      <p class="w3-large">নকশা</p>
      <p> আমাদের ওয়েবসাইটের নকশা খুবই সহজ ও সরল ভাবে বানানো যেন যে কোন ব্যক্তিই কোন ঝামেলা ছাড়াই ব্যবহার করতে পারেন</p>
    </div>
    <div class="w3-quarter">
      <i class="fa fa-cog w3-margin-bottom w3-jumbo"></i>
      <p class="w3-large">সাহায্য</p>
      <p>যে কোন সাহায্যের জন্য যোগাযোগ করুনঃ krishaan@gmail.com</p>
    </div>
  </div>
</div>



<!-- Footer -->
<footer class="w3-center w3-black w3-padding-64">
  <a href="#home" class="w3-button w3-light-grey"><i class="fa fa-arrow-up w3-margin-right"></i>উপরে উঠুন</a>
  <div class="w3-xlarge w3-section">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
  </div>
  
</footer>
 
<script>
// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}


// Toggle between showing and hiding the sidebar when clicking the menu icon
var mySidebar = document.getElementById("mySidebar");

function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
  } else {
    mySidebar.style.display = 'block';
  }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
}
</script>

</body>
</html>
