<?php

//文字列の切り出し
while ($line = fgets(STDIN)) {
    $tmp[] = trim($line);
}
foreach ($tmp as $key => $value) {
  $array[] = explode(" ", $value);
}
//命名
$n = $array[0][0];
$list_of_stick = $array[1];
// $list_of_stick = $array[1];

//要素のカウント
$list_of_stick = array_count_values($list_of_stick);

//フラッグ設置
$bool = false;

//正誤判定

foreach ($list_of_stick as $key => $value) {
    if ($value >= 4) {
        $bool = true;
    }
}

//出力
if ($bool === true) {
    echo "YES";
} else {
    echo "NO";
}
