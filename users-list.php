<?php
session_start();
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
  <nav class="navbar navbar-expand-lg bg-white border-bottom">
    <div class="container">
      <a class="navbar-brand fw-semibold" href="home.html">SimpleShop</a>
      <div class="ms-auto d-flex gap-2">
        <a class="btn btn-sm btn-outline-secondary" href="product-form.html">Add</a>
        <a class="btn btn-sm btn-primary" href="cart.html">Cart</a>
      </div>
    </div>
  </nav>

  <main class="py-5">
    <div class="container">
      <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        <div>
          <h1 class="h3 mb-1">All Users</h1>
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
      $users = $_SESSION['users'];
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST['action'])) {
          var_dump($_POST);
           foreach ($users as $index => $user) {
            var_dump($user);
            if($user['email'] == $_POST['username']) {
              echo "heree";
              unset($_SESSION['users'][$index]); // xoa mang session
            }
           }
        }

      }
      echo "users";
      var_dump($users);
      ?>
      <div class="card shadow-sm">
        <div class="table-responsive">
          <table class="table align-middle mb-0">
            <thead class="table-light">
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">password</th>
                <th scope="col">Role</th>
                <th scope="col">status</th>
                <th scope="col" class="text-end">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($users as $user) {
              ?>
                <tr>
                  <td class="fw-semibold"><?php echo $user['name'] ?></td>
                  <td><?php echo $user['email'] ?></td>
                  <td>****</td>
                  <td><span class="badge text-bg-success"><?php echo $user['role'] ?? 'user' ?></span></td>
                  <td><span class="badge text-bg-success"><?php echo $user['status'] ?? 'active' ?></span></td>
                  <td class="text-end">
                    <a class="btn btn-sm btn-outline-secondary" href="product-detail.html">View</a>
                    <a class="btn btn-sm btn-outline-primary" href="product-form.html">Edit</a>
                    <form method="POST" action="">
                      <input type="hidden" name="username" value="<?php echo $user['email']; ?>"/>
                      <button class="btn btn-sm btn-outline-danger" name="action" value="delete" type="submit">Delete</button>
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
</body>

</html>