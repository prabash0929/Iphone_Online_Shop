<?php
include __DIR__.'/config/db.php';
$msg = '';
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $subject = $conn->real_escape_string($_POST['subject']);
    $message = $conn->real_escape_string($_POST['message']);
    $conn->query("INSERT INTO contact_messages (name,email,subject,message) VALUES ('{$name}','{$email}','{$subject}','{$message}')");
    $msg = 'Message sent. Thank you!';
}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Contact Us</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/contact-style.css">
</head>
<body>

<div class="container my-5">
    <a href="index.php" class="btn btn-sm btn-outline-secondary mb-3">Home</a>
    <div class="row shadow-lg p-4 rounded-4 contact-card">
        <div class="col-md-8">
            <h3 class="mb-4">Contact Us</h3>
            <?php if($msg) echo "<div class='alert alert-success'>{$msg}</div>"; ?>
            <form method="post">
                <input class="form-control mb-3" name="name" placeholder="Your Name" required>
                <input class="form-control mb-3" name="email" type="email" placeholder="Email" required>
                <input class="form-control mb-3" name="subject" placeholder="Subject" required>
                <textarea class="form-control mb-3" name="message" rows="6" placeholder="Message" required></textarea>
                <button class="btn btn-primary btn-lg w-100">Send Message</button>
            </form>
        </div>
        <div class="col-md-4 mt-4 mt-md-0">
            <div class="info-box p-3 rounded-3 text-white text-center">
                <h5>Contact Info</h5>
                <p>Email: support@phonestore.test</p>
                <p>Phone: +94 123 456 789</p>
                <p>Address: Kandy, Sri Lanka</p>
            </div>
        </div>
    </div>
</div>

</body>
</html>