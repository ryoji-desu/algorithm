<?php
// A020:文字をなぞれ
// 標準入力を一行ずつ配列に代入します
while ($line = fgets(STDIN)) {
   $tmp[] = trim($line);
}

// 配列の各要素をさらに分解します
foreach ($tmp as $key => $value) {
  $array[] = explode(" ", $value);
}
$number_of_lines = $array[0][0];
$start = $number_of_lines + 1;
$number_of_words = $array[$start][0];
$answer = array();
//文字の引き詰め
$words = array();
for ($i = 1;$i <= $number_of_lines; $i++) {
    $tmp = $array[$i][0];
    $tmp1 = str_split($tmp);
    $tmp_array = array();
    for ($t = 0;$t < $number_of_lines; $t++) {
        $tmp_array[] = $tmp1[$t];
    }
    array_push($words,$tmp_array);
}
for ($k = 0; $k < $number_of_words;$k++) {
    //チェックする文字列の引き出し
    $start1 = $start + 1 + $k;
    $word = $array[$start1][0];
    $tmp1 = str_split($word);
    $max = count($tmp1);
    //最初の文字の一致
        for ($c = 0; $c < $number_of_lines ;$c++) {
            for ($b = 0; $b < $number_of_lines; $b++) {
                if ($tmp1[0] !== $words[$c][$b]) {
                    continue;
                } else {
                    $return = check($c,$b,$word,1,$max,$words);
                    if ($return == false) {
                        continue;
                    }
                }
            }
            if ($return == true) {
                echo $word;
                break;
            }
        }
}
function check($c,$b,$word,$number,$max,$words) {
    if ($number === $max) {
        return true;
    }
    $tmp1 = str_split($word);
    $check_word = $tmp1[$number];
    $ue = $c - 1;
    if ($words[$ue][$b] == $check_word) {
        $number = $number + 1;
        check($ue,$b,$word,$number,$max,$words);
    }
    $shita = $c + 1;
    if ($words[$shita][$b] == $check_word) {
        $number = $number + 1;
        check($shita,$b,$word,$number,$max,$words);
    }

    $migi = $b + 1;
    if ($words[$c][$migi] == $check_word) {
        $number = $number + 1;
        check($c,$migi,$word,$number,$max,$words);
    }

    $hidari = $b - 1;
    if ($words[$c][$hidari] == $check_word) {
        $number = $number + 1;
        check($c,$hidari,$word,$number,$max,$words);
    }
    return false;
}
