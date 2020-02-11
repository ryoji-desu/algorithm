<?php
//1問目
while ($line = fgets(STDIN)) {
   $tmp[] = trim($line);
}

// 配列の各要素をさらに分解します
foreach ($tmp as $key => $value) {
  $array[] = explode(" ", $value);
}

$c = $array[0][0];
$answer = $c++;
echo $answer;

//2問目
while ($line = fgets(STDIN)) {
   $tmp[] = trim($line);
}

// 配列の各要素をさらに分解します
foreach ($tmp as $key => $value) {
  $array[] = explode(" ", $value);
}
//命名
$number_of_subject = $array[0][0];
$max_score = $array[0][1];
$average = $array[0][2];

$tmp_sum = tmp_sum($array[1]);
$minimum_needed = $number_of_subject * $average;
$diff = $minimum_needed - $tmp_sum;
if ($minimum_needed > $tmp_sum && $diff <= $max_score) {
    echo $diff;
} elseif($minimum_needed > $tmp_sum && $diff > $max_score) {
    echo "-1";
} elseif ($minimum_needed <= $tmp_sum) {
    echo '0';
}


function tmp_sum($scores){
    global $number_of_subject;
    $sum = 0;
    $current_subject = $number_of_subject - 1;
    for ($t = 0;$t < $current_subject;$t++) {
        $tmp = $scores[$t];
        $sum = $sum + $tmp;
    }
    return $sum;
}

//3問目
while ($line = fgets(STDIN)) {
   $tmp[] = trim($line);
}

// 配列の各要素をさらに分解します
foreach ($tmp as $key => $value) {
  $array[] = explode(" ", $value);
}
//命名
$number_of_question = $array[0][0];
$number_of_submit = $array[0][1];
$count_of_correct = 0;
$count_of_penalty = 0;
$list_of_correct = array();
$tmp_wrong = array();
for ($t = 1;$t <= $number_of_submit;$t++) {
    $title_of_question = $array[$t][0];
    $bool = $array[$t][1];
    if (isset($list_of_correct[$title_of_question])) {
        continue;
    } elseif ($bool == 'WA') {
        if (isset($tmp_wrong[$title_of_question])) {
            $current_times = $tmp_wrong[$title_of_question];
            $current_times = $current_times + 1;
            $tmp_wrong[$title_of_question] = $current_times;
        } else {
            $tmp_wrong[$title_of_question] = 1;
        }
    } elseif ($bool == 'AC') {
        if (isset($tmp_wrong[$title_of_question])) {
            $current_times = $tmp_wrong[$title_of_question];
            $count_of_penalty = $count_of_penalty + $current_times;
        }
        $count_of_correct++;
        $list_of_correct[$title_of_question] = true;
    }
}
echo $count_of_correct.' '.$count_of_penalty;
 ?>
