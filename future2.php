<?php

//文字列の切り出し
while ($line = fgets(STDIN)) {
    $tmp[] = trim($line);
}
foreach ($tmp as $key => $value) {
  $array[] = explode(" ", $value);
}

$minimum_length = $array[0][0];
$minimum_price = $array[0][1];
$check_length = $array[0][2];
$check_price = $array[0][3];

$number_of_customer = $array[1][0];
$tmp = 2 + $number_of_customer;
$price = 0;

for ($t = 2 ;$t < $tmp;$t++) {
    $time = $array[$t][0];
    $length = $array[$t][1];
    $tmp_price = price($minimum_length,$minimum_price,$check_length,$check_price,$time,$length);

    if (strtotime('22:00:00') <= strtotime($time)) {
        $tmp_price = ceil (1.2 * $tmp_price);
    }
    $price = $price + $tmp_price;
}

echo $price;

function price($minimum_length,$minimum_price,$check_length,$check_price,$time,$length) {

    if ($length <= $minimum_length) {
        $tmp_price = $minimum_price;
        return $tmp_price;
    } else {
        $remainder = $length - $minimum_length;
        $times = ceil($remainder / $check_length);
        $tmp_price = $minimum_price + $check_price * $times;
        return $tmp_price;
    }
}
