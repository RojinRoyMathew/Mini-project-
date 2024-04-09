<?php
$hostname = "localhost";
$username = "root";
$password = "";
$db       = "miniproject";
$conn = mysqli_connect($hostname,$username,$password,$db);
if(!$conn){
    echo "Connetion not establishes";
}
if(isset($_POST['submit'])){
    $userid = $_POST['userid'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $place = $_POST['place'];
    $contact = $_POST['contact']; 
    $password = $_POST['password'];

    
    
    $sql = "SELECT * FROM user WHERE userid = '$userid' ";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
if($num>0){
echo'<script>alert("User ID already exists")</script>';
}else{
    $insert="INSERT INTO user(userid,name,email,place,contact,password) VALUES('$userid','$name','$email','$place','$contact','$password') ";
    mysqli_query($conn,$insert);
    header("location:signin_user.html");
}    
}

?>