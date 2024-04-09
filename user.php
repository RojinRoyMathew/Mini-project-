<?php
$hostname = "localhost";
$username = "root";
$password = "";
$db       = "miniproject";

$distance = $_POST['distance'];
$capacity = $_POST['capacity'];

$conn = mysqli_connect($hostname,$username,$password,$db);
if(!$conn){
    echo "Connetion not establishes";
}
#--------------------------------------------------------------------------------------------------------------------------------------------------------------------------
if(isset($_POST['asc'])){
	$sql = "SELECT truckid,name,email,contact,cost,capacity, cost * $distance AS discos FROM signup  WHERE capacity >= '$capacity' ORDER BY discos ASC";
	$result = ($conn->query($sql));
	//declare array to store the data of database
	$row = [];
	
	if ($result->num_rows > 0)
	{
	  // fetch all data from db into array
	  $row = $result->fetch_all(MYSQLI_ASSOC);
	}
	}
if(isset($_POST['dsc'])){
	$sql = "SELECT truckid,name,email,contact,cost,capacity, cost * $distance AS discos FROM signup  WHERE capacity >= '$capacity' ORDER BY discos DESC";
	$result = ($conn->query($sql));
	//declare array to store the data of database
	$row = [];
	
	if ($result->num_rows > 0)
	{
	  // fetch all data from db into array
	  $row = $result->fetch_all(MYSQLI_ASSOC);
	}
	}

if(isset($_POST['submited'])){
$sql = "SELECT truckid,name,email,contact,cost,capacity, cost * $distance AS discos FROM signup WHERE capacity >= '$capacity'";
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
<link rel="stylesheet" href="style_table.css">
<style>
  body{
            background-image: url('home_usr_truc.jpg');
           background-position:center;
          
        }
	td,th {
		border: 1px solid black;
		padding: 50px;
		margin: 50px;
		text-align: center;
		
	}
	tr:hover {background-color: coral;}
styled-table{
	
}
</style>

<body>
    <h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;LISTS OF SERVICE PROVIDER'S </h1>
	
	<table class="styled-table">
		<thead>
			<tr>
				<th>TRUCK ID</th>
				<th>NAME</th>
        <th>EMAIL</th>
        <th>CONTACT NO</th>
                <th>COST PER KM</th>
                <th>WEIGHT IN TON</th>
				<th>TOTAL COST</th>
				<th>ORDER</th>
				<th>FEEDBACK</th>
				<th>CART</th>
			</tr>
		</thead>
		<tbody>
			<?php
			if(!empty($row))
			foreach($row as $rows)
			{
			
			?>
			<tr>
	

                <td><?php echo $rows['truckid']; ?></td>
                <td><?php echo $rows['name']; ?></td>
                <td><?php echo $rows['email']; ?></td>
                <td><?php echo $rows['contact']; ?></td>
				        <td><?php echo $rows['cost']; ?></td>
                <td><?php echo $rows['capacity']; ?></td>
			        	<td><?php echo $rows['discos']; ?></td>
						
						<td>
						<form action="view.php " method="post">
						
    <input type="hidden" name="cost" value="<?php echo $rows['discos']; ?>">
    <input type="hidden" name="distance" value="<?php echo isset($distance) ? htmlspecialchars($distance) :''?>">
    <input type="hidden" name="capacity" value="<?php echo isset($capacity) ? htmlspecialchars($capacity) :''?>">
	
						<button type="submit" name="view" class="submit_button" value="<?php echo $rows['truckid']; ?>">view</button><br>
						
						</form>
				
						</td>
						<td>
						<form action="feedback_profile.php " method="post">
						<button type="submit" name="view" class="submit_button" value="<?php echo $rows['truckid']; ?>">feedback</button><br>
						
						</form>
				
						</td>
						
						<td>
						<form action="barging.php " method="post">
	<input type="hidden" name="truckid" value="<?php echo $rows['truckid']; ?>">
    <input type="hidden" name="cost" value="<?php echo $rows['cost']; ?>">
    <input type="hidden" name="distance" value="<?php echo isset($distance) ? htmlspecialchars($distance) :''?>">
    <input type="hidden" name="capacity" value="<?php echo isset($capacity) ? htmlspecialchars($capacity) :''?>">
						<button type="submit" name="cart" class="submit_button" value="<?php echo $rows['truckid']; ?>">cart</button><br>
						
						</form>
				
						</td>
			</tr
			<?php } ?>
		</tbody>
	</table>
	
</body>
</html>

