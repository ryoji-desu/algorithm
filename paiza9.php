<?php
// A009:ビームの反射
while ($line = fgets(STDIN)) {
   $tmp[] = trim($line);
}
// 配列の各要素をさらに分解します
foreach ($tmp as $key => $value) {
  $array[] = explode(" ", $value);
}

//命名
$takasa = $array[0][0];
$haba = $array[0][1];
$count = 0;
$a = 1;
$box = array();
while ($a <= $takasa) {
    $box[] = str_split($array[$a][0]);
    $a++;
}
//start
migi(0,0,0);
//右の動き
function migi($current_takasa,$current_haba,$count) {
    global $haba,$takasa,$box;
    for ($a = $current_haba; $a < $haba; $a++) {
        if ($box[$current_takasa][$a] == "/") {
            $count++;
            $current_takasa = $current_takasa - 1;

            ue($current_takasa,$a,$count);
        } elseif ($box[$current_takasa][$a] == "_") {
            $count++;
        } else {
            $count++;
            $current_takasa = $current_takasa + 1;
            shita($current_takasa,$a,$count);
        }
    }
    echo $count;
    exit;
}
function shita($current_takasa,$current_haba,$count) {
    global $haba,$takasa,$box;
    for ($a = $current_takasa; $a < $takasa; $a++) {
        if ($box[$a][$current_haba] == "/") {
            $count++;
            $current_haba = $current_haba - 1;
            hidari($current_takasa,$current_haba,$count);
        } elseif ($box[$a][$current_haba] == "_") {
            $count++;
        } else {
            $count++;
            $current_haba = $current_haba + 1;
            migi($a,$current_haba,$count);
        }
    }
    echo $count;
    exit;
}
function ue($current_takasa,$current_haba,$count) {
    global $haba,$takasa,$box;
    for ($a = $current_takasa; $a >= 0; $a--) {
        if ($box[$a][$current_haba] == "/") {
            $count++;
            $current_haba = $current_haba + 1;
            migi($current_takasa,$current_haba,$count);
        } elseif ($box[$a][$current_haba] == "_") {
            $count++;
        } else {
            $count++;
            $current_haba = $current_haba - 1;
                                                    echo 'a';
    exit;
            hidari($a,$current_haba,$count);
        }
    }
    echo $count;
    exit;
}
function hidari($current_takasa,$current_haba,$count) {
    global $haba,$takasa,$box;
    for ($a = $current_haba; $a >= 0; $a--) {
        if ($box[$current_takasa][$a] == "/") {
            $count++;
            $current_takasa = $current_takasa + 1;
            shita($current_takasa,$a,$count);
        } elseif ($box[$current_takasa][$a] == "_") {
            $count++;
        } else {
            $count++;
            $current_takasa = $current_takasa - 1;
            ue($current_takasa,$a,$count);
        }
    }
    echo $count;
    exit;
}
