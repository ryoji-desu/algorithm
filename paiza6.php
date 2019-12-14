<?php
    //B022:選挙の演説
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
    $box_candidate = array();
    for ($n = 1;$n <= $number_of_candidate;$n++) {
        $box_candidate = array_merge($box_candidate,array($n=>0));
    }

    //スピーチ開始
    for ($i = 1;$i <= $number_of_speech;$i++ ) {
            //スピーチする立候補者
            $speak_person = $array[$i][0];
            //無関心の人が1以上の時
            if ($i <= $number_of_voters) {
                $key = $speak_person - 1;
                $value = $box_candidate[$key];
                $value = $value + 1;
                $box_candidate = array_replace($box_candidate, array($key => $value));
            }
            //2回目以降に他の人の有権者を獲得する
            if ($i >= 2) {
                for($t = 0;$t < $number_of_candidate;$t++) {
                    $check = $speak_person - 1 ;
                    if ($check == $t) {
                        continue;
                    } else {
                        $key1 = $t;
                        $value1 = $box_candidate[$key1];
                        if ($value1 > 0) {
                            $value1 = $value1 -1;
                            $box_candidate = array_replace($box_candidate, array($key1 => $value1));
                            $key2 = $speak_person - 1;
                            $value2 = $box_candidate[$key2];
                            $value2 = $value2 + 1;
                            $box_candidate = array_replace($box_candidate, array($key2 => $value2));
                        } else {
                            continue;
                        } ;
                    }
                }
            }

    }
    //得票順に並べ替え
    arsort($box_candidate);
    //回答
    $value = reset($box_candidate);
    $answer = array_keys($box_candidate, $value);
    foreach ($answer as $answer) {
        echo $answer + 1 ."\n";
    }
?>
