<?php
//問題題名　D142:【キャンペーン問題】イルミネーションの数
// 標準入力を一行ずつ配列に代入します
while ($line = fgets(STDIN)) {
   $tmp[] = trim($line);
}

// 配列の各要素をさらに分解します
foreach ($tmp as $key => $value) {
  $array[] = explode(" ", $value);
}
$n = $array[0][0];
$x = $array[0][1];
$y = $array[0][2];
//装飾する木の数
$number_of_tree = ceil($n/$x);
//答え
$answer = $y * $number_of_tree;
echo $answer;
