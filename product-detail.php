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
        /**
         * hoi truoc khi xoa
         * 
         */
        $products = $_SESSION['products'];
        /**
         * b1 email. = $_GET['email']
         * b2 duyet namg user tim neu thang email === $users['email']
         * b3 neu co thi hien thi ra danh sach or 1 cai tuy show table or html co ban
         */
        $email = $_GET['id'];
        $found = null;
        foreach ($products as $product) {
          if (trim($email) == $product['id']) {
            $found = $product;
          }
        }
        ?>

        <div class="card shadow-sm">
          <div class="card-body">
          <?php if (!empty($found)) {
            echo "<h5> id:". $found['id'] ."</h5>";
            echo "<h5> name: " . $found['name'] . "</h5>";
            echo "<h5> description: " . $found['description'] . "</h5>";
            echo "<h5> price: " . $found['price'] . "</h5>";
            echo "<image width='400px' src='{$found['image']}'/>";
          }
          ?>
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
<?php } else {
  echo "<h1 style='color: red; text-align: center'>ko tim thay id </h1>";
}
?>