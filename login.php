<?php
session_start();
include "database/config.php";

if(isset($_POST['login'])){

$email=$_POST['email'];
$password=$_POST['password'];

$query="SELECT * FROM users WHERE email='$email' AND password='$password'";

$result=mysqli_query($conn,$query);

if(mysqli_num_rows($result)>0){

$_SESSION['user']=$email;

header("Location: dashboard.php");
exit();

}else{
$error="Invalid email or password";
}

}
?>

<!DOCTYPE html>
<html>
<head>

<title>ROYALSTAY Login</title>
<link rel="stylesheet" href="css/style.css">

</head>

<body>

<?php include 'navbar.php'; ?>

<div class="feedback-container">

<h2>Login to ROYALSTAY</h2>

<?php if(isset($error)){ echo "<p style='color:red'>$error</p>"; } ?>

<form method="POST" class="feedback-form">

<input type="email" name="email" placeholder="Enter Email" required>

<input type="password" name="password" placeholder="Enter Password" required>

<button class="btn" name="login">Login</button>

<p><a href="forgot_password.php">Forgot Password?</a></p>

</form>

</div>

</body>
</html>