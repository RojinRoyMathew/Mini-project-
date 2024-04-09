<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="user_p.css">
    <title>user</title>
</head>
<body>
<header>
        <div class="container2">
            <h1>Truck Link Logistics</h1>
            <nav>
      <ul>
        <li><a href="http://localhost:8080/mini/welcome_user.php">Home</a></li>
        <li><a href="http://localhost:8080/mini/about.html">About</a></li>
        <li><a href="http://localhost:8080/mini/feedback.php">Feedback</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
    </header>
    <section id="home">
        <div class="container_head3" style="position: relative; left: 500px;top: 30px;">
        <h2>HAI USER :</h2>
        <h1>"<?php echo $_SESSION["userid"] ?>"</h1>
    
        </div>
       

            </section>
    <section class="home1">
    <div class="container_h">
    <div class="search" style="position: relative; left: 50px;top: 0px;">
        <form  onsubmit="return validateform()" action="user.php" method="post">
            <h1>&nbsp;REQUIRMENTS</h1>
            <input type="number" name="distance" id="myinput1" placeholder="Enter the total distance"><br>
            <input type="number" name="capacity" id="myinput" placeholder="Enter total weight of load"><br><br><br>
            <button type="submit" class="submit_btn" name="submited">SEARCH</button>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="sub" name="asc">ASCENDING</button>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="sub1" name="dsc">DESCENDING</button>
           </form>
    </div>
    </div>
   <button id="b1" onclick="window.location.href='http://localhost:8080/mini/servicelog_user.php'">SERVICE LOG</button>
        <form action="profile_user.php" action="POST">
       <button id="b2" type="submit" name="profile" >PROFILE</button>
</form>
    </section>

   <footer>
   <div class="contain">
    <p>&copy; 2024 Truck Link Logistics. All rights reserved.</p>
  </div>
   </footer>
</body>
<script>
    function validateform(){
        var capacity=document.getElementById("myinput").value;
        if(capacity == ""){
          alert("PLease enter a value for capacity");
          return false;
        }
        var distance=document.getElementById("myinput1").value;
        if(distance == ""){
          alert("PLease enter a value for distance");
          return false;
        }
}
</script>
</html>