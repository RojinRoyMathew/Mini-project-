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
    $userid = $_POST['userid'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE userid = '$userid' and password = '$password' ";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
if($num>0){
    $_SESSION["userid"]=$userid;
      header("location:welcome_user.php");
}else{
echo'<script>alert("User id and password are not matching")</script>';  
}    
}

?>