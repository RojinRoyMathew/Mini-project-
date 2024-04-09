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
    $truckid = $_POST['truckid'];
    $age = $_POST['age'];
    $place = $_POST['place'];
    $contact = $_POST['contact'];
    $truckno = $_POST['truckno'];
    $cost = $_POST['cost'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $capacity = $_POST['capacity'];
    
    $sql = "SELECT * FROM signup WHERE truckid = '$truckid' ";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
if($num>0){
echo'<script>alert("Truck ID already exists")</script>';
}else{
    $insert="INSERT INTO signup(email,password,truckid,age,place,contact,truckno,cost,name,capacity) VALUES('$email','$password','$truckid','$age','$place','$contact','$truckno','$cost','$name','$capacity') ";
    mysqli_query($conn,$insert);
    header("location:signin.html");
}    
}

?>