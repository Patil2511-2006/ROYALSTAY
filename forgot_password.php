<?php
include "database/config.php";

if(isset($_POST['reset'])){

$email=$_POST['email'];
$password=$_POST['password'];

$query="UPDATE users SET password='$password'
WHERE email='$email'";

mysqli_query($conn,$query);

echo "Password Updated Successfully";

}
?>

<h2>Forgot Password</h2>

<form method="POST">

<input type="email" name="email" placeholder="Enter Email">

<input type="password" name="password" placeholder="New Password">

<button name="reset">Reset Password</button>

</form>