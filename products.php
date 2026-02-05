<?php
session_start();
if(!isset($_SESSION)) {
$_SESSION['products'] = [
  ["id"=>1,  "name"=>"A", "description"=>"Sản phẩm A",  "price"=>1000000, "image"=>"https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=800&q=60"],
  ["id"=>2,  "name"=>"B", "description"=>"Sản phẩm B",  "price"=>2000000, "image"=>"https://images.unsplash.com/photo-1496181133206-80ce9b88a853?auto=format&fit=crop&w=800&q=60"],
  ["id"=>3,  "name"=>"C", "description"=>"Sản phẩm C",  "price"=>3000000, "image"=>"https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?auto=format&fit=crop&w=800&q=60"],
  ["id"=>4,  "name"=>"D", "description"=>"Sản phẩm D",  "price"=>1500000, "image"=>"https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=800&q=60"],
  ["id"=>5,  "name"=>"E", "description"=>"Sản phẩm E",  "price"=>990000,  "image"=>"https://images.unsplash.com/photo-1523275335684-37898b6baf30?auto=format&fit=crop&w=800&q=60"],
  ["id"=>6,  "name"=>"F", "description"=>"Sản phẩm F",  "price"=>2200000, "image"=>"https://images.unsplash.com/photo-1516035069371-29a1b244cc32?auto=format&fit=crop&w=800&q=60"],
  ["id"=>7,  "name"=>"G", "description"=>"Sản phẩm G",  "price"=>750000,  "image"=>"https://images.unsplash.com/photo-1524758631624-e2822e304c36?auto=format&fit=crop&w=800&q=60"],
  ["id"=>8,  "name"=>"H", "description"=>"Sản phẩm H",  "price"=>3500000, "image"=>"https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?auto=format&fit=crop&w=800&q=60"],
  ["id"=>9,  "name"=>"I", "description"=>"Sản phẩm I",  "price"=>1200000, "image"=>"https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=800&q=60"],
  ["id"=>10, "name"=>"J", "description"=>"Sản phẩm J",  "price"=>4000000, "image"=>"https://images.unsplash.com/photo-1553062407-98eeb64c6a62?auto=format&fit=crop&w=800&q=60"],
];
}
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
          <a href="add-product.php" class="btn btn-primary">thêm sản phẩm</a>
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
      ?>
      <div class="card shadow-sm">
        <div class="table-responsive">
          <table class="table align-middle mb-0">
            <thead class="table-light">
              <tr>
                <th scope="col">Mã</th>
                <th scope="col">Tên</th>
                <th scope="col">Giá</th>
                <th scope="col">Mô tả</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col" class="text-end">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($products as $product) {
              ?>
                <tr>
                  <td class="fw-semibold"><?php echo $product['id'] ?></td>
                  <td><?php echo $product['name'] ?></td>
                  <td><span><?php echo $product['price'] ?? 0 ?></span></td>
                  <td><span><?php echo $product['description'] ?? '' ?></span></td>
                   <td><image src="<?php echo $product['image'] ?>" width="100px"/></td>
                  <td class="text-end">
                    <a class="btn btn-sm btn-outline-secondary" href="product-detail.php?id=<?= $product['id'] ?>">View</a>
                    <a class="btn btn-sm btn-outline-primary" href="product-form.html">Edit</a>
                    <form id="deleteForm" method="POST" action="">
                      <input type="hidden" name="productname" value="<?php echo $product['id']; ?>" />
                      <button class="btn btn-sm btn-outline-danger" onclick="return deleteConfirm(event, '<?php echo $product['email']; ?>')" name="action" value="delete" type="submit">Delete</button>
                    </form>

                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>

  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <script>
    function deleteConfirm(event) {
      var confirmed = confirm(`Do you want to delete acount ?" ${username}`);
      if (!confirmed) {
        event.preventDefault();
        return false
      }
      return true;

    }
  </script>
</body>

</html>