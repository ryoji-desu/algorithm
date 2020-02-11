<?php
//1問目
while ($line = fgets(STDIN)) {
   $tmp[] = trim($line);
}

// 配列の各要素をさらに分解します
foreach ($tmp as $key => $value) {
  $array[] = explode(" ", $value);
}
//命名

$k = $array[0][0];
$x = $array[0][1];

$sum = 500 * $k;

if ($sum >= $x) {
    echo 'Yes';
} else {
    echo 'No';
}

//2問目
while ($line = fgets(STDIN)) {
   $tmp[] = trim($line);
}

// 配列の各要素をさらに分解します
foreach ($tmp as $key => $value) {
  $array[] = explode(" ", $value);
}

$string = $array[1][0];
$number_of_words = $array[0][0];
$count = 0
$t = 0;
while ($t < $number_of_words) {
    $start = strpos($string, 'ABC',$t);
    if ($start === true) {
        $count++;
        $t = $t + 2;
    } else {
        break;
    }
}
echo $count;

//3門目
while ($line = fgets(STDIN)) {
   $tmp[] = trim($line);
}

// 配列の各要素をさらに分解します
foreach ($tmp as $key => $value) {
  $array[] = explode(" ", $value);
}

$n = $array[0][0];
$a = hantei($array[1]);
$b = hantei($array[2]);
$diff = $a - $b;
if ($diff > 0) {
    echo $diff;
} elseif ($diff == 0) {
    $diff = 0;
    echo $diff;
} else {
    $diff = -1 * $diff;
    echo $diff;
}
function hantei($number_array) {
    global $n;
    $count = 0;
    for ($t = 0; $t < $n; $t++) {
        $number = $number_array[$t];
        $keta = $t + 1;
        $k = $n - $keta;
        $tmp1 = kaizyou($k);
        $tmp2 = check($number_array,$t,$number);
        $result = $tmp1 * $tmp2;
        $count = $count + $result;
    }
  return $count + 1;
}
function kaizyou($k) {
    $result = 1;
    for ($t = $k;$t > 0 ;$t--) {
        $result = $result * $t;
    }
    return $result;
}

function check($number_array,$t,$number) {
    $tmp_array = array_slice($number_array,$t);
    sort($tmp_array);
    $nambann = array_search($number,$tmp_array);
    return $nambann;
}

 ?>
