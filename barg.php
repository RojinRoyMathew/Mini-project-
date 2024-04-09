
<?php
$hostname = "localhost";
$username = "root";
$password = "";
$db       = "miniproject";
$conn = mysqli_connect($hostname,$username,$password,$db);
if(!$conn){
    echo "Connetion not establishes";
}
session_start();

$truckid=$_SESSION["truckid"];

if(isset($_POST['submited'])){
   
    $userid = $_POST['userid'];
    $truckid = $_POST['truckid'];
    $cost = $_POST['cost'];
    $distance = $_POST['distance'];
    $capacity = $_POST['capacity'];


    $sql = "INSERT INTO barg(userid,truckid,cost,capacity,distance)VALUES('$userid','$truckid','$cost ','$distance','$capacity') ";
    mysqli_query($conn,$sql);
   
}

if(isset($_POST['cart'])){
   
  
    $cost = $_POST['cost'];
    $userid=$_POST['cart'];
    $sql = "UPDATE barg SET cost = '$cost'  WHERE truckid ='$truckid' && userid ='$userid'";

    $result=mysqli_query($conn,$sql);
    if($result)
    {
    echo'<script>alert("Recost entered successfully")</script>';
    }
    else
    {
    echo "&nbspError";
    }
}
$sql1 = "SELECT  DISTINCT userid FROM barg WHERE truckid='$truckid' ";
     
  
$result1 = ($conn->query($sql1));
//declare array to store the data of database
$row1 = [];

if ($result1->num_rows > 0)
{
  // fetch all data from db into array
  $row1 = $result1->fetch_all(MYSQLI_ASSOC);


}
if(isset($_POST['view'])){
    $userid = $_POST['view'];
    $useridfg=$userid;
  $sql = "SELECT DISTINCT userid,truckid,cost,capacity,distance, cost * distance AS discos FROM barg WHERE userid='$userid'";
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
<html>
    <head>
    <title>Barg</title>
    </head>
<link rel="stylesheet" href="feedback_pr.css">
<style>
    body{
        margin: 0;
    padding: 0;
    }
    .container2 {
    background: #333;
    color: #fff;
    padding: 20px 0;
    overflow: hidden;
    margin:0;
   
  }
  header h1 {
       padding-right: 1000px;

      }
    .styled-table1{
        
        width:1166px;
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
    <header>
        <div class="container2">
            <h1>&nbsp;&nbsp;&nbsp;&nbsp;Truck Link Logistics</h1>
           
    </header>
    <section>
<h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BARGING COST OF TRANSPORTATION SERVICE</h1>
						<form onsubmit="return validateform()" class="tp" action="barg.php " method="post">
						         <input type="number"  name="cost" id="myinput" placeholder="Enter re-cost per kilometer"> &nbsp;&nbsp;<button type="submit" name="cart" class="submit_b" value="<?php echo isset($useridfg) ? htmlspecialchars($useridfg) :''?>">SUBMIT</button><br>
                        
                    
						</form>
                       
    	<table class="styled-table1">
		<thead>
			<tr>
            <th>USER ID</th>
				<th>TRUCK ID</th>
				<th>COST PER KM</th>
        <th>TOTAL DISTANCE</th>
		<th>CAPACITY</th>
        <th>TOTAL COST</th>
                
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
				<td><?php echo $rows['cost']; ?></td>
                <td><?php echo $rows['distance']; ?></td>
                <td><?php echo $rows['capacity']; ?></td>
			    <td><?php echo $rows['discos']; ?></td>
				
               
			</tr
			<?php } ?>
		</tbody>
	</table>
      
   
    </section>
    <section>
    <div  class="side" style = "position:fixed; left:1166px; top:121px;">
            <h3>Select User for Bargaining</h3>

        </div>

    </section>
  
    <script>
    function validateform(){
        var cost=document.getElementById("myinput").value;
        if(cost == ""){
          alert("PLease enter a value for recost");
          return false;
        }
        var distance=document.getElementById("myinput1").value;
        if(distance == ""){
          alert("PLease enter a value for distance");
          return false;
        }
}
</script>
    <style>
        body{
            background-image: url('home_usr_truc.jpg');
    background-size:cover;   
        }
        h1{
            
            color:white;
        }
.tp{
    input[type=number], select {
        position:relative;
        left: 300px;
    width: 500px;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 40px;
    background-color:#ffffff9b;
    box-sizing: border-box;
  }

  button {
    position:relative;
        left: 400px;
  width: 150px;
  padding: 10px;
  padding: 12px 20px;
    margin: 8px 0;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 40px;
  cursor: pointer;
}


}
.side{
    
    width: 200px;
    height: 1000px;
    background-color:rgba(222, 221, 209, 0.417);
    text-align:center;
}
#view{
    position:relative;
        left: 400px;
  width: 150px;
  padding: 10px;
  padding: 12px 20px;
    margin: 8px 0;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 40px;
  cursor: pointer;
}
    </style>
</html>
<!DOCTYPE html>
<html>
<style>
.list{
    position:fixed;
    left: 1166px;
    top: 200px;
width:200px;
}
	td,th {
		border: 1px solid #ddd;
            padding: 8px;
            text-align: left;


		
	}
	th {
            background-color: grey;
        }
        #b1 {
            position:fixed;
            left: 10px;
            top: 200px;
  width: 150px;
  padding: 10px;
  padding: 12px 20px;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 40px;
  cursor: pointer;
}
.view{
    width: 150px;
  padding: 10px;

  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  text-align:center; 
}	
</style>

<body>
    <header>
    <button id="b1" onclick="window.location.href='http://localhost:8080/mini/welcome.php'">BACK</button>
    
                       
    	<table class="list">
		<thead>
			<tr>
				<th>USER ID</th>
				

                
			</tr>
		</thead>
		<tbody>
			<?php
			if(!empty($row1))
			foreach($row1 as $rows)
			{
			
			?>
			<tr>
            
                <td>
                 <form action="barg.php " method="post">
&nbsp;&nbsp;&nbsp;&nbsp;<button  type="submit" class="view" name="view"  value="<?php echo $rows['userid']; ?>"><?php echo $rows['userid']; ?></button><br>
						
						</form></td>
				
				
               
			</tr
			<?php } ?>
		</tbody>
	</table>
            </header>

    </html>


