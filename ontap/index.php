<?php
function randomArray($size, $min, $max) {
    $result = [];

    for ($i = 0; $i < $size; $i++) {
        $result[] = rand($min, $max);
    }

    return $result;
}

// Test
// echo "<pre>";
// print_r(randomArray(50, 1, 100));
// echo "<pre>";
// chan le

// tinh tong cac so 3 va 5


$size = 20;
$mang = randomArray(10, 1, 100);

echo "<pre>";
print_r($mang);
echo "<pre>";

echo "<br>";
echo "size: ".count($mang);
echo "<hr>";
$tong = 0;
for ($i=0; $i < count($mang); $i++) { 
    // $tong = 0;
    if($mang[$i]%3==0 && $mang[$i]%5==0){
        $tong += $mang[$i];
    }
}
echo $tong;

?>