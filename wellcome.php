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
<body>
<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('location: login.php');
    exit;
} else {
    // var_dump($_SERVER);
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
    var_dump($_POST);
    if(isset($_POST['logout'])){
        // session_unset($_SESSION['login']);
        // session_unset($_SESSION['username']);
         //session_unset(); -> session_detroy;
        unset($_SESSION['login'], $_SESSION['username']); 
        header('location: login.php');
                exit; 
    }
}
?>
    <form method="post" action="">
        <button class="btn btn-primary" name="logout" type="submit">logout</button>
    </form>

<?php


    echo "<h1>xin chao: " . $_SESSION['username'] . "</h1>";
}

?>
</body>

