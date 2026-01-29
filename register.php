<?php
session_start();
echo session_id();
echo "<pre>";
var_dump($_SESSION);
echo "</pre>";
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
    if (
        isset($_POST['password'])
        && isset($_POST['name'])  && isset($_POST['email']) && isset($_POST['confirmPassword'])
    ) {
        if (strlen($_POST['name']) == 0) {
            $errors['name'] = "name ko duoc trong";
        }
        if (strlen($_POST['password']) < 8) {
            $errors['password'] = "password phai lon 8 ki tu";
        }
        if (($_POST['password']) != $_POST['confirmPassword']) {

            $errors['confirmPassword'] = "password cofirm ko chinh xac";
        }
        if (($_POST['email']) == "") {
            $errors['email'] = "email khong duoc de trong";
        }
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "email khong dung dinh dang";
        }
        echo "<pre>";
        var_dump($errors);
        echo "</pre>";
        if (count($errors) == 0) {
            // xu ly dang nhap
            /**
             * b1.
             */
            if (!isset($_SESSION['users'])) {
                $users = array();
                array_push($users, array(
                    'name' => $_POST['name'],
                    'email' => $_POST['email'],
                    'password' => $_POST['password'],
                    'role' => 'user',
                ));
                $_SESSION['users'] = $users;
            } else {
                $users = $_SESSION['users'];
                $isExist = false;
                // tim kiem user da ton tai chua
                foreach ($users as $user) {
                    if ($user['email'] == $_POST['email']) {
                        $isExist = true;
                    }
                }
                if (!$isExist) {
                    array_push($users, array(
                        'name' => $_POST['name'],
                        'email' => $_POST['email'],
                        'password' => $_POST['password'],
                        'role' => 'user',
                    ));
                    $_SESSION['users'] = $users;
                } else {
                    $errors['email'] = "email da duoc dang ky";
                }
            }
        }
    }
}

?>

<body>
    <div class="container">
        <form method="POST" action="" class="form login_form">
            <h5>Đăng ký tài khoản mới</h5>
            <input type="text" class="form-control" name="name" placeholder="nhap ten" />
            <input type="email" class="form-control mt-2" name="email" placeholder="nhập email cua ban" />
            <input type="password" class="form-control mt-2" name="password" placeholder="nhập password" />
            <input type="password" class="form-control mt-2" name="confirmPassword" placeholder="nhap lai password cua ban " />
            <button type="submit" class="btn btn-primary  mt-2" name="action" value="action">Đăng ki</button> </br>
            <a href="./login.php" class="mt-2">đã có tài khoản</a>

            <?php
            foreach ($errors as $a) {
                echo "<span class='error'>$a</span>";
            }

            ?>
        </form>
    </div>
</body>

</html>