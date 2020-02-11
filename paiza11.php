<?php
    //文字列の切り出し
    while ($line = fgets(STDIN)) {
        $tmp[] = trim($line);
    }

    // 配列の各要素をさらに分解します
    foreach ($tmp as $key => $value) {
      $array[] = explode(" ", $value);
    }
    $n = $array[0][0];
    $first = 0;
    $count = 0;
    for ($t = 6;$t < $n ; $t++) {
        $check = (int)$array[1][$t];
        if ($check === 0) {
            $sagaru = $t - 6;
            $k = $t - 1;
            while ($sagaru <= $k) {
                $check1 = (int)$array[1][$k];
                if ($check1 === 0 && $first === 0) {
                    $count = 7;
                    $first = 1;
                    break;
                } elseif ($check1 === 0 && $first === 1){
                    $tmp_count = $t - $k;
                    $count = $count + $tmp_count;
                    break;
                }
                    $k--;
            }
        } else {
            continue;
        }
    }
    echo $count;
