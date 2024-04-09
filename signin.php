<?php
$hostname = "localhost";
$username = "root";
$password = "";
$db       = "miniproject";

session_start();

$conn = mysqli_connect($hostname,$username,$password,$db);
if(!$conn){
    echo "Connetion not establishes";
}
if(isset($_POST['submit'])){
    $truckid = $_POST['truckid'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM signup WHERE truckid = '$truckid' and password = '$password' ";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
if($num>0){
    $_SESSION["truckid"]=$truckid;
      header("location:welcome.php");
}else{
echo'<script>alert("Truck id and password are not matching")</script>';  
}    
}

?>