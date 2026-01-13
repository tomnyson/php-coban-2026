<?php
// define("PI", 3.14);
const PI = 3.14;
$chieucao =  1.75;
$cannang = 58;
$bmi =  round($cannang/($chieucao*$chieucao),2);

echo "<h1 style='color: green'>BMI: $bmi </h1>";
$bankinh = 6;
$dientich = PI*$bankinh*$bankinh;
echo "diên tích hình tròn: $dientich <br/>";

$x = 15;
$y = 7;

if($x > $y) {
    echo "đúng";
}else {
    echo "sai";
}
/**
 * giờ -> buổi sáng (6-11), trưa(12-13), chiều(14-17), tối(18->24), Khuya (1h -5 sáng)
 */
$hour = 2;
if($hour >= 6 && $hour <= 11) {
    echo "sáng";
} elseif($hour >= 12 && $hour <= 13) {
     echo "trưa";
}elseif($hour >= 14 && $hour <= 17) {
     echo "chiều";
} elseif($hour >= 18 && $hour <= 24) {
     echo "tối";
}else {
    echo "khuya <br/>" ;
}
/**
 

1) Kiểm tra số dương / âm / 0
Nhập n. In ra:
Duong nếu n > 0
Am nếu n < 0

Bang 0 nếu n == 0


2) Chẵn / lẻ
Nhập n. In ra Chan nếu n % 2 == 0, ngược lại Le.

3) Lớn hơn trong 2 số
Nhập a, b. In ra số lớn hơn. Nếu bằng nhau in Bang nhau.

4) Lớn nhất trong 3 số
Nhập a, b, c. In ra số lớn nhất.
 */
$n = "a" ;
if(!is_numeric($n)){
    echo "không phải số tư nhiên";
}
elseif($n> 0 ){
    echo "so duong";
    }
elseif($n < 0){
    echo "so am";
}
else {
    echo "só bằng 0";
}
/**
 * 5) Kiểm tra chia hết
Nhập a, b (b ≠ 0).
 In ra Chia het nếu a % b == 0, ngược lại Khong chia het.
 Nếu b == 0 thì báo lỗi.

 */
$a = 3;
$b = 4;
if($b==0){
echo "loi b phai khac 0";
}else{
    if ($a%$b == 0){
        echo"chia het";
    }else{
        echo"khong chia het";
    }

}


?>