<?php
session_start();
?>
<html>

<head>
    <title>string</title>
    <style>
        .login_form {
            width: 50%;
            margin: 0 auto;
        }

        .error {
            color: red;
            display: block;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<?php
//strlen
/**
 * b1 lay du lieu tu post
 * b2 kiem tra
 * b3 in ra so luong 
 */
$errors = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "<pre>";
    var_dump($_POST);
    echo "</pre>";
    //isset -> check bien
    if (
        isset($_POST['id'])
        && isset($_POST['name'])  && isset($_POST['price']) && isset($_POST['description']) && isset($_POST['image'])
    ) {
        if (strlen($_POST['name']) == 0) {
            $errors['name'] = "name ko duoc trong";
        }
        if (!is_numeric($_POST['price'])) {
            $errors['price'] = "price phải lớn hơn 0";
        }
        if (($_POST['description']) == "") {
            $errors['description'] = "description khong duoc de trong";
        }
        if (count($errors) == 0) {
            // xu ly dang nhap
            /**
             * b1.
             */
            if (!isset($_SESSION['products'])) {
                $products = array();
                array_push($products, array(
                    'name' => $_POST['name'],
                    'price' => $_POST['price'],
                    'description' => $_POST['description'],
                    'image' => $_POST['image'] ?? '',
                ));
                $_SESSION['products'] = $products;
            } else {
                $products = $_SESSION['products'];
                $isExist = false;
                // tim kiem user da ton tai chua
                foreach ($products as $product) {
                    if ($product['id'] == $_POST['id']) {
                        $isExist = true;
                    }
                }
                if (!$isExist) {
                    array_push($products, array(
                        'name' => $_POST['name'],
                        'price' => $_POST['price'],
                        'description' => $_POST['description'],
                        'image' => $_POST['image'] ?? '',
                    ));
                    $_SESSION['products'] = $products;
                    header('location: products.php');
                } else {
                    $errors['id'] = "id ton tai";
                }
            }
        }
    }
}

?>

<body>
    <div class="container">
        <form method="POST" action="" class="form login_form">
            <h5>thêm sản phẩm</h5>
            <input type="number" value="<?php echo rand(1, 10000); ?>" class="form-control" name="id" placeholder="id sản phẩm" readonly />
            <input type="text" class="form-control" name="name" placeholder="nhập tên sản phẩm" />
            <input type="number" class="form-control mt-2" name="price" placeholder="giá sản phẩm" />
            <input type="text" class="form-control mt-2" name="image" placeholder="hình ảnh link" />
            <textarea class="form-control mt-2" name="description" placeholder="mô tả muốn mua"></textarea>
            <button type="submit" class="btn btn-primary  mt-2" name="action" value="action">Thêm</button> </br>
            <?php
            foreach ($errors as $a) {
                echo "<span class='error'>$a</span>";
            }

            ?>
        </form>
    </div>
</body>

</html>