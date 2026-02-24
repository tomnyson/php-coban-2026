<?php

function formatVNĐ($number)
{
  return number_format($number, 0, ',', '.') . 'đ';
}

session_start();
// $_SESSION['carts'] = [
// ];
// unset($_SESSION['carts']);
if (!isset($_SESSION['carts'])) {
  $_SESSION['carts'] = [];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if ($_POST['action'] === 'remove_cart') {
    $index = (int)$_POST['index'];
    unset($_SESSION['carts'][$index]);
  }
  if ($_POST['action'] === 'clear_cart') {
     $_SESSION['carts'] = [];
  }
}
$carts = $_SESSION['carts'];
var_dump(count($carts));
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Shop - Cart</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous" />
</head>

<body class="bg-light">
  <nav class="navbar navbar-expand-lg bg-white border-bottom">
    <div class="container">
      <a class="navbar-brand fw-semibold" href="home.html">SimpleShop</a>
      <div class="ms-auto d-flex gap-2">
        <a class="btn btn-sm btn-outline-secondary" href="products.php">Products</a>
        <a class="btn btn-sm btn-primary" href="cart.php">Checkout</a>
      </div>
    </div>
  </nav>

  <main class="py-5">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Your Cart</h1>
        <a class="btn btn-outline-danger btn-sm" href="#">Clear cart</a>
      </div>

      <div class="row g-4">
        <div class="col-lg-8">
          <div class="card shadow-sm">
            <div class="table-responsive">
              <table class="table align-middle mb-0">
                <thead class="table-light">
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Total</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>


                  <?php
                  $tong = 0;

                  foreach ($carts as $index => $item) {
                    $tong = $tong + ($item['price'] * $item['quantity']);
                  ?>
                    <tr>
                      <td><?php echo $item['name'] ?></td>
                      <td><?php echo $item['price'] ?></td>
                      <td><?php echo $item['quantity'] ?></td>
                      <td><?php echo formatVNĐ($item['price'] * $item['quantity']) ?></td>
                      <td>
                        <form method="post" action="">
                          <input type="hidden" name="index" value="<?php echo $index ?>" />
                          <button type="submit" name="action" value="remove_cart" class="btn btn-danger">X</button>
                        </form>
                      </td>

                    </tr>
                  <?php } ?>

                </tbody>
              </table>
            </div>
          </div>

          <div class="mt-3 d-flex justify-content-between">
            <a class="btn btn-outline-secondary" href="product-list.html">Continue shopping</a>
            <button class="btn btn-primary">Update cart</button>
            <form method="post" action="">
              <button type="submit" name="action" value="clear_cart" class="btn btn-danger">clear cart</button>
            </form>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="card shadow-sm">
            <div class="card-body">
              <h2 class="h5">Order Summary</h2>
              <hr />
              <div class="d-flex justify-content-between mb-2">
                <span class="text-secondary">Subtotal</span>
                <strong>$62.00</strong>
              </div>
              <div class="d-flex justify-content-between mb-2">
                <span class="text-secondary">Shipping</span>
                <strong>$5.00</strong>
              </div>
              <div class="d-flex justify-content-between mb-3">
                <span class="text-secondary">Discount</span>
                <strong>-$0.00</strong>
              </div>
              <div class="d-flex justify-content-between fs-5 mb-3">
                <span>Total</span>
                <strong><?php echo formatVNĐ($tong); ?> </strong>

              </div>
              <a class="btn btn-primary w-100" href="checkout.html">Proceed to checkout</a>
            </div>
          </div>

          <div class="card shadow-sm mt-3">
            <div class="card-body">
              <label class="form-label">Promo code</label>
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Enter code" />
                <button class="btn btn-outline-secondary" type="button">Apply</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>