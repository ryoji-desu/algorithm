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
//命名
$tatehaba = $array[0][0];
$yokohaba = $array[0][1];
$gyousuu = $array[0][2];
$display = array();
//配列に0を敷き詰める
for ($i = 0;$i < $tatehaba; $i++) {
    $tmp_array = array();
    for ($a = 0;$a < $yokohaba;$a++ ) {
         $tmp_array[] = 0;
    }
	$display[] = $tmp_array;
}
//スタート
$array_tate = $tatehaba -1;
$array_yoko = $yokohaba -1;
for ($t = 1;$t <= $gyousuu; $t++) {
    $box_of_tate = $array[$t][0];
    $box_of_yoko = $array[$t][1];
    $box_of_start = $array[$t][2];
    if ($t == 1) {
        $tate = $array_tate - $box_of_tate;
        for ($b = $array_tate;$b > $tate;$b--) {
            $yoko = $box_of_yoko + $box_of_start;
            for ($c = $box_of_start;$c < $yoko;$c++) {
                $display[$b][$c] = 1;
            }
        }
        continue;
    }
    //ボックスの縦のスタート地点を決める
    $box_tate_start = $box_of_tate;
    for ($c = $box_tate_start;$c <= $array_tate  ;$c++) {
        $tate = $array_tate - $box_of_tate;
        $yoko = $box_of_yoko + $box_of_start;
        for ($b = $box_of_start;$b < $yoko;$b++) {
            if($display[$c][$b] == 1) {
                $hazimari = $c -1;
                $owari = $hazimari - $box_of_tate;
                for ($d = $hazimari;$d > $owari;$d--) {
                    for ($a = $box_of_start;$a < $yoko;$a++) {
                        $display[$d][$a] = 1;
                    }
                }
                break 2;
            }
        }
    }
}
//回答
for ($p = 0;$p < $tatehaba;$p++) {
    for ($u = 0;$u < $yokohaba;$u++) {
        if ($display[$p][$u] == 0) {
            echo '.';
        } else {
            echo '#';
        }
    }
    echo "\n";
}
