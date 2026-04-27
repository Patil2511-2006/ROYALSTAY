<?php
include "database/config.php";
?>

<?php include 'navbar.php'; ?>

<h2>Admin Dashboard</h2>

<?php

$users=mysqli_query($conn,"SELECT COUNT(*) as total FROM users");
$rooms=mysqli_query($conn,"SELECT COUNT(*) as total FROM rooms");
$bookings=mysqli_query($conn,"SELECT COUNT(*) as total FROM bookings");

$user_data=mysqli_fetch_assoc($users);
$room_data=mysqli_fetch_assoc($rooms);
$booking_data=mysqli_fetch_assoc($bookings);

?>

<div class="booking-card">
Total Users: <?php echo $user_data['total']; ?>
</div>

<div class="booking-card">
Total Rooms: <?php echo $room_data['total']; ?>
</div>

<div class="booking-card">
Total Bookings: <?php echo $booking_data['total']; ?>
</div>