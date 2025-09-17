<?php
include _DIR_.'/config/db.php';
if(!isset($_GET['id'])){ header('Location:index.php'); exit; }
$id = (int)$_GET['id'];
$stmt = $conn->prepare('SELECT * FROM products WHERE id=?');
$stmt->bind_param('i',$id);
$stmt->execute();
$p = $stmt->get_result()->fetch_assoc();
if(!$p){ header('Location:index.php'); exit; }
?>
<!doctype html><html><head><meta charset='utf-8'><meta name='viewport' content='width=device-width,initial-scale=1'><title><?= htmlspecialchars($p['title']) ?></title><link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css' rel='stylesheet'><link rel='stylesheet' href='assets/css/style.css'></head><body>
<div class="container my-5">
  <a href="index.php" class="btn btn-sm btn-outline-secondary mb-3">Home</a>
  <div class="row">
    <div class="col-md-6"><img src="<?= htmlspecialchars($p['image']) ?>" class="img-fluid" alt=""></div>
    <div class="col-md-6">
      <h2><?= htmlspecialchars($p['title']) ?></h2>
      <p class="small-muted">Rs <?= number_format($p['price'],2) ?></p>
      <p><?= nl2br(htmlspecialchars($p['description'])) ?></p>
      <p><strong>Stock:</strong> <?= (int)$p['quantity'] ?></p>
      <form method="post" action="add_to_cart.php">
        <input type="hidden" name="product_id" value="<?= $p['id'] ?>">
        <input type="number" name="qty" value="1" min="1" max="<?= (int)$p['quantity'] ?>" class="form-control mb-2" style="width:120px">
        <button class="btn btn-success">Add to cart</button>
        <a href="index.php" class="btn btn-outline-secondary">Back</a>
      </form>
    </div>
  </div>
</div>
</body></html>