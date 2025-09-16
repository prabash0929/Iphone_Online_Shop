<?php
session_start();
include __DIR__.'/../config/db.php';
$msg='';
if($_SERVER['REQUEST_METHOD']==='POST'){
  $name=$conn->real_escape_string($_POST['name']);
  $email=$conn->real_escape_string($_POST['email']);
  $pass=md5($_POST['password']);
  $phone=$conn->real_escape_string($_POST['phone']);
  $conn->query("INSERT INTO users (name,email,password,phone) VALUES ('{$name}','{$email}','{$pass}','{$phone}')");
  $msg='Registered. You can login now.';
}
?>
<!doctype html>
<html>
<head>
  <meta charset='utf-8'>
  <title>Register</title>
  <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css' rel='stylesheet'>
  <link rel='stylesheet' href='../assets/css/style.css'>
</head>
<body>
<div class='container'>
  <a href='../index.php' class='btn btn-sm btn-outline-secondary mt-3'>Home</a>
  <div class='form-container mt-4'>
    <h3>Register</h3>
    <?php if($msg) echo "<div class='alert alert-success'>{$msg}</div>"; ?>
    <form method='post'>
      <div class="mb-2">
        <label class="form-label">Full Name</label>
        <input class='form-control' name='name' required>
      </div>
      <div class="mb-2">
        <label class="form-label">Email</label>
        <input class='form-control' name='email' type='email' required>
      </div>
      <div class="mb-2">
        <label class="form-label">Password</label>
        <input class='form-control' name='password' type='password' required>
      </div>
      <div class="mb-2">
        <label class="form-label">Phone Number</label>
        <input class='form-control' name='phone' required>
      </div>
      <button class='btn btn-primary w-100'>Register</button>
    </form>

    <!-- Login Button -->
    <div class="mt-3 text-center">
      <p>Already have an account?</p>
      <a href="login.php" class="btn btn-outline-success">Login</a>
    </div>
  </div>
</div>
</body>
</html>
