<?php session_start(); include _DIR_.'/../config/db.php'; if(!isset($_SESSION['admin'])) header('Location: login.php'); ?>
<!doctype html><html><head><meta charset='utf-8'><title>Purchases</title><link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css' rel='stylesheet'></head><body>
<div class='container my-5'><h3>Purchases</h3><table class='table'><thead><tr><th>ID</th><th>User</th><th>Total</th><th>Date</th></tr></thead><tbody>
<?php $res=$conn->query('SELECT p.*, u.email FROM purchases p LEFT JOIN users u ON p.user_id=u.id ORDER BY p.id DESC'); while($r=$res->fetch_assoc()): ?>
<tr><td><?= $r['id'] ?></td><td><?= htmlspecialchars($r['email']?:'Guest') ?></td><td>Rs <?= number_format($r['total'],2) ?></td><td><?= $r['created_at'] ?></td></tr>
<?php endwhile; ?></tbody></table></div></body></html>