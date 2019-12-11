<?php
// A017:落ちものシミュレーション
// 標準入力を一行ずつ配列に代入します
while ($line = fgets(STDIN)) {
   $tmp[] = trim($line);
}

// 配列の各要素をさらに分解します
foreach ($tmp as $key => $value) {
  $array[] = explode(" ", $value);
}
$tatehaba = $array[0][0];
$yokohaba = $array[0][1];
$gyousuu = $array[0][2];
$display = array();
//とりあえず"."を配置
for ($i = 0;$i < $tatehaba; $i++) {
    $tmp_array = array();
    for ($a = 0;$a < $yokohaba;$a++ ) {
         $tmp_array[] = 0;
    }
	$display[] = $tmp_array;
}
//スタート
for ($t = 1;$t < $gyousuu; $t++) {
    $box_of_tate = $array[$t][0];
    $box_of_yoko = $array[$t][1];
    $box_of_start = $array[$t][2];
    $start_a = $box_of_start + 1;
    $end = $box_of_start + $box_of_yoko;
    for ($c = 0;$c < $tatehaba ;$c--) {
        for ($b = $start_a;$b >= $end;$b++){
            if ($display[$c][$b] == 1) {
                for ($b = $start_a;$b >= $end;$b++) {
                    $display[$c][$b] = 1;
                }
            }
        }
        if ($c == 1) {
            for ($b = $start_a;$b >= $end;$b++) {
                $display[1][$b] = 1;
            }
        }
    }
}
print_r($display);
