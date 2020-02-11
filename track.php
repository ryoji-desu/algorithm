<?php //namespace Track;

// function main($lines) {
//   foreach ($lines as $index=>$value) {
//     printf("line[%s]: %s\n", $index, $value);
//   }
// }

// $array = array();
// while (true) {
//   $stdin = fgets(STDIN);
//   if ($stdin == "") {
//     break;
//   }
//   $array[] = rtrim($stdin);
// }
// main($array);
    while ($line = fgets(STDIN)) {
        $tmp[] = trim($line);
    }

    // 配列の各要素をさらに分解します
    foreach ($tmp as $key => $value) {
      $array[] = explode(" ", $value);
    }

    $number_of_games = count($array[0]);
    //0は旗が下がっている状態を指し示す
    $state_of_red = 0;
    $state_of_white = 0;


    for ($t = 0; $t < $number_of_games;$t++) {
      if ($array[0][$t] === "RU") {
        if ($state_of_red == 0) {
          $state_of_red = 1;
          continue;
        } else {
          echo 'Alice';
          exit;
        }
      }
        if ($array[0][$t] === "RD") {
          if ($state_of_red == 1) {
            $state_of_red = 0;
            continue;
          } else {
            echo "Alice";
            exit;
          }
        }
        if ($array[0][$t] === "WU") {
          if ($state_of_white == 0) {
            $state_of_white = 1;
            continue;
          } else {
            echo 'Alice';
            exit;
          }
        }
        if ($array[0][$t] === "WD") {
          if ($state_of_white == 1) {
            $state_of_white =0;
            continue;
          } else {
            echo 'Alice';
            exit;
          }
        }
    }
    if ($state_of_red == 0 && $state_of_white == 0){
      $answer = 'DD';
      echo 'Simon'."\n";
      echo $answer;
    } elseif ($state_of_red == 1 && $state_of_white == 0) {
      $answer = 'UD';
      echo 'Simon'."\n";
      echo $answer;
    } elseif ($state_of_red == 1 && $state_of_red == 1) {
      $answer = 'UU';
      echo 'Simon'."\n";
      echo $answer;
    } else {
      $answr = "DU";
      echo 'Simon'."\n";
      echo $answer;
    }
