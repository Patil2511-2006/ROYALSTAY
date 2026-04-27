<?php
session_start();

if(!isset($_SESSION['booking'])){
header("Location: rooms.php");
exit();
}

$price = $_SESSION['booking']['price'];
$checkin = $_SESSION['booking']['checkin'];
$checkout = $_SESSION['booking']['checkout'];

$start = new DateTime($checkin);
$end = new DateTime($checkout);

$days = $start->diff($end)->days;

$total = $price * $days;

include "database/config.php";

$method = $_GET['method'];

if(isset($_POST['pay'])){

$name=$_SESSION['booking']['name'];
$room=$_SESSION['booking']['room'];
$checkin=$_SESSION['booking']['checkin'];
$checkout=$_SESSION['booking']['checkout'];

$status = ($method == "cash") ? "Pay at Hotel" : "Paid";

$query="INSERT INTO bookings
(user_name,room_number,checkin,checkout,payment_status)
VALUES('$name','$room','$checkin','$checkout','$status')";

mysqli_query($conn,$query);

unset($_SESSION['booking']);

header("Location: booking_success.php");
exit();
}
?>

<?php include 'navbar.php'; ?>
<link rel="stylesheet" href="css/style.css">

<div class="container">

<h1>Payment - <?php echo strtoupper($method); ?></h1>

<?php if($method == "card"){ ?>

<!-- CARD PAYMENT -->

<form method="POST" class="payment-form">

<input type="text" placeholder="Card Holder Name" required>

<input type="text" placeholder="Card Number" required>

<input type="month" required>

<input type="password" placeholder="CVV" required>

<button class="btn" name="pay">Pay Now</button>

</form>

<?php } ?>

<?php if($method == "upi"){ ?>

<!-- UPI PAYMENT -->

<div class="upi-box">

<h3>Scan QR Code to Pay</h3>

<img src="images/upi.png" width="220" alt="UPI QR Code">

<p>Use Google Pay / PhonePe / Paytm</p>

<form method="POST">

<button class="btn" name="pay">Payment Done</button>

</form>

</div>

<?php } ?>

<?php if($method == "cash"){ ?>

<div class="cash-box">

<h3>Pay at Hotel</h3>

<p>You can pay at the hotel during check-in.</p>

<button class="btn" onclick="confirmBooking()">Confirm Booking</button>

</div>

<div class="payment-summary">

<h3>Booking Summary</h3>

<p>Room: <?php echo $_SESSION['booking']['room']; ?></p>

<p>Price per night: ₹<?php echo $price; ?></p>

<p>Total Days: <?php echo $days; ?></p>

<p>Total Amount: ₹<?php echo $total; ?></p>

</div>

<form id="cashForm" method="POST" style="display:none;">
<input type="hidden" name="pay">
</form>

<script>

function confirmBooking(){

if(confirm("Confirm your booking with Pay at Hotel?")){

document.getElementById("cashForm").submit();

}

}

</script>

<?php } ?>

</div>