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
  
  $sql = "SELECT userid,truckid,rate,dept,experience,quality,time FROM feedback WHERE truckid ='$truckid' ";
  #$sql = "INSERT INTO ()VALUES('$userid','$truckid','$rate ','$dept','$exper','$quality','$time') ";
    
  
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
<link rel="stylesheet" href="feedback_pr.css">
<style>

	td,th {
		border: 1px solid #ddd;
            padding: 8px;
            text-align: left;


		
	}
	th {
            background-color: grey;
        }

	
</style>

<body>
    <header>
    	<table class="styled-table1">
		<thead>
			<tr>
                <th>USERID</th>
				<th>TRUCK ID</th>
				<th>On-time Delivery</th>
        <th>Quality of Service</th>
		<th>Likelihood to Recommend</th>
        <th>Time Consume</th>
                <th>Overall Experience</th><br>
                
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
                <td><?php echo $rows['truckid']; ?></td>
				<td><?php echo $rows['rate']; ?></td>
                <td><?php echo $rows['quality']; ?></td>
                <td><?php echo $rows['experience']; ?></td>
				<td><?php echo $rows['time']; ?></td>
                <td><?php echo $rows['dept']; ?></td>
						
               
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


