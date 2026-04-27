<?php
include "database/config.php";

if(isset($_POST['submit'])){

$name=$_POST['name'];
$rating=$_POST['rating'];
$message=$_POST['message'];

$query="INSERT INTO feedback(name,rating,message)
VALUES('$name','$rating','$message')";

mysqli_query($conn,$query);

}
?>

<link rel="stylesheet" href="css/style.css">
<?php include 'navbar.php'; ?>

<div class="feedback-container">

<h2>Customer Feedback</h2>

<form method="POST" class="feedback-form">

<input type="text" name="name" placeholder="Your Name" required>

<select name="rating">
<option value="5">⭐⭐⭐⭐⭐ Excellent</option>
<option value="4">⭐⭐⭐⭐ Very Good</option>
<option value="3">⭐⭐⭐ Good</option>
<option value="2">⭐⭐ Average</option>
<option value="1">⭐ Poor</option>
</select>

<textarea name="message" placeholder="Write your feedback"></textarea>

<button class="btn" name="submit">Submit Feedback</button>

</form>

</div>

<h2 style="text-align:center;">Customer Reviews</h2>

<div class="reviews">

<?php

$result=mysqli_query($conn,"SELECT * FROM feedback ORDER BY id DESC");

while($row=mysqli_fetch_assoc($result)){

?>

<div class="review-card">

<h3><?php echo $row['name']; ?></h3>

<p>Rating: <?php echo $row['rating']; ?> ⭐</p>

<p><?php echo $row['message']; ?></p>

</div>

<?php } ?>

</div>