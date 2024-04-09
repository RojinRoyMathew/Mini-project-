
<?php
$hostname = "localhost";
$username = "root";
$password = "";
$db       = "miniproject";

$conn = mysqli_connect($hostname,$username,$password,$db);
if(!$conn){
    echo "Connetion not establishes";
}

$userid = $_POST['userid'];
$distance = $_POST['distance'];
$sourse = $_POST['sourse'];
$destination = $_POST['destination'];
$capacity = $_POST['capacity'];
$orderid = $_POST['orderid'];
$totalcost = $_POST['totalcost'];
$order= $_POST['order'];

$date_arg = $_POST['date_arg'];
$data_pick = $_POST['date_pick'];
$data_delivery= $_POST['date_delivery'];
$goods= $_POST['goods'];
$order_trucker= $_POST['order_trucker'];
if(isset($_POST['submit'])){
  $sql = "SELECT * FROM log WHERE userid = '$userid' and distance = '$distance'and sourse = '$sourse'and destination = '$destination' and capacity = '$capacity'  and truckerid='$orderid' and totalcost = '$totalcost'and order_user = '$order'and order_trucker = '$order_trucker'and data_agrrement = '$date_arg' and data_pick = '$data_pick' and data_delivery  = '$data_delivery' and goods = '$goods'";
  $result=mysqli_query($conn,$sql);
  $num=mysqli_num_rows($result);
if($num>0){
echo'<script>alert("This order already exists")</script>';

}else{
  $insert="INSERT INTO log(userid,distance,sourse,destination,capacity,truckerid,totalcost,order_user,data_agrrement,data_pick,data_delivery,goods,order_trucker,processes)VALUES('$userid','$distance','$sourse','$destination','$capacity','$orderid','$totalcost','$order' ,'$date_arg','$data_pick','$data_delivery','$goods','$order_trucker','started') ";
 # mysqli_query($conn,$insert);
  $result = mysqli_query($conn,$insert);
  if($result)
  {
  echo "&nbsp Register Sucessfully";
  $sql = "DELETE FROM barg WHERE userid='$userid'";
  $result = $conn->query($sql);
  if($result)
  {
  echo "&nbspdelete Successfully";
  }
  else
  {
  echo "&nbspError";
  }
  header("location:orderconfirm.html");
  }
  else
  {
  echo "&nbspError in ";
  }
}      
}
?>