<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="truck_p.css">
    <title>trucker</title>
</head>
<body>
<header>
        <div class="container2">
            <h1>Truck Link Logistics</h1>
            <nav>
      <ul>
        <li><a href="http://localhost:8080/mini/welcome.php">Home</a></li>
        <li><a href="http://localhost:8080/mini/about.html">About</a></li>
        <li><a href="logout_t.php">Logout</a></li>
      </ul>
    </nav>
    </header>
    <section class="truck">
        <div class="container_head3" style="position:relative; left: 450px;top: 100px;">
        <h1>HAI Trucker :</h1>
        <h1>"<?php 
        $truckid=$_SESSION["truckid"];
        echo $_SESSION["truckid"] ?>"</h1>
        </div>
 
<button id="b2" onclick="window.location.href='http://localhost:8080/mini/servicelog_trucker.php'">SERVICE</button>
<div class="b1">
<form action="profile_trucker.php" action="POST">
       <button id="b5" type="submit" name="profile" >PROFILE</button>
</form></div>

<form action="barg.php" method="post">
<input type="hidden" name="truckid" value="<?php echo isset($truckid) ? htmlspecialchars($truckid) :''?>">
<button id="b3" type="submit" name="profile" >BARGING</button>
</form> 
    </section>
    <footer>
   <div class="contain">
    <p>&copy; 2024 Truck Link Logistics. All rights reserved.</p>
  </div>
   </footer>
   
</body>
</html>