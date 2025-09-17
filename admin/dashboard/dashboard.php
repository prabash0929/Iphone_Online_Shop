<?php 
session_start(); 
include _DIR_.'/../config/db.php'; 

if(!isset($_SESSION['admin'])){
    header('Location: login.php');
    exit;
}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset='utf-8'>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin Dashboard</title>
<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css' rel='stylesheet'>
<link rel="stylesheet" href="../assets/css/admin-dashboard.css">
</head>
<body>

<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="dashboard-title">Admin Dashboard</h2>
        <a href="logout.php" class="btn btn-outline-light">Logout</a>
    </div>
    <p class="welcome-text">Hello, <strong><?= htmlspecialchars($_SESSION['admin']) ?></strong>! Welcome back.</p>

    <div class="row g-4 mt-3">
        <!-- Manage Products -->
        <div class="col-md-3">
            <div class="card dashboard-card product-card text-center">
                <div class="card-body">
                    <div class="card-icon">📦</div>
                    <h5 class="card-title">Manage Products</h5>
                    <p class="card-text">Add, edit, or remove products</p>
                    <a href="products.php" class="btn btn-light btn-sm">Go</a>
                </div>
            </div>
        </div>
        <!-- View Purchases -->
        <div class="col-md-3">
            <div class="card dashboard-card purchases-card text-center">
                <div class="card-body">
                    <div class="card-icon">🛒</div>
                    <h5 class="card-title">View Purchases</h5>
                    <p class="card-text">Check customer orders</p>
                    <a href="purchases.php" class="btn btn-light btn-sm">Go</a>
                </div>
            </div>
        </div>
        <!-- Contact Messages -->
        <div class="col-md-3">
            <div class="card dashboard-card messages-card text-center">
                <div class="card-body">
                    <div class="card-icon">✉</div>
                    <h5 class="card-title">Contact Messages</h5>
                    <p class="card-text">Read messages from users</p>
                    <a href="messages.php" class="btn btn-light btn-sm">Go</a>
                </div>
            </div>
        </div>
        <!-- Logout -->
        <div class="col-md-3">
            <div class="card dashboard-card logout-card text-center">
                <div class="card-body">
                    <div class="card-icon">🚪</div>
                    <h5 class="card-title">Logout</h5>
                    <p class="card-text">Sign out securely</p>
                    <a href="logout.php" class="btn btn-outline-light btn-sm">Logout</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>