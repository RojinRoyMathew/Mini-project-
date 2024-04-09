<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>view</title>
  <link rel="stylesheet" href="profile_view.css">
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
    $userid =$_SESSION["userid"];
    //echo $userid;
$conn = mysqli_connect($hostname,$username,$password,$db);
if(!$conn){
    echo "Connetion not establishes";
}

 if(isset($_POST['modify'])){
    // echo "modify";
    $userid = $_POST['userid'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $place = $_POST['place'];
    $contact = $_POST['contact']; 
    $password = $_POST['password'];
    $sql = "UPDATE user SET name = '$name' ,place = '$place' ,contact = '$contact' ,email = '$email' ,password = '$password'  WHERE userid ='$userid' ";
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
  $userid = $_POST['userid'];
  $sql = "DELETE  FROM user WHERE userid ='$userid'";
  $result = $conn->query($sql);
  if($result)
  {
    echo'<script>alert("Delete Successfully")</script>';  
    header("location:main.html");
  }
  else
  {
  echo "&nbspError in Delete";
  
  }
  mysqli_query($conn,$sql);
  
    $conn->close();
     }

  
  $sql = "SELECT userid,name,email,place,contact,password FROM user WHERE userid ='$userid' ";
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
<link rel="stylesheet" href="style_profile.css">
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
				<th>USER ID</th>
				<th>NAME</th>
				<th>EMAIL</th>
        <th>PLACE</th>
        <th>CONTACT NO</th>
                <th>PASSWORD</th><br>
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
                <td><?php echo $rows['name'];$name=$rows['name']; ?></td>
				<td><?php echo $rows['email'];$email=$rows['email']; ?></td>
				<td><?php echo $rows['place'];$place=$rows['place']; ?></td>
                <td><?php echo $rows['contact'];$contact=$rows['contact']; ?></td>
				<td><?php echo $rows['password'];$password=$rows['password']; ?></td>
						
               
			</tr
			<?php } ?>
		</tbody>
	</table>
	<section>
    <div class="container_view" >
<div class="profile" style="position: fixed; left: 360px;top: 155px;">
<div class="login_container1">
<h1>USER SIGN UP DETAILS</h1>
  <div >
    <h5>Enter the Profile Again For Further Edit</h5>
  <form action="profile_user.php" method="post">
  <div class="input_container" > <input type="text" name="userid"  value="<?php echo isset($userid) ? htmlspecialchars($userid) :''?>"readonly></div>
  <div class="input_container" ><input type="text" name="name"  value="<?php echo isset($name) ? htmlspecialchars($name) :''?>"  placeholder="Enter your Name"></div>
  <div class="input_container2" ><input type="email" name="email" value="<?php echo isset($email) ? htmlspecialchars($email) :''?>" placeholder="Enter your mail ID"></div><br>
  <div class="input_container2" ><input type="text" name="place" value="<?php echo isset($place) ? htmlspecialchars($place) :''?>"placeholder="Enter your place"></div>
  <div class="input_container3" ><input type="text" name="contact" value="<?php echo isset($contact) ? htmlspecialchars($contact) :''?>"placeholder="Enter your contact no"></div>
  <div class="input_container3" ><input type="password" name="password" value="<?php echo isset($password) ? htmlspecialchars($password) :''?>"placeholder="Enter your password"></div><br>
        <button type="submit" name="modify">MODIFY</button>
        <button type="submit" name="delete">DELETE</button>
       </form>
  </div><br>
  <button onclick="window.location.href='http://localhost:8080/mini/welcome_user.php'">back</button>

    </div>
    
   </section>
	<footer>
       <div class="container">
        <p>&copy; 2024 Truck Link Logistics. All rights reserved.</p>
       </div>
    </footer>
</body>
</html>


