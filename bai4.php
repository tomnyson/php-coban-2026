<?php

/**
 */
// $hovaten = "      Nguyen Phuong Nam      ";
// $ho = substr($hovaten,0,6);
// $lot =  substr($hovaten,7,6);
// $ten=  substr($hovaten,14,3);

// echo $ho . "<br/>";
// echo $lot . "<br/>";
// echo $ten . "<br/>";

// echo str_replace("Nam","Bac","Nguyen Phuong Nam"). "<br/>";

// echo strtolower($hovaten). "<br/>";
// echo strtoupper($hovaten);
// echo strlen($hovaten)."<br/>";;
// $hovaten = trim($hovaten);
// echo strtolower($hovaten). "<br/>";
// echo strtoupper($hovaten);
// echo strlen($hovaten)."<br/>";
// $dayso = "1, 2, 3, 4, 5, 6";
// $mang = explode(",", $dayso);
// echo "<hr/>";
// // var_dump($mang);
// $tong = 0;
// for($i = 0 ; $i < count($mang); $i++ ) {
//     $tong = $tong + $i;
// }
// echo $tong;


?>
<h3>Bài tập</h3>
<code>
    * chỉ xuất ra giá trị chẵn mảng </br>
    * chỉ in lẻ mảng </br>
    * in ra các số chia hết cho 3 và 5 mảng </br>
    * tính tổng của mảng </br>
    * tính trung bình cộng mảng </br>
    * in ra số chính phương mảng </br>
    * in ra số nguyên tố mảng </br>
    * in ra số hoàn hảo mảng </br>
    * nhập vào 2 số a và b in ra giá trị trong khoảng [a,b] </br>
    * đếm số phần tử chẵn trong mảng </br>
    * đếm số phần tử lẻ trong mảng hay không </br>
    * sắp xếp tăng dần </br>
    * sắp xếp giảm dần </br>
    Xây dựng mảng sản phẩm (tên, giá, hình, ảnh) -> show danh sách sản phẩm theo mảng đã tạo
    1, 3 ,5 ,6 ,7 ,8
</code>

<form method="POST" action="">
    <input type="text" name="input" placeholder="nhập dạy số cách nhau dấu ," />
    <input type="submit" value="kết quả" />
</form>

<?php
function isChan($n)
{
    if ($n % 2 == 0) {
        return true;
    } else {
        return false;
    }
}

function isChinhPhuong($n) {
    if($n < 0) {
        return false;
    }
    $sqrt = sqrt($n);
    // var_dump(is_int($can));
    //cach 1: ->  
    return $sqrt == floor($sqrt);
    //cach 2
    //  $can = floor(sqrt($n));
    //  return $can*$can == $$n;
     // 
}



if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['input'])) {
    var_dump($mang[$i]);
    // empty str_len
    if (!empty($_POST['input'])) {
        $mang = explode(",", $_POST['input']);
        echo "câu 1: chan </br>";
        for ($i = 0; $i < count($mang); $i++) {
            if (isChan($mang[$i])) {
                echo $mang[$i] . "</br>";
            }
        }

        echo "câu 2: le </br>";

        for ($i = 0; $i < count($mang); $i++) {
            if (!isChan($mang[$i])) {
                echo $mang[$i] . "</br>";
            }
        }
        echo "câu 3 </br>";
        for ($i = 0; $i < count($mang); $i++) {
            if ($mang[$i] % 3 == 0 && $mang[$i] % 5 == 0) {
                echo $mang[$i] . "</br>";
            }
        }
        echo "câu 4 & 5 </br>";
        $tong = 0;
        $dem = 0;
        for ($i = 0; $i < count($mang); $i++) {
            $tong = $tong + $mang[$i];
            $dem = $dem + 1;
        }
        $TB = $tong / $dem;
        echo $TB;

        echo "câu 4 chinh phuong </br>";
        for ($i = 0; $i < count($mang); $i++) {
            if (isChinhPhuong($mang[$i])) {
                echo $mang[$i] . "</br>";
            }
        }
    }
}

?>