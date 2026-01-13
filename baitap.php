<?php

/**
 * 5) Kiểm tra chia hết
Nhập a, b (b ≠ 0).
 In ra Chia het nếu a % b == 0, ngược lại Khong chia het.
 Nếu b == 0 thì báo lỗi.
 */
$a = 3;
$b = 4;
if ($b == 0) {
    echo "loi b phai khac 0";
} else {
    if ($a % $b == 0) {
        echo "chia het";
    } else {
        echo "khong chia het";
    }
}
/**
 * Phân loại điểm 0–10 (4 mức)
Nhập diem (0–10).
<5: Yếu


5–6.4: Trung bình


6.5–7.9: Khá


8–10: Giỏi
 Ngoài khoảng: Diem khong hop le.
 */
$diem = 8;
//check dk diem hop le [0-10]
if (is_numeric($diem) && $diem >= 0 && $diem <= 10) {
    //xep loai
    if ($diem >= 8 && $diem <= 10) {
        echo "Ban duoc xep loai gioi";
    } else if ($diem >= 6.5 && $diem <= 7.9) {
        echo "Ban duoc xep loai kha";
    } else if ($diem >= 5 && $diem <= 6.4) {
        echo "Ban duoc xep loai trung binh";
    } else {
        echo "Ban xep loai yeu";
    }
} else {
    echo "Diem khong hop le";
}
echo "<br/>";

/*
 * 7) Kiểm tra năm nhuận
Nhập year. In ra Nam nhuan nếu:
chia hết 400, hoặc


chia hết 4 nhưng không chia hết 100
 Ngược lại Khong nhuan.
 */
$year = 2026;

if ($year %400 == 0 || $year %4 == 0 && $year %100 == 1){ //$year %100 != 0
    echo "Nam Nhuan";
}  else{
    echo "Nam Khong Nhuan";
}
/**
 8) Tháng thuộc quý nào
Nhập month (1–12).
1–3: Quý 1


4–6: Quý 2


7–9: Quý 3


10–12: Quý 4
 Ngoài khoảng: Thang khong hop le.

 */

 $thang= 12;

  if ($thang >=1 && $thang<=12){
    echo "hop le <br/>";
  if ($thang >=1 && $thang<=3){
    echo "quy 1 <br/>";
    
  }elseif ($thang>=4 && $thang<=6){
    echo "quy 2<br/>";

  }elseif ($thang>=7 && $thang<=9){
    echo "quy 3 <br/>";
  }else {
    echo "quy 4<br/";
  }
  } else { 
    echo "khong hop le";
    
  }
  // swith case

   
  switch ( $thang){
    case 1: case 2: case 3:
        echo " Quy 1 <br/>";
     break;   
    case 4: case 5 : case 6:
        echo " quy 2 <br/>;";
        break;
    case 7: case 8: case 9:
        echo " quy 3 <br/>";
        break;
    case 10: case 11: case 12:
        echo " quy 4";
        break;
    default:
        echo " thang k hop le";
        break;



  }
