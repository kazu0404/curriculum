<?php

$num = 1; 

while($num < 101) {
    if ($num % 3 == 0){
        echo "Fizz!"."\n";
    }elseif ($num % 5 == 0) {
        echo "Buzz!"."\n";
    }elseif ($num % 3 == 0 && $num % 5 == 0) {
        echo "FizzBuzz!!"."\n";
    }else {
        echo $num."\n";
    }

    $num++;
}

?>