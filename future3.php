<?php

//文字列の切り出し
while ($line = fgets(STDIN)) {
    $tmp[] = trim($line);
}

$array = str_split($tmp[0]);


$count_numbers = array_count_values($array);

ksort($count_numbers);
$count_zero = 0;
if (isset($count_numbers[0])) {
    $count_zero = $count_numbers[0];
}
$answer === 0;
$count_roop = 0;

foreach ($count_numbers as $key => $value) {
  if ($key === 0) {
      continue;
  } elseif ($count_zero !== 0 && $count_roop === 0) {
      $answer = $key;
      $count_zero = $count_zero + 1;
      $answer = str_pad($answer, $count_zero, 0, STR_PAD_RIGHT);
      $count_strings = strlen($answer);
      $tmp_value = $value + $count_strings - 1;
      $answer = str_pad($answer, $tmp_value, $key, STR_PAD_RIGHT);
  } elseif ($answer === 0 && $count_roop === 0) {
      $answer = $key;
      $count_strings = strlen($answer);
      $tmp_value = $value + $count_strings - 1;
      $answer = str_pad($answer, $tmp_value, $key, STR_PAD_RIGHT);
  } else {
      $count_strings = strlen($answer);
      $tmp_value = $value + $count_strings;
      $answer = str_pad($answer, $tmp_value, $key, STR_PAD_RIGHT);
  }
  $count_roop++;
}

echo $answer;
