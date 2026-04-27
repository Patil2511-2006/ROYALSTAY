
<?php
include "database/config.php";

if(isset($_POST['register'])){

$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];

$query="INSERT INTO users(name,email,password)
VALUES('$name','$email','$password')";

mysqli_query($conn,$query);

echo "Registration Successful";
}
?>

<link rel="stylesheet" href="css/style.css">

<?php include 'navbar.php'; ?>

<h2>User Registration</h2>

<form method="POST">

<input type="text" name="name" placeholder="Name" required>

<input type="email" name="email" placeholder="Email" required>

<input type="password" name="password" placeholder="Password" required>

<button class="btn" name="register">Register</button>

</form>