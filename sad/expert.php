<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="/krishaan/img/krishaan1.png">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  
  <title>Expert's Contacts</title>
  <style>
    #postdiv{
      padding: 10px;
      color: white;
      border-radius:5px;
    }
    #input{
      display: block;
      border:20px solid white;
      background-image: linear-gradient(to right, red , yellow);
    }
    body{

      background-image:url("/krishaan/img/expert.jpg");
      background-size:cover;
      background-attachment: fixed;
    }
    #id{
      width: 500px;
      background-image: linear-gradient(to right, red , yellow);
    }
  </style>
  

</head>
<body class="container">
<nav class="navbar navbar-light bg-success">
  <form class="container-fluid justify-content-start">
    <a class="btn btn-success" href="index.php">মূলপাতা</a>
    
  </form>
</nav>

  <form action="#" method = "post">
    <div id = input style="width: 220px">
      <input type="text" id="text" name="text"  placeholder="অনুসন্ধান করুন.."> 
    </div>
    <div>
      <button type = "submit" name = "sub" class= "btn btn-success font-weight-bold mb-3 mt-2" >অনুসন্ধান</button><br>
    </div>   
    <div>
      <button type = "submit" name = "sub" class= "btn btn-success font-weight-bold mb-3 " > <a class="text-white" href="expert.php">পিছনে</a></button><br>
      
    </div>  
    </form>

  <br><br>
  <?php

      $servername = "localhost";
      $user = "root";
      $pass = "";
      $dbname ="krishaak";
      $search = null;

      if(isset($_POST["sub"])){
        $search = $_POST['text'];
        $search = preg_replace("#[^0-9a-z]#i","",$search);
      }


      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $user, $pass);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // use exec() because no results are returned
        $query = "SELECT * FROM farm_specialist WHERE subdistrict LIKE '%$search%' OR district LIKE '%$search%' or name LIKE '%$search%'";
        $statement = $conn->query($query);
        
        foreach($statement as $row){
          echo '<div class = bg-info p-2 id=postdiv >
          <div id = "name"><label class = "label">'.$row["name"].'<label></div>
           
          <div id = "title"><label class = "labelt">District: '.$row['district'].'<br>Subdistrict: '.$row['subdistrict'].'<label></div>
          
          <div id = "post"><label class = "labeld">'.$row["phone_num"].'<label></div>
          </div>
          <br>';



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