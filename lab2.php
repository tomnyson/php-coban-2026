<?php

/**
 * Câu 1 (If / Else) – Tính tiền taxi 3.0 điểm
Nhập km (số km đi được, km ≥ 0).
1 km đầu: 15,000 / km


Từ km 2 đến km 10: 12,000 / km


Trên 10 km: 10,000 / km


Yêu cầu:
Dùng if/else if/else tính tiền.


Nếu km không hợp lệ (rỗng, không phải số, <0) → báo lỗi.


In: Tien taxi = ...



Câu 2 (Switch / Case) – Menu đồ uống 3.0 điểm
Nhập chon (1–4) và soLuong (số nguyên >0).
Menu:
Cafe: 20,000


Tra sua: 28,000


Nuoc cam: 25,000


Nuoc suoi: 10,000


Yêu cầu:
Dùng switch(chon) lấy đơn giá.


Nếu chon sai → báo lỗi “Lua chon khong hop le”.


Tính thanhTien = donGia * soLuong, in: Thanh tien = ...



Câu 3 (Vòng lặp)  4.0 điểm
Nhập n (1–200).
Phần A: In tất cả số từ 1 đến n chia hết cho 3 (cách nhau bởi khoảng trắng) bằng for.
 Phần B: Tính:
dem: có bao nhiêu số chia hết cho 3


tong: tổng các số chia hết cho 3
 In:


Dem = ...


Tong = ...


 **/
$km = 10;
$thanhtien = 0;
if ($km <= 0) {
    echo "khong hop le";
} elseif ($km < 2) {
    echo "15000";
} elseif ($km < 10) {
    $thanhtien = ($km - 1) * 12000 + 15000;
    echo $thanhtien;
} else {
    $thanhtien = ($km - 10) * 10000 + 15000 + 12000 * 9;
}
echo $thanhtien;

// for
$n = 200;
$i = 0;
$dem = 0;
$tong = 0;
for ($i = 0; $i <= $n; $i++) {
    if ($i % 3 == 0) {
        $dem = $dem + 1;
        $tong = $tong + $i;
        echo $i . " ";
    }
}
echo "</br>";
echo "Dem=" . $dem;
echo "Tong=" . $tong;
