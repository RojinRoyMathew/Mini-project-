<?php
$hostname = "localhost";
$username = "root";
$password = "";
$db       = "miniproject";

$conn = mysqli_connect($hostname,$username,$password,$db);
if(!$conn){
    echo "Connetion not establishes";
}

 if(isset($_POST['view'])){

  $truckid = $_POST['view'];
  $cost = $_POST['cost'];
  $distance = $_POST['distance'];
  $capacity = $_POST['capacity'];

  $sql = "SELECT name,truckid,age,email,place,contact,cost,capacity,truckno FROM signup WHERE truckid ='$truckid' ";
  $result = ($conn->query($sql));
  //declare array to store the data of database
  $row = [];
  
  if ($result->num_rows > 0)
  {
    // fetch all data from db into array
    $row = $result->fetch_all(MYSQLI_ASSOC);
  }
 
  }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Order</title>
    </head>
<link rel="stylesheet" href="style.css">
<style>
body{
  background-image: url('home_usr_truc.jpg');
    background-size:cover;
    background-repeat: no-repeat ;
    
}
	td,th {
		border: 1px solid #ddd;
            padding: 8px;
            text-align: left;


		
	}
	th {
            background-color: grey;
        }

	.styled-tab{
width: 1365px;
  }
</style>

<body>
  <header>
  <h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Truck Link Logistics</h1>
    	<table class="styled-tab">
		<thead>
			<tr>
				<th>TRUCK ID</th>
				<th>NAME</th>
				<th>AGE</th>
        <th>EMAIL</th>
		<th>PLACE</th>
        <th>CONTACT NO</th>
                <th>COST PER KM</th><br>
                <th>WEIGHT IN TON</th>
				<th>TRUCK NO</th>
			
			</tr>
		</thead>
		<tbody>
			<?php
			if(!empty($row))
			foreach($row as $rows)
			{
			
			?>
			<tr>
	

                <td><?php echo $rows['truckid'];$truckid=$rows['truckid']; ?></td>
                <td><?php echo $rows['name']; ?></td>
				<td><?php echo $rows['age']; ?></td>
                <td><?php echo $rows['email']; ?></td>
				<td><?php echo $rows['place']; ?></td>
                <td><?php echo $rows['contact']; ?></td>
				        <td><?php echo $rows['cost']; ?></td>
                <td><?php echo $rows['capacity']; ?></td>
			        	<td><?php echo $rows['truckno']; ?></td>
						
               
			</tr
			<?php } ?>
		</tbody>
	</table>
  </header>
  <section>
    <div >
<div class="order" style="position: fixed; left: 155px;top: 140px;">
<div class="login_container1">
  <h2>ORDER DETAILS</h2>
  <div >
  <form action="order.php" class="pro" method="POST">
	<div class="input_container" >
  <input type="text" name="userid" placeholder="Enter your User ID">  </div>
  <div class="input_container" >
  <input type="text" name="orderid" value="<?php echo isset($truckid) ? htmlspecialchars($truckid) :''?>"placeholder="Enter your trucker id" readonly><br>
</div> 
<div class="input_container1" >
  <input type="text" name="sourse" placeholder="Enter Pick-up Location:"></div>
  <div class="input_container1" >
  <input type="text" name="destination" placeholder="Enter Delivery Location:"></div><br>
  <div class="input_container2" > 
  <input type="number" name="distance" value="<?php echo isset($distance) ? htmlspecialchars($distance) :''?>" placeholder="Enter the total distance"readonly></div>
  <div class="input_container2" >
  <input type="number" name="capacity" value="<?php echo isset($capacity) ? htmlspecialchars($capacity) :''?>" placeholder="Enter total weight of load"readonly></div>
  <div class="input_container2" >
  <input type="number" name="totalcost" value="<?php echo isset($cost) ? htmlspecialchars($cost) :''?>"placeholder="Enter the total cost"readonly></div>
  <div class="input_container2" >
  <input type="text" name="goods" placeholder="Goods to be Transported: [Description of Goods]
"></div>
  <div class="input_container3" > 
  Date of Agreement:<input type="date" name="date_arg" placeholder="Date of Agreement: [Date]"></div>
  <div class="input_container3" >  
  Date of Delivery:<input type="date" name="date_pick" placeholder="Scheduled Date and Time of Pick-up: [Date and Time]"></div>
  <div class="input_container3" >  
  Date of Pick - up:<input type="date" name="date_delivery" placeholder="Scheduled Date and Time of Delivery: [Date and Time]"></div>
  
  <input type="hidden" name="order" value="yes"><br>
  <input type="hidden" name="order_trucker" value="yes"><br>
  
  <button type="submit" name="submit" onclick="return confirmaction();">CONFIRM</button>
                     
      
  </form>
  <button id="b7" onclick="window.location.href='http://localhost:8080/mini/welcome_user.php'">BACK</button>

</div>

  </div>
    </div>
    </section>
	
</body>
<script>
	function confirmaction(){
		var result=confirm("Terms and Conditions required for conformation");
	if(result){
     
	}else{
		return false;
	}	
	}
</script>
</html>


