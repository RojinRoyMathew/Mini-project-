<?php
$hostname = "localhost";
$username = "root";
$password = "";
$db       = "miniproject";
session_start();
$truckid=$_SESSION["truckid"];
$conn = mysqli_connect($hostname,$username,$password,$db);
if(!$conn){
    echo "Connetion not establishes";
}
if(isset($_POST['submit'])){
    $userid = $_POST['submit'];
    $status = $_POST['status'];
    $sql = "UPDATE log SET status = '$status' WHERE userid ='$userid' ";
    $result = $conn->query($sql);
    if($result)
    {
        echo'<script>alert("Status Successfully Updated")</script>';
    }
    else
    {
    echo "&nbspError";
    }
}

if(isset($_POST['cancel'])){
    $userid = $_POST['cancel'];
    $sql = "UPDATE log SET order_trucker = 'NO' , processes = 'cancelled' WHERE userid ='$userid' ";
    $result = $conn->query($sql);
    if($result)
    {
      echo'<script>alert("Cancelled Successfully")</script>';  
    }
    else
    {
    echo "&nbspError";
    }
}

if(isset($_POST['reorder'])){
    $userid = $_POST['reorder'];
    $sql = "UPDATE log SET order_trucker = 'YES' , processes = 'Restart' WHERE userid ='$userid' ";
    $result = $conn->query($sql);
    if($result)
    {
        echo'<script>alert("Restart Successfully")</script>';
    }
    else
    {
    echo "&nbspError";
    }
}

if(isset($_POST['final'])){
    $userid = $_POST['final'];
    $sql = "UPDATE log SET processes = 'Completed' WHERE userid ='$userid' ";
    $result = $conn->query($sql);
    if($result)
    {
        echo'<script>alert("Product Successfully Recived")</script>';
    }
    else
    {
    echo "&nbspError";
    }
}

$sql = "SELECT userid,distance,sourse,destination,capacity,truckerid,totalcost,order_user,data_agrrement,data_pick,data_delivery,goods,order_trucker,processes,status FROM log WHERE truckerid = '$truckid'";
$result = ($conn->query($sql));
//declare array to store the data of database
$row = [];

if ($result->num_rows > 0)
{
  // fetch all data from db into array
  $row = $result->fetch_all(MYSQLI_ASSOC);
}
?> 
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="style_table1.css">
<style>
body{
  background-image: url('home_usr_truc.jpg');
    
    background-position: center;
    background-repeat: no-repeat ;
}
td,th {
		border: 1px solid black;
		padding: 50px;
		margin: 50px;
		text-align: center;
		
	}
	tr:hover {background-color: coral;}
    button {
                width: 150px;
                padding: 10px;
                background-color: #007bff;
                color: #fff;
                border: none;
                border-radius: 30px;
                cursor: pointer;
              }          
</style>

<body>
<div class="table">
    <h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SERVICE LOG BOOK </h1>
   <button onclick="window.location.href='http://localhost:8080/mini/welcome.php'">BACK</button>
     <br><br>		<table class="table1">
		<thead>
			<tr>
           
				<th>USER ID</th>
				<th>TRUCK ID</th>
        <th>PICK UP PLACE</th>
        <th>DELIVERY PLACE</th>
                <th>CAPACITY</th>
                <th>DATE OF AGGREMENT</th>
				<th>DATE OF PICK</th>
                <th>DATE OF DELIVERY</th>
				<th>GOODS DISCRIPTION</th>
        <th>TOTAL DISTANCE</th>
        <th>TOTAL COST</th>
                <th>ORDER BY USER</th>
                <th>ORDER BY TRUCKER</th>
				<th>STATUS</th>
				<th>PROCESSES</th>
                <th>STATUS</th>
                <th>CANCEL</th>
                <th>REORDER</th>
                <th>FINAL</th>
			</tr>
		</thead>
		<tbody>
			<?php
			if(!empty($row))
			foreach($row as $rows)
			{
			
			?>
			<tr>
	

                <td><?php echo $rows['userid']; ?></td>
                <td><?php echo $rows['truckerid']; ?></td>
                <td><?php echo $rows['sourse']; ?></td>
                <td><?php echo $rows['destination']; ?></td>
				        <td><?php echo $rows['capacity']; ?></td>
                <td><?php echo $rows['data_agrrement']; ?></td>
			        	<td><?php echo $rows['data_pick']; ?></td>
                        <td><?php echo $rows['data_delivery']; ?></td>
                <td><?php echo $rows['goods']; ?></td>
                <td><?php echo $rows['distance']; ?></td>
                <td><?php echo $rows['totalcost']; ?></td>
				        <td><?php echo $rows['order_user']; ?></td>
                <td><?php echo $rows['order_trucker']; ?></td>
			        	<td><?php echo $rows['status']; ?></td>
                        <td><?php echo $rows['processes']; ?></td>
                        
						<td>
						<form action="servicelog_trucker.php " method="post">
						<input type="text"  name="status" placeholder="Enter Status">
                        <button type="submit" name="submit" class="submit_b" value="<?php echo $rows['userid']; ?>">SUBMIT</button><br>
						
						</form>
				
						</td>
                        <td>
						<form action="servicelog_trucker.php " method="post">
						<button type="submit" name="cancel" class="submit_b" value="<?php echo $rows['userid']; ?>">CANCEL</button><br>
						
						</form>
				
						</td>
                        <td>
						<form action="servicelog_trucker.php " method="post">
						<button type="submit" name="reorder" class="submit_b" value="<?php echo $rows['userid']; ?>">REORDER</button><br>
						
						</form>
				
						</td>

                        <td>
						<form action="servicelog_trucker.php " method="post">
						<button type="submit" name="final" class="submit_b" value="<?php echo $rows['userid']; ?>">FINAL</button><br>
						
						</form>
                       
						</td>

			</tr
			<?php } ?>
		</tbody>
	</table>
</div>

</body>
</html>

