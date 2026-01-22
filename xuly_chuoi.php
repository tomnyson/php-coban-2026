<html>

<head>
    <title>string</title>
    <style>
        form {
            background: gray;
            margin: 0 auto;
            width: 400px;
            padding: 20px;
        }

        input[type='text'] {
            width: 100%;
            padding: 10px;
        }

        button [type='submit'] {
            width: 100px;
            background: green;
            padding: 10px;
            margin-top: 20px;
            color: #fff
        }

        h1 {
            color: blue;
            display: block;
        }
    </style>
</head>
<?php
//strlen
/**
 * b1 lay du lieu tu post
 * b2 kiem tra
 * b3 in ra so luong 
 */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    var_dump($_POST);
    if (!empty($_POST['input'])) {
        if ($_POST['action'] == 'cau2') {
            $thuong =  strtolower($_POST['input']);
            echo "<h1>strtolower  : $thuong ki tu</h1>";
        } elseif ($_POST['action'] == 'cau3') {
            $hoa =  strtoupper($_POST['input']);
            echo "<h1>strtoupper  :$hoa  ki tu</h1>";
        } else {
            $ketqua = strlen($_POST['input']);
            //str_word_count
            $sotu = str_word_count($_POST['input']);
            echo "<h1>so ky tu ban da nhap : $ketqua ki tu</h1>";
            echo "<h1>so tu ban da nhap : $sotu ki tu</h1>";
        }
    }
}

?>

<body>
    <form method="POST" action="">
        <input type="text" name="input" placeholder="nhập dạy số cách nhau dấu ," />
        <button type="submit" name="action" value="cau1">Câu 1</button>
        <button type="submit" name="action" value="cau2">Câu 2 Thường</button>
        <button type="submit" name="action" value="cau3">Hoa</button>
    </form>
</body>

</html>