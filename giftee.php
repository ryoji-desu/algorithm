<?php
//問題１
$string = fgets(STDIN);

multiply($string);

function multiply($string) {
    $array[] = explode(" ", $string);
    $a = $array[0][0];
    $b = $array[0][1];

    $result = $a * $b;

    echo $result;
}

//問題2
$string = fgets(STDIN);

words($string);

function words($string) {
    $array[] = explode(" ", $string);
    $output = array_count_values($array[0]);


    foreach ($output as $key => $value) {
        echo  "$key:$value"."\n";
    }
}

?>
