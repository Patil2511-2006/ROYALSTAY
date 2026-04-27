<?php
session_start();
include "database/config.php";
?>

<!DOCTYPE html>
<html>
<head>

<title>ROYALSTAY - Bookings</title>

<link rel="stylesheet" href="css/style.css">

<style>

.bookings-container{
max-width:1000px;
margin:auto;
padding:40px;
}

.booking-card{
background:white;
padding:20px;
margin:20px 0;
border-radius:10px;
box-shadow:0 4px 10px rgba(0,0,0,0.1);
transition:0.3s;
}

.booking-card:hover{
transform:scale(1.02);
}

.booking-card h3{
margin:0;
color:#333;
}

.status-paid{
color:green;
font-weight:bold;
}

</style>

</head>

<body>

<?php include 'navbar.php'; ?>

<div class="bookings-container">

<h2 style="text-align:center;">My Bookings</h2>

<?php

$query="SELECT * FROM bookings ORDER BY id DESC";

$result=mysqli_query($conn,$query);

if(mysqli_num_rows($result)>0){

while($row=mysqli_fetch_assoc($result)){

?>

<div class="booking-card">

<h3><?php echo $row['user_name']; ?></h3>

<p><strong>Room Number:</strong> <?php echo $row['room_number']; ?></p>

<p><strong>Check In:</strong> <?php echo $row['checkin']; ?></p>

<p><strong>Check Out:</strong> <?php echo $row['checkout']; ?></p>

<p><strong>Payment Status:</strong> 
<span class="status-paid"><?php echo $row['payment_status']; ?></span>
</p>

</div>

<?php
}

}else{

echo "<p style='text-align:center;'>No bookings found.</p>";

}

?>

</div>

</body>
</html>