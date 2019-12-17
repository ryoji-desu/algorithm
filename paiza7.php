<?php
    //B073:【キャンペーン問題】イルミネーションの調査
    //文字列の切り出し
    while ($line = fgets(STDIN)) {
        $tmp[] = trim($line);
    }

    // 配列の各要素をさらに分解します
    foreach ($tmp as $key => $value) {
      $array[] = explode(" ", $value);
    }
    //命名

    $number_of_trees = $array[0][0];
    $number_of_safety = $array[0][1];
    $gyousuu  = $array[2][0];
    $trees = array();
    $trees = $array[1];
    for ($t = 0;$t < $gyousuu;$t++) {
        $number_of_gyousuu = $t + 3;
        $number_of_start = $array[$number_of_gyousuu][0];
        $number_of_finish = $array[$number_of_gyousuu][1];
        //平均の値を求める
        $sum = 0;
        $average_tree = $number_of_finish - $number_of_start + 1;
        for ($k = 0;$k < $average_tree;$k++) {
            $check = $number_of_start + $k -1;
            $tmp =  $trees[$check];
            $sum = $sum + $tmp;
        }
        $average = $sum / $average_tree;
        if ($average < $number_of_safety) {
            $sum_number = $number_of_safety - $average;
            $sum_number = ceil($sum_number);
            for ($k = 0;$k < $average_tree;$k++) {
                $check = $number_of_start + $k -1;
                $tmp =  $trees[$check];
                $tmp = $tmp + $sum_number;
                $trees[$check] = $tmp;
            }
        }
    }
    $space_separated = implode(" ", $trees);
    echo $space_separated . "\n";
