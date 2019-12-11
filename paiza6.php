<?php
    //
    //文字列の切り出し
    while ($line = fgets(STDIN)) {
        $tmp[] = trim($line);
    }

    // 配列の各要素をさらに分解します
    foreach ($tmp as $key => $value) {
      $array[] = explode(" ", $value);
    }
    ///命名
    $number_of_candidate = $array[0][0];
    $number_of_voters = $array[0][1];
    $number_of_speech = $array[0][2];
    //立候補者に箱を持たせる
    $a = "box";
    for ($n = 1;$n <= $number_of_candidate;$n++) {
        $n.$a = array();
    }
    //スピーチ開始
    for ($i = 1;$i <= $number_of_speech;$i++ ) {
            //無関心の人が1以上の時
            if ($i < $number_of_voters) {
                array_push($i."box",1);
            }
            for ($n = 1;$n <= $number_of_candidate;$n++) {
                if ($n == $i ) {
                    break;
                }
                if (count($n) >= 1 ){
                    array_splice($n."box",0,1);
                    array_push($i."box",1);
                }

            }

    }
    //得票数
    for ($k = 2;$k <= $number_of_speech;$k++ ){
        $max = array(1);
        if (count($max."box") == count($k."box")) {
            array_push($max,$k);
        }elseif(count($max[0]."box") < count($k."box")) {
                $max = array();
                array_push($max,$k);
        }
    }


?>
