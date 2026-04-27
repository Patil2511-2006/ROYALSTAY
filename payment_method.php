
<?php
session_start();
?>

<?php include 'navbar.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Select Payment Method</title>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<!-- Animation -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="text-center mb-5 animate__animated animate__fadeInDown">

<h2 class="fw-bold">Select Payment Method</h2>

<p class="text-muted">
Choose how you want to complete your hotel booking
</p>

</div>


<div class="row g-4 justify-content-center">

<!-- Card Payment -->

<div class="col-md-4 animate__animated animate__fadeInLeft">

<a href="payment.php?method=card" class="text-decoration-none">

<div class="card shadow-lg border-0 h-100 text-center p-4">

<i class="fas fa-credit-card fa-3x text-primary mb-3"></i>

<h4 class="fw-bold">Credit / Debit Card</h4>

<p class="text-muted">
Secure online payment using Visa, MasterCard or RuPay
</p>

<button class="btn btn-primary w-100">
Pay with Card
</button>

</div>

</a>

</div>


<!-- UPI Payment -->

<div class="col-md-4 animate__animated animate__zoomIn">

<a href="payment.php?method=upi" class="text-decoration-none">

<div class="card shadow-lg border-0 h-100 text-center p-4">

<i class="fas fa-mobile-alt fa-3x text-success mb-3"></i>

<h4 class="fw-bold">UPI Payment</h4>

<p class="text-muted">
Pay using Google Pay, PhonePe or Paytm
</p>

<button class="btn btn-success w-100">
Pay with UPI
</button>

</div>

</a>

</div>


<!-- Cash Payment -->

<div class="col-md-4 animate__animated animate__fadeInRight">

<a href="payment.php?method=cash" class="text-decoration-none">

<div class="card shadow-lg border-0 h-100 text-center p-4">

<i class="fas fa-money-bill-wave fa-3x text-warning mb-3"></i>

<h4 class="fw-bold">Pay at Hotel</h4>

<p class="text-muted">
Pay during check-in at hotel reception
</p>

<button class="btn btn-warning w-100">
Pay Later
</button>

</div>

</a>

</div>

</div>

</div>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
```
