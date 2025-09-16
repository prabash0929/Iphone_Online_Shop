<?php 
session_start(); 
include __DIR__.'/../config/db.php'; 

$msg=''; 
if($_SERVER['REQUEST_METHOD'] === 'POST'){ 
    $u = $_POST['username']; 
    $p = md5($_POST['password']); 
    $stmt = $conn->prepare('SELECT id FROM admins WHERE username=? AND password=?'); 
    $stmt->bind_param('ss', $u, $p); 
    $stmt->execute(); 
    if($stmt->get_result()->num_rows > 0){ 
        $_SESSION['admin'] = $u; 
        header('Location: dashboard.php'); 
        exit; 
    } else $msg='Invalid username or password'; 
} 
?>
<!doctype html>
<html lang="en">
<head>
<meta charset='utf-8'>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin Login</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../assets/css/admin-style.css">
</head>
<body>

<!-- Home Button -->
<div class="top-home">
  <a href="../index.php" class="btn btn-home">🏠 Home</a>
</div>

<div class="login-container d-flex align-items-center justify-content-center">
  <div class="login-box">
      <h3 class="mb-4 text-center">Admin Login</h3>
      <?php if($msg) echo "<div class='alert alert-danger'>{$msg}</div>"; ?>
      <form method="post">
          <input class="form-control mb-3" name="username" placeholder="Username" required>
          <input type="password" class="form-control mb-3" name="password" placeholder="Password" required>
          <button class="btn btn-login w-100">Login</button>
      </form>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
