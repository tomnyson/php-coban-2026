<?php

$ds_sanpham = array(
    array(
        'id' => 1,
        'name' => 'iphone 16 promax',
        'price' => 25000000,
        'image' => 'https://cdn.mos.cms.futurecdn.net/o8pzLq2fdUAFtRkXeCqu2D-1920-80.jpg.webp',
    ),
    array(
        'id' => 2,
        'name' => 'samsung s25 ultra',
        'price' => 30000000,
        'image' => 'https://images.samsung.com/vn/smartphones/galaxy-s25-ultra/buy/product_color_silverBlue_PC.png',
    ),
);

$ds_sanpham2 = array(
    array(
        'id' => 3,
        'name' => 'iphone 15 promax',
        'price' => 25000000,
        'image' => 'https://cdn.mos.cms.futurecdn.net/o8pzLq2fdUAFtRkXeCqu2D-1920-80.jpg.webp',
    ),
    array(
        'id' => 4,
        'name' => 'samsung s22 ultra',
        'price' => 30000000,
        'image' => 'https://images.samsung.com/vn/smartphones/galaxy-s25-ultra/buy/product_color_silverBlue_PC.png',
    ),
);

$item = array(
    'id' => 3,
    'name' => 'OPPO Reno15 F 5G 8GB 256GB',
    'price' => 11900000,
    'image' => 'https://cdn2.fptshop.com.vn/unsafe/1920x0/filters:format(webp):quality(75)/oppo_reno15_f_1_6598cc538e.jpg',
);
// them 1 phan tu vao mang
// array_push($ds_sanpham, $item);
//xoa 1 phan tu vao cuoi mang
// array_pop($ds_sanpham);
echo "<pre>";
$ds_sanpham = (array_merge($ds_sanpham, $ds_sanpham2));
echo "</pre>";
if (in_array(7, $item)) {
    echo "co";
} else {
    echo "ko";
}
//array key
// var_dump(array_keys($item));
// array_values
echo "<pre>";
var_dump($item);
echo "</pre>";
//  var_dump(array_values($item));
unset($item['name']);
echo "<pre>";
var_dump($item);
echo "</pre>";

$products = [
  ['id'=>1,'name'=>'iPhone 15','price'=>25000000,'brand'=>'Apple'],
  ['id'=>2,'name'=>'Galaxy S22','price'=>18000000,'brand'=>'Samsung'],
  ['id'=>3,'name'=>'Xiaomi 13','price'=>15000000,'brand'=>'Xiaomi'],
  ['id'=>4,'name'=>'iPhone 14','price'=>20000000,'brand'=>'Apple'],
];
$cart = ['iPhone 15', 'Xiaomi 13'];
/**
 * Bài 1 — Đếm thống kê cơ bản (count)
Bài 2 — Thêm sản phẩm vào cuối danh sách
Bài 3 — Xóa sản phẩm cuối cùng
Bài 4 — Hợp nhất 2 danh sách sản phẩm
$moreProducts = [
  ['id'=>6,'name'=>'Vivo V29','price'=>11000000,'brand'=>'Vivo'],
  ['id'=>7,'name'=>'Galaxy S24','price'=>23000000,'brand'=>'Samsung'],
];

 */
echo count($products);
$sanpham= array('id'=>5,'name=>iphone17prmax,','price=>34000000','brand=>demi');
array_push($products,$sanpham)
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>san pham</title>
</head>

<body>
    <div class="container">
        <table class="table">
            <thead>
                <th>id</th>
                <th>name</th>
                <th>price</th>
                <th>image</th>
            </thead>
            <tbody>
                <?php
                foreach ($ds_sanpham as $item) {
                ?>
                    <tr>
                        <td><?php echo  $item['id'] ?></td>
                        <td><?php echo  $item['name'] ?></td>
                        <td><?php echo  $item['price'] ?></td>
                        <td><img src="<?php echo  $item['image'] ?>" width="200px" /></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>


</body>

</html>