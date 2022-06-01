<?php

//echo 'sample';

class Member {
    public $name;
    public $id;
    public $from;
    public $mail;
    public $sex;

    public function __construct($name, $id, $from, $mail, $sex) {
        $this->name = $name;
        $this->id = $id;
        $this->from = $from;
        $this->mail = $mail;
        $this->sex = $sex;
    }

    public function name(){
        echo $this->name . '<br>';
    }
}


$yamada = new Member('山田','001','函館','yamada@example.com','女性');
$tanaka = new Member('田中','002','-','tanaka@example.com','男性');
$takahashi = new Member('高橋','003','札幌','takahashi@example.com','女性');
$inoue = new Member('井上','004','-','inoue@example.com','男性');
$kobayashi = new Member('小林','005','大阪','kobayashi@example.com','男性');
$mori = new Member('森','006','沖縄','mori@example.com','女性');


$list = array($yamada, $tanaka, $takahashi, $inoue, $kobayashi, $mori);

// クラスの名簿の配列
/*$list = array(
        'name' => '山田',
        'ID' => '001',
        '出身' => '函館',
        'メールアドレス' => 'yamada@example.com',
        '性別' => '女性'
    ),

        'name' => '山田',
        'ID' => '002',
        'メールアドレス' => 'tanaka@example.com',
        '性別' => '男性'
    ),

    '高橋' => array(
        'ID' => '003',
        '出身' => '札幌',
        'メールアドレス' => 'takahasi@example.com',
        '性別' => '女性',
    ),

    '井上' => array(
        'ID' => '004',
        '出身' => '東京',
        'メールアドレス' => 'inoue@example.com',
        '性別' => '男性',
    ),

    '小林' => array(
        'ID' => '005',
        '出身' => '大阪',
        'メールアドレス' => 'kobayasi@example.com',
        '性別' => '男性',
    ),

    '森' => array(
        'ID' => '006',
        '出身' => '沖縄',
        'メールアドレス' => 'mori@example.com',
        '性別' => '女性',
    )
);

echo $list;*/

// 取得したクラス名簿を表示するための処理
function getName($list) {
    $i = 0;
    echo "【Aクラスの名簿】" . '<br>';
//配列の中の名前を出す。
    foreach ($list as $list) {
        //if ($i < count($list)) {
            $list->name();
        //$i++;
        }
}

//大阪出身の方を抽出
function getPeople($list) {
    foreach ($list as $list) {
        if (isset($list->from) && $list->from === '大阪') {
            echo "☆クラスで大阪出身の子は" . $list->name . PHP_EOL . "さんです。";
        }
    }
}

// クラスの一覧を表示
getName($list);
echo '<br>';

// 大阪出身の方を表示
getPeople($list);

?>