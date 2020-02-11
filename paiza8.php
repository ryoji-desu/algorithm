<?php
while ($line = fgets(STDIN)) {
   $tmp[] = trim($line);
}
// 配列の各要素をさらに分解します
foreach ($tmp as $key => $value) {
  $array[] = explode(" ", $value);
}


//命名
$p_1 = $array[0][0];
$p_2 = $array[0][1];
$p_3 = $array[0][2];
$k = $array[0][3];
//小さい順に並べ替え
$array1 = array($p_1,$p_2,$p_3);
sort($array1);
$p_1 = $array1[0];
$p_2 = $array1[1];
$p_3 = $array1[2];

$suuretsu = array();
$count = 0;

for ($s = 0;$count < $k; $s++) {
    if ($s == 0) {
        $suuretsu[] = 1;
        $count++;
        continue;
    }
    if ($p_1 == 2 && $count < $k) {
        $suuretsu[] = $p_1 * $s;
        $tmp = $p_1 * $s +1;
        $count++;
        if ($tmp % $p_2 == 0 || $tmp % $p_3 == 0 && $count < $k) {
            $suuretsu[] = $tmp;
            continue;
        } else {
            continue;
        }
    } else {
        $suuretsu[] = $p_1 * $s;
        $count++;
        $tmp = $p_1 * $s;
        if ($tmp % 2 == 0) {
            $tmp = $tmp +1;
        } else {
            $tmp = $tmp + 2;
        }
        if ($tmp % $p_2 == 0 || $tmp % $p_3 == 0 && $count < $k) {
            $suuretsu[] = $tmp;
            $count++;
            continue;
        } else {
            continue;
        }
    }
    if ($count >  10) {
        break;
    }
}
$k = $k - 1;
echo $suuretsu[$k];
var_dump($suuretsu);
