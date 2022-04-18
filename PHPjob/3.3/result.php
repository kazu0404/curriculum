<?php
//var_dump($_POST);
$numbers = $_POST['numbers'];
//echo "numbersは".$numbers."<br>";
$r = substr(str_shuffle(str_repeat($numbers, 100)), 0, 1);
//echo "rは".$r;

if ($r == 0){
    $result = "凶";
}else if ($r < 4){
    $result = "小吉";
}else if ($r < 7){
    $result = "中吉";
}else if ($r < 9){
    $result = "吉";
}else {
    $result = "大吉";
}

?>


<p><?php echo date("Y年m月d日", time()); ?>の運勢は</p>
<p>選ばれた数字は<?php echo $r; ?></p>
<p><?php echo $result; ?></p>
