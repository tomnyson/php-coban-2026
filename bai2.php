<?php
define("PI", 3.14);
$chieucao =  1.75;
$cannang = 58;
$bmi =  round($cannang/($chieucao*$chieucao),2);

echo "<h1 style='color: green'>BMI: $bmi </h1>";
$bankinh = 6;
$dientich = PI*$bankinh*$bankinh;
echo "diên tích hình tròn: $dientich";
?>