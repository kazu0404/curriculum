<?php

$num = 1; 

while($num < 101) {
    if ($num % 3 == 0){
        //echo "Fizz!"."\n";
        echo "Fizz!<br/>";
    }elseif ($num % 5 == 0) {
        echo "Buzz!<br/>";
    }elseif ($num % 3 == 0 && $num % 5 == 0) {
        echo "FizzBuzz!!<br/>";
    }else {
        echo $num."<br/>";
    }

    $num++;
}

?>