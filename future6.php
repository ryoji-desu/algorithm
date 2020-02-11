<?php

//文字列の切り出し
while ($line = fgets(STDIN)) {
    $tmp[] = trim($line);
}
foreach ($tmp as $key => $value) {
  $array[] = explode(" ", $value);
}

$minimum_level = $array[0][0];
$max_level = $array[0][1];
$number_of_monster = $max_level - $minimum_level + 1;
$number_of_n = $array[0][0];

$n_list = $array[2];

$count_n = count($n_list);
$number_of_destroyed = 0;

if ($count_n === 1) {
    $tmp_n = $n_list[0];
    $number_of_destroyed = count_times($max_level,$minimum_level,$tmp_n);
    $answer = $number_of_monster - $number_of_destroyed;
    echo $answer;
} else {
    $tmp_n_list = $n_list;
    $tmp2_n_list = $n_list;
    $gcd = calcGCD($tmp_n_list);
    //nが互いに素の数であるとき
    $k = 0;
    if ($gcd === 1) {
        $double = lcm($tmp2_n_list,$max_level,$minimum_level);
        while (isset($n_list[$k])) {
            $tmp_n = $n_list[$k];
            $tmp_count = count_times($max_level,$minimum_level,$tmp_n);
            $number_of_destroyed = $number_of_destroyed + $tmp_count;
            $k++;
        }
        $answer = $number_of_monster - $number_of_destroyed + $double;
        echo $answer;
    }

}

function count_times($max_level,$minimum_level,$tmp_n) {
    $tmp_count = floor($max_level/$tmp_n);
    if ($tmp_n < $minimum_level) {
        $tmp_count2 = floor($minimum_level/$tmp_n);
        $tmp_count = $tmp_count - $tmp_count2;
    }
    return $tmp_count;
}

function calcGCD(array &$list) {
    $c = count($list);

    // ユークリッドの互除法を末尾2要素にかける
    $v = $list[$c - 1] % $list[$c - 2];
    if ($v === 0) {
        if ($c === 2)
            return $list[$c - 2];

        // 2要素の最大公約数が決まったら、配列を更新して再帰
        array_pop($list);
        return calcGCD($list);
    }

    $list[$c - 1] = $list[$c - 2];
    $list[$c - 2] = $v;
    return calcGCD($list);
}


function lcm($list,$max_level,$minimum_level){
    $c = count($list);
    $bigger = 1;
    $smaller = 0;
    $tmp_count = 0;
    while ($smaller < $c) {
        while ($bigger < $c) {
            $m = $list[$smaller];
            $n = $list[$bigger];
            $tmp_array = array($m,$n);
            $lcm = $m * $n / calcGCD($tmp_array);
            $tmp_count = $tmp_count + floor($max_level/$lcm);
            if ($lcm < $minimum_level) {
                $tmp_count2 = floor($minimum_level/$lcm);
                $tmp_count = $tmp_count - $tmp_count2;
            }
            $bigger++;
        }
        $smaller++;
        $bigger = $smaller + 1;
    }
    return $tmp_count;
}
