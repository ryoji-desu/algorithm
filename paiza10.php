<?php

while ($line = fgets(STDIN)) {
   $tmp[] = trim($line);
}

// 配列の各要素をさらに分解します
foreach ($tmp as $key => $value) {
  $array[] = explode(" ", $value);
}
$number_of_hand = $array[0][0];

$osero = array();
$t = 1;
$k = 1;
//クロの状態はB 白の状態はW
while ($t <= 8) {
    $tmp_array = array();
    while ($k <= 8) {
        $tmp_array[$k] = 0;
        $k++;
    }
    $k = 1;
    $osero[$t] = $tmp_array;
    $t++;
}

$osero[4][5] = "B";
$osero[5][4] = "B";
$osero[4][4] = "W";
$osero[5][5] = "W";

for ($s = 1;$s <= $number_of_hand;$s++) {
    $side = $array[$s][0];
    $x = $array[$s][1];
    $y = $array[$s][2];
    $osero[$y][$x] = $side;
    $osero = ue($side,$x,$y,$osero);
    $osero = shita($side,$x,$y,$osero);
    $osero = migi($side,$x,$y,$osero);
    $osero = hidari($side,$x,$y,$osero);
    $osero = nanamemigiue($side,$x,$y,$osero);
    $osero = nanamemigishita($side,$x,$y,$osero,$s);
    $osero = nanamehidariue($side,$x,$y,$osero);
    $osero = nanamehidarishita($side,$x,$y,$osero);
    if ($s === 60){
        break;
    }

}
$check = 1;
$b = 0;
$w = 0;
while ($check <= 8) {
    // if (array_count_values($osero[$check]) === true) {
        $count = array_count_values($osero[$check]);
        if (isset($count["B"])){
            $tmp_b = $count["B"];
            $b = $b + $tmp_b;
        }
        if (isset($count['W'])) {
            $tmp_w = $count["W"];
            $w = $w + $tmp_w;
        }
        

    // }
    $check++;
}
if ($b > $w) {
    $b = str_pad($b, 2, 0, STR_PAD_LEFT);
    $w = str_pad($w, 2, 0, STR_PAD_LEFT);
    echo "$b"."-"."$w"." "."The black won!";
}elseif ($b < $w) {
    $b = str_pad($b, 2, 0, STR_PAD_LEFT);
    $w = str_pad($w, 2, 0, STR_PAD_LEFT);
    echo "$b"."-"."$w"." "."The white won!";
}else {
    $b = str_pad($b, 2, 0, STR_PAD_LEFT);
    $w = str_pad($w, 2, 0, STR_PAD_LEFT);
    echo "$b"."-"."$w"." "."Draw!";
}

// if ($count["B"] > $count["W"]) {
//     echo "$count["B"]"
// }
//var_dump($osero);

