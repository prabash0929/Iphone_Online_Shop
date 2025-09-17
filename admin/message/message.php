<?php session_start(); include __DIR__.'/../config/db.php'; if(!isset($_SESSION['admin'])) header('Location: login.php'); ?>
<!doctype html><html><head><meta charset='utf-8'><title>Messages</title><link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css' rel='stylesheet'></head><body>
<div class='container my-5'><h3>Contact Messages</h3><table class='table'><thead><tr><th>ID</th><th>Name</th><th>Email</th><th>Subject</th><th>Date</th></tr></thead><tbody>
<?php $res=$conn->query('SELECT * FROM contact_messages ORDER BY id DESC'); while($r=$res->fetch_assoc()): ?>
<tr><td><?= $r['id'] ?></td><td><?= htmlspecialchars($r['name']) ?></td><td><?= htmlspecialchars($r['email']) ?></td><td><?= htmlspecialchars($r['subject']) ?></td><td><?= $r['created_at'] ?></td></tr>
<?php endwhile; ?></tbody></table></div></body></html>
