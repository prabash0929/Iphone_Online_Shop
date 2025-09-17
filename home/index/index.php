<?php include __DIR__.'/config/db.php'; ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Phone Store Demo</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm sticky-top">
  <div class="container">
    <a class="navbar-brand fw-bold" href="index.php">📱 Phone Store Demo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
        <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
        <li class="nav-item"><a class="nav-link" href="user/register.php">Register</a></li>
        <li class="nav-item"><a class="nav-link" href="user/login.php">Login</a></li>
        <li class="nav-item"><a class="nav-link" href="cart.php">Cart 🛒</a></li>
        <li class="nav-item"><a class="nav-link" href="admin/login.php">Admin</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Carousel -->
<div id="mainCarousel" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">

    <!-- First slide -->
    <div class="carousel-item active">
      <img src="assets/images/01.jpg" class="d-block w-100" alt="">
    </div>

    <!-- Second slide -->
    <div class="carousel-item">
      <img src="assets/images/17.jpg" class="d-block w-100" alt="">
    </div>

    <!-- Third slide -->
    <div class="carousel-item">
      <img src="assets/images/18.jpg" class="d-block w-100" alt="">
    </div>

  </div>

  <!-- Carousel controls -->
  <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>


<!-- Main Content -->
<div class="container my-5">
  <div class="row">
    <!-- Products -->
    <div class="col-lg-8">
      <h3 class="mb-4 fw-bold">🔥 Latest Products</h3>
      <div class="row">
        <?php
        $res = $conn->query('SELECT * FROM products ORDER BY id DESC');
        while($p = $res->fetch_assoc()):
        ?>
        <div class="col-md-6 mb-4">
          <div class="card h-100 product-card shadow-sm">
            <img src="<?= htmlspecialchars($p['image']) ?>" class="card-img-top fit-img" alt="">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title"><?= htmlspecialchars($p['title']) ?></h5>
              <p class="text-muted small"><?= htmlspecialchars(substr($p['description'],0,100)) ?>...</p>
              <div class="mt-auto d-flex justify-content-between align-items-center">
                <div>
                  <span class="fw-bold text-primary">Rs <?= number_format($p['price'],2) ?></span><br>
                  <small class="text-muted">Stock: <?= (int)$p['quantity'] ?></small>
                </div>
                <div>
                  <form method="post" action="add_to_cart.php" class="d-inline">
                    <input type="hidden" name="product_id" value="<?= $p['id'] ?>">
                    <button class="btn btn-success btn-sm">Add to Cart</button>
                  </form>
                  <form method="post" action="buy_now.php" class="d-inline">
                    <input type="hidden" name="product_id" value="<?= $p['id'] ?>">
                    <button class="btn btn-primary btn-sm">Buy Now</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php endwhile; ?>
      </div>
    </div>

    <!-- Sidebar -->
    <div class="col-lg-4">
      <div class="p-3 shadow-sm bg-white rounded mb-4">
        <h5 class="fw-bold">📊 Sales Overview</h5>
        <canvas id="salesChart" height="200"></canvas>
      </div>
      <div class="p-3 shadow-sm bg-white rounded">
        <h5 class="fw-bold">ℹ️ About Us</h5>
        <p>Welcome to <b>Phone Store Demo</b>. Explore our latest collection of smartphones. Use the navigation bar to register, login, or visit the admin panel.</p>
        <a href="about.php" class="btn btn-outline-primary btn-sm">Learn More</a>
      </div>
    </div>
  </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
fetch('chart_data.php').then(r=>r.json()).then(data=>{
  const ctx = document.getElementById('salesChart').getContext('2d');
  new Chart(ctx, {
    type:'bar',
    data:{
      labels:data.labels,
      datasets:[{ label:'Sales (Rs)', data:data.values, backgroundColor:'#0d6efd' }]
    },
    options:{ responsive:true, scales:{ y:{ beginAtZero:true } } }
  });
});
</script>
</body>
</html>