function shita($side,$x,$y,$osero) {
    $tmp_y = $y + 1;
    if ($tmp_y === 9) {
        return $osero;
    }
    $sugu = $osero[$tmp_y][$x];
    if ($sugu === 0 || $sugu == $side) {
        return $osero;
    } else {
        while ($tmp_y <= 8) {
            if ($osero[$tmp_y][$x] === $side) {
                $tmp_y = $tmp_y - 1;
                while ($tmp_y > $y) {
                    $osero[$tmp_y][$x] = $side;
                    $tmp_y--;
                }
                return $osero;
            } elseif ($osero[$tmp_y][$x] === 0) {
                return $osero;
            }
            $tmp_y++;
        }
        return $osero;
    }
}
function ue($side,$x,$y,$osero) {
    $tmp_y = $y - 1;
    if ($tmp_y === 0) {
        return $osero;
    }
    $sugu = $osero[$tmp_y][$x];
    if ($sugu === 0 || $sugu == $side) {
        return $osero;
    } else {
        while ($tmp_y >= 1) {
            if ($osero[$tmp_y][$x] === $side) {
                $tmp_y = $tmp_y + 1;
                while ($tmp_y < $y) {
                    $osero[$tmp_y][$x] = $side;
                    $tmp_y++;
                }
                return $osero;
            } elseif ($osero[$tmp_y][$x] === 0) {
                return $osero;
            }
            $tmp_y--;
        }
        return $osero;
    }
}
function migi($side,$x,$y,$osero) {
    $tmp_x = $x + 1;
    if ($tmp_x === 9) {
        return $osero;
    }
    $sugu = $osero[$y][$tmp_x];
    if ($sugu === 0 || $sugu == $side) {
        return $osero;
    } else {
        while ($tmp_x <= 8) {
            if ($osero[$y][$tmp_x] === $side) {
                $tmp_x = $tmp_x - 1;
                while ($tmp_x > $x) {
                    $osero[$y][$tmp_x] = $side;
                    $tmp_x--;
                }
                return $osero;
            } elseif ($osero[$y][$tmp_x] === 0) {
                return $osero;
            }
            $tmp_x++;
        }
        return $osero;
    }
}
function hidari($side,$x,$y,$osero) {
    $tmp_x = $x - 1;
    if ($tmp_x === 0) {
        return $osero;
    }
    $sugu = $osero[$y][$tmp_x];
    if ($sugu === 0 || $sugu == $side) {
        return $osero;
    } else {
        while ($tmp_x >= 1) {
            if ($osero[$y][$tmp_x] === $side) {
                $tmp_x = $tmp_x + 1;
                while ($tmp_x < $x) {
                    $osero[$y][$tmp_x] = $side;
                    $tmp_x++;
                }
                return $osero;
            } elseif ($osero[$y][$tmp_x] === 0) {
                return $osero;
            }
            $tmp_x--;
        }
        return $osero;
    }
}
function nanamemigiue($side,$x,$y,$osero) {
    $tmp_x = $x + 1;
    $tmp_y = $y - 1;
    if ($tmp_x === 9 || $tmp_y === 0) {
        return $osero;
    }
    $sugu = $osero[$tmp_y][$tmp_x];
    if ($sugu === 0 || $sugu == $side) {
        return $osero;
    } else {
        while ($tmp_x <= 8 && $tmp_y >= 1) {
            if ($osero[$tmp_y][$tmp_x] === $side) {
                $tmp_x = $tmp_x - 1;
                $tmp_y = $tmp_y + 1;
                while ($tmp_x > $x) {
                    $osero[$tmp_y][$tmp_x] = $side;
                    $tmp_x--;
                    $tmp_y++;
                }
                return $osero;
            } elseif ($osero[$tmp_y][$tmp_x] === 0) {
                return $osero;
            }
            $tmp_x++;
            $tmp_y--;
        }
        return $osero;
    }
}
function nanamehidarishita($side,$x,$y,$osero) {
    $tmp_x = $x - 1;
    $tmp_y = $y + 1;
    if ($tmp_x === 0 || $tmp_y === 9) {
        return $osero;
    }
    $sugu = $osero[$tmp_y][$tmp_x];
    if ($sugu === 0 || $sugu == $side) {
        return $osero;
    } else {
        while ($tmp_x >= 1 && $tmp_y <= 8) {
            if ($osero[$tmp_y][$tmp_x] === $side) {
                $tmp_x = $tmp_x + 1;
                $tmp_y = $tmp_y - 1;
                while ($tmp_x < $x && $tmp_y > $y) {
                    $osero[$tmp_y][$tmp_x] = $side;
                    $tmp_x++;
                    $tmp_y--;
                }
                return $osero;
            } elseif ($osero[$tmp_x][$tmp_y] === 0) {
                return $osero;
            }
            $tmp_x--;
            $tmp_y++;
        }
        return $osero;
    }
}
function nanamemigishita($side,$x,$y,$osero,$s) {
    $tmp_x = $x + 1;
    $tmp_y = $y + 1;
    if ($tmp_x >= 9 || $tmp_y >= 9) {
        return $osero;
    }
    $sugu = $osero[$tmp_y][$tmp_x];
    if ($sugu === 0 || $sugu === $side) {
        return $osero;
    } else {
        while ($tmp_x <= 8 && $tmp_y <= 8) {
            if ($osero[$tmp_y][$tmp_x] === $side) {
                $tmp_x = $tmp_x - 1;
                $tmp_y = $tmp_y - 1;
                while ($tmp_x > $x && $tmp_y > $y) {
                    $osero[$tmp_y][$tmp_x] = $side;
                    $tmp_x--;
                    $tmp_y--;
                }
                return $osero;
            } elseif ($osero[$tmp_y][$tmp_x] === 0) {
                return $osero;
            }
            $tmp_x++;
            $tmp_y++;
        }
        return $osero;
    }
}
function nanamehidariue($side,$x,$y,$osero) {
    $tmp_x = $x - 1;
    $tmp_y = $y - 1;
    if ($tmp_x === 0 || $tmp_y === 0 ) {
        return $osero;
    }
    $sugu = $osero[$tmp_y][$tmp_x];
    if ($sugu === 0 || $sugu == $side) {
        return $osero;
    } else {
        while ($tmp_x >= 1 && $tmp_y >= 1) {
            if ($osero[$tmp_y][$tmp_x] === $side) {
                $tmp_x = $tmp_x + 1;
                $tmp_y = $tmp_y + 1;
                while ($tmp_x < $x && $tmp_y < $y) {
                    $osero[$tmp_y][$tmp_x] = $side;
                    $tmp_x++;
                    $tmp_y++;
                }
                return $osero;
            } elseif ($osero[$tmp_y][$tmp_x] === 0) {
                return $osero;
            }
            $tmp_x--;
            $tmp_y--;
        }
        return $osero;
    }
}
 ?>
