<?php

/**
 * 
In các số từ 1 đến 100.
In các số từ 100 về 1.
In các số chẵn từ 2 đến 50.
In các số lẻ từ 1 đến 99.
In các số từ 1 đến n -> n nhập vào.
 */
for ($i = 1; $i <= 100; $i++) {
    echo $i . "";
}
echo "<hr/>";
for ($i = 100; $i >= 1; $i--) {
    echo $i . " ";
}
echo "<hr/>";
for ($i = 2; $i <= 50; $i++) {
    if ($i % 2 == 0) {
        echo $i . " ";
    }
}

echo "<hr/>";
/**
 * method: POST|GET
 */
/**
 * $_SERVER['REQUEST_METHOD'] == 'POST' => khi user click vào form và nhấn submit
 * $_POST biến toàn cục chứa dữ liệu form submit
 */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $n = (int)$_POST["input"];
    for ($i = 1; $i <= $n; $i++) {
        echo $i . " ";
    }
}
?>

<form method="POST" action="">
    <input type="number" name="input" placeholder="nhập n" />
    <input type="submit" value="in" />
</form>

<?php

/**
 *
    Tính tổng S = 1 + 2 + ... + n.
    Tính tổng các số chẵn từ 1 đến n.
    In các số từ 1..n chia hết cho 3 và 5.
    Tính tổng các số từ 1..n không chia hết cho 2.
    In bảng cửu chương 2.

 */
$tong = 0;
$tongle = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $n = (int)$_POST["input"];
    for ($i = 1; $i <= $n; $i++) {
        if($i%2==0){
            $tong = $tong + $i;
        }
        else {
            $tongle = $tongle +$i;

        }

        if($i % 3 == 0 && $i % 5 == 0) {
            echo "$i <br>";
        }
    }
    echo "$tongle ";
    echo "Tổng các số chẳn từ 1 đến n là: " . $tong;
}

?>