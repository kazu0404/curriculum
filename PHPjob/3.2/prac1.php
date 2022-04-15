<?php

$fruits = ["りんご", "みかん", "もも"];

function getfruits($val, $num) {
    $number = [1, 1, 6];
    $value = [300, 150, 500];

    $price = $value[$val] * $number[$num];

    return $price;
}

//echo getfruits(1,2);

$i = 0; 
$number = 0;
while($i < 3) {
    echo $fruits[$i]."は".getfruits($i,$number)."円です。";
    echo "<br>";
    
    $i++;
    $number++;
}

?>