<?php
session_start();
echo session_id();
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
    //isset -> check bien
    if (isset($_POST['username']) && isset($_POST['password'])) {
        if (strlen($_POST['username']) == 0) {
            $errors['username'] = "username ko duoc trong";
        }
        if (strlen($_POST['password']) < 8) {
            $errors['password'] = "password phai lon 8 ki tu";
        }
        echo "<pre>";
        var_dump($errors);
        echo "</pre>";
        if (count($errors) == 0) {
            // xu ly dang nhap
            if ($_POST['username'] == 'admin' && $_POST['password'] == '12345678') {
                echo 'dang nhap thanh cong';
                $_SESSION['login'] = true;
                $_SESSION['username'] = 'admin';
                header('location: wellcome.php');
                exit;
            } else {
                echo 'khong thanh cong';
                header('location: wellcome.php');
                exit;
            }
        }
    }
}

?>

<body>
    <div class="container">
        <form method="POST" action="" class="form login_form">
            <h5>Login Form</h5>
            <input type="text" class="form-control" name="username" placeholder="nhập ten tai khoan moi cua ban " />
            <input type="email" class="form-control" name="username" placeholder="nhập email cua ban" />
            <input type="password" class="form-control" name="username" placeholder="nhap password " />
            <input type="password" class="form-control" name="username" placeholder="nhap lai password cua ban " />
            <button type="submit" class="btn btn-primary  mt-2" name="action" value="action">Đăng nhập</button>
            <?php
            foreach ($errors as $a) {
                echo "<span class='error'>$a</span>";
            }

            ?>
        </form>
    </div>
</body>

</html>