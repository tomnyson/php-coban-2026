<?php
session_start();
// unset($_SESSION['carts']);
if (!isset($_SESSION['carts'])) {
  $_SESSION['carts'] = [
    ["id" => 1,  "name" => "A",  "price" => 1000000, "image" => "https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=800&q=60", "quantity" => 1],
    ["id" => 2,  "name" => "B",  "price" => 1000000, "image" => "https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=800&q=60", "quantity" => 5]
  ];
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
                    <th scope="col">Product</th>
                    <th scope="col" class="text-center">Price</th>
                    <th scope="col" class="text-center">Qty</th>
                    <th scope="col" class="text-end">Total</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($carts as $item) { ?>
                    <tr>
                    <td><?php echo $item['name'] ?></td>
                    <td><?php echo $item['price'] ?></td>
                    <td><?php echo $item['quantity'] ?></td>
                    <td><?php echo $item['price']*$item['quantity'] ?></td>
                    </tr>
                  <?php } ?>

                </tbody>
              </table>
            </div>
          </div>

          <div class="mt-3 d-flex justify-content-between">
            <a class="btn btn-outline-secondary" href="product-list.html">Continue shopping</a>
            <button class="btn btn-primary">Update cart</button>
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
                <strong>$67.00</strong>
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