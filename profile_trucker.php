<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>view</title>
  <link rel="stylesheet" href="profile_truck.css">
</head>
<body>
<header>
        <div class="container">
            <h1>Truck Link Logistics</h1>
        </div>
    </header>
</body>
</html>

<?php
$hostname = "localhost";
$username = "root";
$password = "";
$db       = "miniproject";

session_start();

 //if(isset($_POST['profile'])){
    $truckid =$_SESSION["truckid"];
    //echo $userid;
$conn = mysqli_connect($hostname,$username,$password,$db);
if(!$conn){
    echo "Connetion not establishes";
}

 if(isset($_POST['modify'])){
    // echo "modify";
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
    $sql = "UPDATE signup SET age = '$age' ,place = '$place' ,contact = '$contact' ,email = '$email' ,password = '$password',truckno = '$truckno',capacity = '$capacity',name = '$name',cost = '$cost'  WHERE truckid ='$truckid' ";
$result = $conn->query($sql);
if($result)
{
  echo'<script>alert("Modification Successfully")</script>';
}
else
{
echo "&nbspError";
}}

 if(isset($_POST['delete'])){
  $truckid = $_POST['truckid'];
  $sql = "DELETE  FROM signup WHERE truckid ='$truckid' ";
  $result = $conn->query($sql);
  if($result)
  {
  echo "&nbspDelete Register Sucessfully";
  header("location:main.html");
  }
  else
  {
  echo "&nbspError in Delete";
  
  }
  mysqli_query($conn,$sql);
  
    $conn->close();
     }

  
  $sql = "SELECT name,truckid,age,email,place,contact,cost,capacity,truckno,password FROM signup WHERE truckid ='$truckid' ";
     $result = ($conn->query($sql));
  
  $row = [];
  
  if ($result->num_rows > 0)
  {
  
    $row = $result->fetch_all(MYSQLI_ASSOC);
  }
  //}
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="style_profile-truck.css">
<style>
body{
  background-image: url('home_usr_truc.jpg');
    background-size:cover;
    background-position: center;
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

	
</style>

<body>
    	<table class="styled-table1">
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
        <th>PASSWORD</th>
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
                <td><?php echo $rows['name'];$name=$rows['name']; ?></td>
				<td><?php echo $rows['age'];$age=$rows['age']; ?></td>
                <td><?php echo $rows['email'];$email=$rows['email']; ?></td>
				<td><?php echo $rows['place'];$place=$rows['place']; ?></td>
                <td><?php echo $rows['contact'];$contact=$rows['contact']; ?></td>
				        <td><?php echo $rows['cost'];$cost=$rows['cost']; ?></td>
                <td><?php echo $rows['capacity'];$capacity=$rows['capacity']; ?></td>
			        	<td><?php echo $rows['truckno'];$truckno=$rows['truckno']; ?></td>
                <td><?php echo $rows['password'];$password=$rows['password']; ?></td>
               
			</tr
			<?php } ?>
		</tbody>
	</table>
	<section>
    <div class="container_view" >
<div class="profile" style="position: fixed; left: 155px;top: 155px;">
<div class="login_container1">
<h1>TRUCKER SIGN UP DETAILS</h1>
  <div >
    <h5>Enter the Profile Again For Further Edit</h5>
    <form action="profile_trucker.php " method="post">
        <div>
        <div class="input_container" > <input type="text" name="truckid" value="<?php echo isset($truckid) ? htmlspecialchars($truckid) :''?>" readonly></div>
        <div class="input_container" > <input type="text" name="name" value="<?php echo isset($name) ? htmlspecialchars($name) :''?>" placeholder="Enter your Name"></div>
        <div class="input_container" > <input type="number" name="age" value="<?php echo isset($age) ? htmlspecialchars($age) :''?>" placeholder="Enter your age"></div>
        <div class="input_container" > <input type="text" name="place" value="<?php echo isset($place) ? htmlspecialchars($place) :''?>" placeholder="Enter your place"></div>
        <div class="input_container1" > <input type="text" name="contact" value="<?php echo isset($contact) ? htmlspecialchars($contact) :''?>" placeholder="Enter your contact no"></div>
        <div class="input_container1" > <input type="text" name="truckno" value="<?php echo isset($truckno) ? htmlspecialchars($truckno) :''?>" placeholder="Enter your Truck No"></div>
        <div class="input_container1" > <input type="email" name="email" value="<?php echo isset($email) ? htmlspecialchars($email) :''?>" placeholder="Enter your mail ID"></div>
        <div class="input_container1" >  <input type="number" name="cost" value="<?php echo isset($cost) ? htmlspecialchars($cost) :''?>" placeholder="Enter your Cost per kilometer"></div>
        <div class="input_container2" > <input type="number" name="capacity" value="<?php echo isset($capacity) ? htmlspecialchars($capacity) :''?>" placeholder="Enter your Total weight load allowed"></div>
        <div class="input_container2" >  <input type="password" name="password" value="<?php echo isset($password) ? htmlspecialchars($password) :''?>" placeholder="Enter your password"></div>
        <button type="submit" name="modify">MODIFY</button>
        <button type="submit" name="delete">DELETE</button> 
      </form>
      
  </div>
    </div>
    <button onclick="window.location.href='http://localhost:8080/mini/welcome.php'">back</button>

</section>
	<footer>
       <div class="contain">
        <p>&copy; 2024 Truck Link Logistics. All rights reserved.</p>
       </div>
    </footer>
</body>
</html>


