
<?php
$hostname = "localhost";
$username = "root";
$password = "";
$db       = "miniproject";
$conn = mysqli_connect($hostname,$username,$password,$db);
if(!$conn){
    echo "Connetion not establishes";
}

if(isset($_POST['cart'])){
   session_start();
    $userid=$_SESSION["userid"];
    $truckid = $_POST['truckid'];
    $cost = $_POST['cost'];
    $distance = $_POST['distance'];
    $capacity = $_POST['capacity'];
    $sql = "SELECT * FROM barg WHERE truckid = '$truckid' && userid = '$userid'";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
if($num>0){
echo'<script>alert("Truck ID already exists")</script>';
}else{
    $sql = "INSERT INTO barg(truckid,cost,capacity,distance,userid)VALUES('$truckid','$cost ','$distance','$capacity','$userid') ";
    $result=mysqli_query($conn,$sql);

    if($result)
    {
        echo'<script>alert("Truck ID SUCCESSFULLY ADDED TO CART")</script>';
   
    }
    else
    {
    echo "&nbspError";
    }
}}
  
  $sql = "SELECT truckid,cost,capacity,distance, cost * distance AS discos FROM barg WHERE userid='$userid'";
     
  
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
    <head>
    <title>Bargaing</title>
    </head>
<link rel="stylesheet" href="feedback_pr.css">
<style>
  body{
            background-image: url('home_usr_truc.jpg');
    background-size:cover;
          
        }
	td,th {
		border: 1px solid #ddd;
            padding: 8px;
            text-align: left;


		
	}
	th {
            background-color: grey;
        }
        #submit{
  width: 150px;
  padding: 10px;
  padding: 12px 20px;
    margin: 8px 0;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 10px;
  cursor: pointer;
}
	
</style>

<body>
    <header>
    	<table class="styled-table1">
		<thead>
			<tr>
				<th>TRUCK ID</th>
				<th>COST PER KM</th>
        <th>TOTAL DISTANCE</th>
		<th>CAPACITY</th>
        <th>TOTAL COST</th>
        <th></th>        
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
				<td><?php echo $rows['cost']; ?></td>
                <td><?php echo $rows['distance']; ?></td>
                <td><?php echo $rows['capacity']; ?></td>
			    <td><?php echo $rows['discos']; ?></td>
                <td>
						<form action="view.php " method="post">
                        <input type="hidden" name="cost" value="<?php echo $rows['discos']; ?>">
    <input type="hidden" name="distance" value="<?php echo $rows['capacity']; ?>">
    <input type="hidden" name="capacity" value="<?php echo $rows['distance']; ?>">
	
						<button type="submit" name="view" id="submit" value="<?php echo $rows['truckid']; ?>">order</button><br>
						
						</form>	
               
			</tr
			<?php } ?>
		</tbody>
	</table>
            </header>
    <section>
   
    </section>
    <footer>


    </footer>
</html>


