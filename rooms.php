<?php
include "database/config.php";
?>

<link rel="stylesheet" href="css/style.css">
<?php include 'navbar.php'; ?>

<h2 style="text-align:center;">Our Rooms</h2>

<div class="rooms">

<?php

$query="SELECT * FROM rooms";
$result=mysqli_query($conn,$query);

while($row=mysqli_fetch_assoc($result)){

?>

<div class="room-card">

<?php
$image = "images/room1.jpg";

if($row['room_number'] == "101"){
$image = "images/room1.jpg";
}
elseif($row['room_number'] == "102"){
$image = "images/room2.jpg";
}
elseif($row['room_number'] == "201"){
$image = "images/room3.jpg";
}
?>

<img src="<?php echo $image; ?>">

<div class="room-info">

<h3>Room <?php echo $row['room_number']; ?></h3>

<p>Type: <?php echo $row['room_type']; ?></p>

<p>Price: ₹<?php echo $row['price']; ?></p>

<a class="btn" href="book_room.php?room=<?php echo $row['room_number']; ?>">Book Now</a>

</div>

</div>

<?php
}
?>

</div>