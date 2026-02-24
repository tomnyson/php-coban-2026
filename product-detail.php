<?php
session_start();

if (isset($_GET['id']) && !empty($_GET['id'])) {
?>
  <!doctype html>
  <html lang="en">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Shop - Products</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous" />
  </head>

  <body class="bg-light">
    <?php
    include "./includes/menu.php";
    ?>

    <main class="py-5">
      <div class="container">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
          <div>
            <h1 class="h3 mb-1">All Products</h1>
          </div>
          <form class="d-flex gap-2" role="search">
            <input class="form-control" type="search" placeholder="Search product" aria-label="Search" />
            <button class="btn btn-outline-primary" type="submit">Search</button>
          </form>
        </div>
        <?php
        $products = $_SESSION['products'];
        $email = $_GET['id'];
        $found = null;
        foreach ($products as $product) {
          if (trim($email) == $product['id']) {
            $found = $product;
          }
        }

        ?>

        <nav aria-label="breadcrumb" class="mb-3">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a class="text-decoration-none" href="index.php">Home</a></li>
            <li class="breadcrumb-item"><a class="text-decoration-none" href="products.php">Products</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail</li>
          </ol>
        </nav>

        <?php if (empty($found)) { ?>
          <div class="alert alert-danger d-flex align-items-center" role="alert">
            <div class="me-2">❌</div>
            <div>
              <div class="fw-semibold">Không tìm thấy sản phẩm.</div>
              <div class="small">Vui lòng kiểm tra lại đường dẫn hoặc quay về danh sách sản phẩm.</div>
            </div>
          </div>
          <a class="btn btn-outline-primary" href="products.php">⬅ Quay lại Products</a>
        <?php } else { ?>
          <div class="card shadow-sm border-0 overflow-hidden">
            <div class="row g-0">
              <div class="col-12 col-md-5 bg-white">
                <div class="p-3 p-md-4 h-100 d-flex align-items-center justify-content-center">
                  <img
                    src="<?php echo $found['image']; ?>"
                    alt="<?php echo $found['name']; ?>"
                    class="img-fluid rounded"
                    style="max-height: 420px; object-fit: contain;" />
                </div>
              </div>
              <div class="col-12 col-md-7">
                <div class="card-body p-3 p-md-4">
                  <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-2">
                    <h1 class="h4 mb-0"><?php echo $found['name']; ?></h1>
                    <span class="badge text-bg-primary">ID: <?php echo $found['id']; ?></span>
                  </div>

                  <p class="text-secondary mb-3" style="white-space: pre-line;">
                    <?php echo $found['description']; ?>
                  </p>

                  <div class="d-flex align-items-end justify-content-between flex-wrap gap-3 mb-4">
                    <div>
                      <div class="small text-uppercase text-secondary">Price</div>
                      <div class="h3 mb-0"><?php echo $found['price']; ?></div>
                    </div>
                    <div class="text-secondary small">
                      <span class="me-2">⭐ 4.8</span>
                      <span>•</span>
                      <span class="ms-2">Đã bán 1.2k</span>
                    </div>
                  </div>

                  <form class="row g-2 align-items-end" method="post" action="">
                    <div class="col-12 col-sm-5">
                      <label for="qty" class="form-label mb-1">Số lượng</label>
                      <input
                        id="qty"
                        class="form-control"
                        type="number"
                        name="quantity"
                        value="1"
                        min="1"
                        step="1" />
                    </div>

                    <div class="col-12 col-sm-7 d-grid d-sm-flex gap-2">
                      <button type="submit" class="btn btn-primary flex-fill">🛒 Thêm vào giỏ</button>
                      <a class="btn btn-outline-secondary flex-fill" href="products.php">Tiếp tục mua</a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
      </div>
    </main>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"></script>
  </body>

  </html>
<?php } else {
  echo "<h1 style='color: red; text-align: center'>ko tim thay id </h1>";
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id = $_GET['id'];
  $quantity = $_POST['quantity'];

  if (!isset($_SESSION['carts']) || !is_array($_SESSION['carts'])) {
    $_SESSION['carts'] = [];
  }

  $carts = $_SESSION['carts'];
  $isExist = false;
  $index = -1;

  foreach ($carts as $key => $cartItem) {
    if ((int)$cartItem['id'] === (int)$id) {
      $isExist = true;
      $index = $key;
      break;
    }
  }
  if (!$isExist) {
    // $carts[] = [
    //   'id' => (int)$id,
    //   'price' => $found['price'],
    //   'name' => $found['name'],
    //   'image' => $found['image'] ?? '',
    //   'quantity' => (int)$quantity,
    // ];

    array_push($carts, array(
                       'id' => (int)$id,
      'price' => $found['price'],
      'name' => $found['name'],
      'image' => $found['image'] ?? '',
      'quantity' => (int)$quantity)); 
  } else {
    $carts[$index]['quantity'] = (int)$carts[$index]['quantity'] + (int)$quantity;
  }

  $_SESSION['carts'] = $carts;
}
?>