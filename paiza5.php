<?php
//長テーブルのうなぎ屋 
//要素の切り出し
while ($line = fgets(STDIN)) {
   $tmp[] = trim($line);
}
foreach ($tmp as $key => $value) {
  $array[] = explode(" ", $value);
}

$number_of_seats = $array[0][0];
$number_of_group = $array[0][1];
//例外処理(グループの数と行数が一致しない時)
if (count($array)-1 !== $number_of_group) {
  $number_of_group = count($array)-1;
}

//フラッグ設定
$seats = array();
for ($n = 1; $n <=$number_of_seats;$n++){
	$seats = $seats + array($n =>0);
}

$max_of_seats = count($seats);
$difference = $max_of_seats;
//席詰め開始
for ($t = 1;$t <= $number_of_group;$t++) {

    $number_of_person = $array[$t][0];
    $start_of_seat = $array[$t][1];
    //例外処理(最初に座る席の番号が1未満若しくは、$max_of_seatsより大きい場合)
    if ($start_of_seat < 0 || $max_of_seats < $start_of_seat) {
        continue;
    }
        for ($p =  $start_of_seat;$p <=$start_of_seat + $number_of_person-1;$p++) {

            if ($p > $max_of_seats) {
                //席が一周した場合
                $difference = $start_of_seat + $number_of_person -1 -$max_of_seats;
                $p = $p - $max_of_seats;

            }
			 if ($difference < $p) {
                break;
            } elseif ($difference !== $max_of_seats && $seats[$p] == 1) {

                for ($u = $p-1;$u >= 1; $u--) {
                    $seats[$u] = 0;
                }
                for ($c =$max_of_seats;$c >= $start_of_seat;$c--) {
                    //同じグループの人がすでに座ってしまっていた場合
                    $seats[$c] = 0;
                }
            } elseif ($difference < $p) {
                break;
            }
            if (array_key_exists($p,$seats) && $seats[$p] == 0) {
                //着席していく
                $seats[$p] = 1;
            } elseif (array_key_exists($p,$seats) && $seats[$p] == 1){
                //席が埋まっていた場合
                if ($p == $start_of_seat) {
                    //同じグループの人がまだ誰も座っていない時
                    break;
                }
                for ($k =$p-1;$k >= $start_of_seat;$k--) {
                    //同じグループの人がすでに座ってしまっていた場合
                    $seats[$k] = 0;
                }
                break;
            }
        }
  $difference = $max_of_seats;
}
//出力
$count = 0;
foreach ($seats as $seat) {
    if($seat == 1) {
        $count++;
    }
}
echo $count."\n";
