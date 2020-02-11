<?php

//文字列の切り出し
while ($line = fgets(STDIN)) {
    $tmp[] = trim($line);
}
foreach ($tmp as $key => $value) {
  $array[] = explode(" ", $value);
}

$tate = $array[0][0];
$yoko = $array[0][1];
$t = 1;
$kabeari = false;
while ($t <= $tate) {
    $tmp_array = str_split($array[$t][0]);
    if (in_array("#",$tmp_array)) {
        $kabeari = true;
    }
    $meiro[] = $tmp_array;
    $t++;
}
//壁がない場合

if (!$kabeari) {
    $answer = kabenashi($meiro,$tate);
    echo $answer;
} else {
    $answer = kabenashi($meiro,$tate);
    echo $answer;
}
function kabenashi($meiro,$tate) {
    $k = 0;
    $s_x_zahyou = 0;
    $s_y_zahyou = 0;
    $g_x_zahyou = 0;
    $g_y_zahyou = 0;

    while ($k <$tate) {
        $result1 = array_search('S', $meiro[$k]);
        $result2 = array_search('G', $meiro[$k]);
        if ($result1 !== false) {
            $s_x_zahyou = $result1;
            $s_y_zahyou = $k;
        }
        if ($result2 !== false) {
            $g_x_zahyou = $result2;
            $g_y_zahyou = $k;
        }
        $k++;
    }
    $diff_x = abs($s_x_zahyou - $g_x_zahyou);
    $diff_y = abs($s_y_zahyou - $g_y_zahyou);

    $answer = $diff_x + $diff_y;
    return $answer;
}

function saitan($meiro,$tate) {
    $k = 0;
    $times_kabe = 0;
    $s_x_zahyou = 0;
    $s_y_zahyou = 0;
    $g_x_zahyou = 0;
    $g_y_zahyou = 0;
    while ($k <$tate) {
        $result1 = array_search('S', $meiro[$k]);
        $result2 = array_search('G', $meiro[$k]);
        if ($result1 !== false) {
            $s_x_zahyou = $result1;
            $s_y_zahyou = $k;
        }
        if ($result2 !== false) {
            $g_x_zahyou = $result2;
            $g_y_zahyou = $k;
        }
        $k++;
    }
    $diff_x = $s_x_zahyou - $g_x_zahyou;
    $diff_y = $s_y_zahyou - $g_y_zahyou;
    //はじめに横に動く場合
    //左
    if ($diff_x >= 0) {
        $tmp_count = 0;
        $tmp_x = $s_x_zahyou;
        while ($tmp_x >= $g_x_zahyou) {
            if ($meiro[$s_y_zahyou][$tmp_x] === "#") {
                $times_kabe++;
                $count = $count + $times_kabe;
            } else {
                $count++;
            }
            $tmp_x--;
        }
    } else {
        $tmp_count = 0;
        $tmp_x = $s_x_zahyou;
        while ($tmp_x <= $g_x_zahyou) {
            if ($meiro[$s_y_zahyou][$tmp_x] === "#") {
                $times_kabe++;
                $count = $count + $times_kabe;
            } else {
                $count++;
            }
            $tmp_x--;
        }
    }
        //上に行くか下に行くか
    if ($diff_y >= 0) {
        $tmp_y = $s_y_zahyou;
        while ($tmp_y <= $g_y_zahyou) {
            if ($meiro[$tmp_y][$g_x_zahyou] === "#") {
                $times_kabe++;
                $count = $count + $times_kabe;
            } else {
                $count++;
            }
            $tmp_y++;
        }
    } else {
        while ($tmp_y >= $g_y_zahyou) {
            if ($meiro[$tmp_y][$g_x_zahyou] === "#") {
                $times_kabe++;
                $count = $count + $times_kabe;
            } else {
                $count++;
            }
            $tmp_y--;
        }
    }
    echo $count;

}
