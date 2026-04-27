<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include "database/config.php";

$room = $_GET['room'];

$query = mysqli_query($conn,"SELECT * FROM rooms WHERE room_number='$room'");
$data = mysqli_fetch_assoc($query);

$price = $data['price'];
?>
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_POST['book'])){

$_SESSION['booking']=[
"name"=>$_POST['name'],
"room"=>$_POST['room'],
"price"=>$price,
"checkin"=>$_POST['checkin'],
"checkout"=>$_POST['checkout']
];

header("Location: payment_method.php");
exit();

}
?>

<?php include 'navbar.php'; ?>
<link rel="stylesheet" href="css/style.css">

<div class="container">

<h2>Book Your Room</h2>

<form method="POST" class="form-card">

<input type="text" name="name" placeholder="Your Name" required>

<input type="text" name="room" placeholder="Room Number" required>

<label>Room Number</label>
<input type="text" name="room" value="<?php echo $room; ?>" readonly>

<label>Price Per Night</label>
<input type="text" value="₹<?php echo $price; ?>" readonly>

<label>Check In</label>
<input type="date" name="checkin" required>

<label>Check Out</label>
<input type="date" name="checkout" required>

<button class="btn" name="book">Continue to Payment</button>

</form>

</div>
