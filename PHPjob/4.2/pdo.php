<?php
define('DB_DATABASE', 'checktest4');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('PDO_DSN', 'mysql:host=localhost;charset=utf8;dbname='.DB_DATABASE);

//echo "sample";

// セッション開始
session_start();
// DBサーバのURL
$db['host'] = "localhost";
// ユーザー名
$db['user'] = "root";
// ユーザー名のパスワード
$db['pass'] = "root";
// データベース名
$db['dbname'] = "checktest4";

function db_connect() {
    try {
        $dbh = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
        //echo 'DBと接続しました。';
        return $dbh;
    } catch (PDOException $e) {
        echo 'Error:' . $e->getMessage();
        die();
    }
}

?>
