<?php

session_start();
ob_start();

$con= mysqli_connect('localhost','root');
mysqli_select_db($con,'krishaak');
$con->set_charset("utf8");



//echo "Transaction Succeeed";
$val_id=urlencode($_POST['val_id']);
$store_id=urlencode("krish6086798b374ce");
$store_passwd=urlencode("krish6086798b374ce@ssl");
$requested_url = ("https://sandbox.sslcommerz.com/validator/api/validationserverAPI.php?val_id=".$val_id."&store_id=".$store_id."&store_passwd=".$store_passwd."&v=1&format=json");

$handle = curl_init();
curl_setopt($handle, CURLOPT_URL, $requested_url);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false); # IF YOU RUN FROM LOCAL PC
curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false); # IF YOU RUN FROM LOCAL PC

$result = curl_exec($handle);

$code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

if($code == 200 && !( curl_errno($handle)))
{

	# TO CONVERT AS ARRAY
	# $result = json_decode($result, true);
	# $status = $result['status'];

	# TO CONVERT AS OBJECT
	$result = json_decode($result);

	# TRANSACTION INFO
	$status = $result->status;
	$tran_date = $result->tran_date;
	$tran_id = $result->tran_id;
	$val_id = $result->val_id;
	$amount = $result->amount;
	$store_amount = $result->store_amount;
	$bank_tran_id = $result->bank_tran_id;
	$card_type = $result->card_type;

	# EMI INFO
	$emi_instalment = $result->emi_instalment;
	$emi_amount = $result->emi_amount;
	$emi_description = $result->emi_description;
	$emi_issuer = $result->emi_issuer;

	# ISSUER INFO
	$card_no = $result->card_no;
	$card_issuer = $result->card_issuer;
	$card_brand = $result->card_brand;
	$card_issuer_country = $result->card_issuer_country;
	$card_issuer_country_code = $result->card_issuer_country_code;

	# API AUTHENTICATION
	$APIConnect = $result->APIConnect;
	$validated_on = $result->validated_on;
	$gw_version = $result->gw_version;
      
    //for success confirmation
    $_SESSION['tranxid']=$tran_id;
    
     
    
} else {

	echo "Failed to connect with SSLCOMMERZ";
}

?>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "krishaak";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM ex WHERE ex.trid='$tran_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["trid"]. " - Name: " . $row["name"]. "phone " . $row["phone"]. "<br>";
     
      $id=$row["trid"];
      $name=$row["name"];
      $phone=$row["phone"];
  }
} else {
  echo "0 results";
}

$conn->close();

      $query= "INSERT INTO success (name,phone,tranx_id,status,date,amount,cardtype)
      VALUES('$name','$phone','$tran_id','$status','$tran_date','$amount','$card_type')";  
      
      $queryfire = mysqli_query($con,$query);
      header("location:success1.php");
?> 

