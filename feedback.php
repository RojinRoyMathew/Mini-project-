<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>feedback</title>
    <link rel="stylesheet" href="feedback_r.css">
</head>
<body>
    <div class="feedback_read">
       <br> <h2>FEEDBACK FORM</h2>
    <form action="feedback.php" method="post">
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<label for="userid">USERID :</label>
    <input type="text" name="userid" placeholder="enter userid">
    &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
    <input type="text" name="truckid" placeholder="enter truckid"><label for="truckid"> :TRUCKID</label><br><br>
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<label for="rate">On-time Delivery:</label>
    <div class="star-rating">
    &nbsp; &nbsp; &nbsp; <input type="radio" id="star5" name="rate" value="5">
        <label for="star5">5stars</label>
        &nbsp; &nbsp; &nbsp; &nbsp;<input type="radio" id="star4" name="rate" value="4">
        <label for="star4">4stars</label>
        &nbsp; &nbsp; &nbsp; &nbsp;<input type="radio" id="star3" name="rate" value="3">
        <label for="star3">3stars</label>
        &nbsp; &nbsp; &nbsp; &nbsp;<input type="radio" id="star2" name="rate" value="2">
        <label for="star2">2stars</label>
        &nbsp; &nbsp; &nbsp; &nbsp;<input type="radio" id="star1" name="rate" value="1">
        <label for="star1">1stars</label>
    </div>
    <br><br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<label for="quality">Quality of Service:</label>
    <select name="quality" id="">
       <option value="">Select one</option> 
       <option value="good">good</option> 
       <option value="neutral">neutral</option> 
       <option value="waste">waste</option> 
    </select>
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<label for="exper">Likelihood to Recommend</label>
    <select name="exper" id="">
       <option value="">Select one</option> 
       <option value="likely">likely</option> 
       <option value="neutral">neutral</option> 
       <option value="unlikely">unlikely</option> 
    </select>
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<label for="time">Time Consume:</label>
    <select name="time" id="">
       <option value="">Select one</option> 
       <option value="less">less</option> 
       <option value="neutral">neutral</option> 
       <option value="more">more</option> 
    </select>
     <br><br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<label for="dept">Overall Experience:</label>
    <textarea name="dept" id="" cols="30" rows="10"></textarea>
    
<br><br><button type="submit" name="submit">Submit Feedback</button>   
    
    </form><br>
    <button onclick="window.location.href='http://localhost:8080/mini/welcome_user.php'">Back to Home</button>
   
</div>
</body>
</html>

<?php
$hostname = "localhost";
$username = "root";
$password = "";
$db       = "miniproject";
$conn = mysqli_connect($hostname,$username,$password,$db);
if(!$conn){
    echo "Connetion not establishes";
}
if(isset($_POST['submit'])){
   
    $userid = $_POST['userid'];
    $truckid = $_POST['truckid'];
     $rate = $_POST['rate'];
    $dept = $_POST['dept'];
    $quality = $_POST['quality'];
    $exper = $_POST['exper'];
    $time = $_POST['time'];
    $sql = "INSERT INTO feedback(userid,truckid,rate,dept,experience,quality,time)VALUES('$userid','$truckid','$rate ','$dept','$exper','$quality','$time') ";
    mysqli_query($conn,$sql);
   
}


?>