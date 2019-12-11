<?php
    //じゃんけんの手の出し方
    //文字列の切り出し
    while ($line = fgets(STDIN)) {
        $tmp[] = trim($line);
    }
    foreach ($tmp as $key => $value) {
      $array[] = explode(" ", $value);
    }
    $number_of_n = $array[0][0];
    $number_of_m = $array[0][1];
    //相手の出す手を数える
    $number_of_opp_goo = 0;
    $number_of_opp_choki = 0;
    $number_of_opp_paa = 0;
    $string = $array[1][0];
    $arr1 = str_split($string);
    for ($q = 0; $q< $number_of_n;$q++) {
        if ($arr1[$q] == 'C') {
            $number_of_opp_choki++;
        } elseif ($arr1[$q] == 'G') {
            $number_of_opp_goo++;
        } elseif ($arr1[$q] == 'P') {
            $number_of_opp_paa++;
        }
    }

    $result = array(0);
    $number_of_paa = 0;
    $number_of_goo = 0;
    $number_of_choki = 0;
	$limit = floor($number_of_m/5);
    //自分の出す手を考える
    for ($x = 0; $x <= $limit ;$x++) {
            $number_of_paa = $x;
            $tmp = 5 * $number_of_paa;
            $tmp2 = $number_of_m - $tmp;
            if ($tmp2 % 2 == 0 && $tmp2 !== 0) {
                $number_of_choki = $tmp2/2;
                $number_of_goo = $number_of_n - $number_of_choki - $number_of_paa;
            } elseif ($tmp2 % 2 == 0 && $tmp2 == 0)  {
                $number_of_goo = $number_of_n - $number_of_paa;
                $number_of_choki = 0;
            } else {
              continue;
            }
      	    if ($number_of_goo < 0 || $number_of_choki < 0 || $number_of_paa < 0) {
              continue;
            }
        $result_number = result($number_of_opp_choki,$number_of_opp_goo,$number_of_opp_paa,$number_of_goo,$number_of_choki,$number_of_paa);
        array_push($result,$result_number);
    }
	if ($result == null ) {
        echo 0;
        echo '\n';
    } else {
        rsort($result);
        echo $result[0]."\n";
    }
    function result($a,$b,$c,$d,$e,$f) {
        $count = 0;
        $number_of_opp_choki = $a;
        $number_of_opp_goo = $b;
        $number_of_opp_paa = $c;
        $number_of_goo = $d;
        $number_of_choki = $e;
        $number_of_paa = $f;
        //勝利数カウント
        for ($t =0;$t<$number_of_opp_choki;$t++) {
            if ($number_of_goo !== 0) {
                $count++;
                $number_of_goo--;
            } else {
                break;
            }
        }
        for ($c =0;$c<$number_of_opp_goo;$c++) {
            if ($number_of_paa !== 0) {
                $count++;
                $number_of_paa--;
            } else {
                break;
            }
        }

        for ($a =0;$a<$number_of_opp_paa;$a++) {
            if ($number_of_choki !== 0) {
                $count++;
                $number_of_choki--;
            } else {
                break;
            }
        };
        return $count;
    };
