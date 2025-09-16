<?php 
session_start(); 
include __DIR__.'/../config/db.php'; 
$msg=''; 

if($_SERVER['REQUEST_METHOD']==='POST'){ 
    $email=$_POST['email']; 
    $p=md5($_POST['password']); 
    $stmt=$conn->prepare('SELECT id,name FROM users WHERE email=? AND password=?'); 
    $stmt->bind_param('ss',$email,$p); 
    $stmt->execute(); 
    $r=$stmt->get_result(); 
    if($r->num_rows>0){ 
        $u=$r->fetch_assoc(); 
        $_SESSION['user_id']=$u['id']; 
        $_SESSION['user_name']=$u['name']; 
        header('Location: ../index.php'); 
        exit; 
    } else { 
        $msg='Invalid Email or Password'; 
    } 
} 
?>
<!doctype html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Login</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link rel='stylesheet' href='../assets/css/style.css'>
</head>
<body>
<div class='container'>
    <a href='../index.php' class='btn btn-sm btn-outline-secondary mt-3'>Home</a>
    <div class='form-container mt-4'>
        <h3>User Login</h3>
        <?php if($msg) echo "<div class='alert alert-danger'>{$msg}</div>"; ?>
        <form method='post'>
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input class='form-control' id="email" name='email' type='email' required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input class='form-control' id="password" name='password' type='password' required>
            </div>
            <button class='btn btn-primary w-100'>Login</button>
        </form>
    </div>
</div>
</body>
</html>
