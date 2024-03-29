<?php
require_once('dbconnect.php');
// セッション開始
//session_start();
//include_once("dbInfo.php");

// エラーメッセージ、登録完了メッセージの初期化
$errorMessage1 = "";
$errorMessage2 = "";
$errorMessage3 = "";
$signUpMessage = "";

session_start();

// ログインボタンが押された場合
if (isset($_POST["signUp"])) {
    // 1. ユーザIDの入力チェック
    if (empty($_POST["name"])) {  // 値が空のとき
        $errorMessage1 = 'ユーザーIDが未入力です。';
        echo "$errorMessage1\n<br/>";
    } 
    
    if (empty($_POST["password"]) || empty($_POST["password2"])) {
        $errorMessage2 = 'パスワードが未入力です。';
        echo "$errorMessage2\n<br/>";
    }

    if (!empty($_POST["name"]) && !empty($_POST["password"]) && !empty($_POST["password2"]) && $_POST["password"] === $_POST["password2"]) {
        // 入力したユーザIDとパスワードを格納
        $name = $_POST["name"];
        $password = $_POST["password"];

        // 2. ユーザIDとパスワードが入力されていたら認証する
        //$dsn = sprintf('mysql: user=%s; pass=%s; charset=utf8', $db['user'], $db['pass']);

        // 3. 処理

        $dbh = db_connect();

        try {
            //$pdo = new PDO($dsn, $db['user'], $db['pass'], array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

            $sql = "INSERT INTO users (name, password) VALUES (:name, :password)";
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':password', $password);

            //$stmt->execute(array($name, password_hash($password, PASSWORD_DEFAULT)));  // パスワードのハッシュ化を行う（今回は文字列のみなのでbindValue(変数の内容が変わらない)を使用せず、直接excuteに渡しても問題ない）
            $stmt->execute();  // 
            //echo 'インサートしました。';
            $userid = $dbh->lastinsertid();  // 登録した(DB側でauto_incrementした)IDを$useridに入れる
            $signUpMessage = '登録が完了しました。あなたの登録IDは ' . $userid . ' です。パスワードは ' . $password . ' です。';  // ログイン時に使用するIDとパスワード
            echo $signUpMessage;
        } catch (PDOException $e) {
            $errorMessage = 'データベースエラー';
            // $e->getMessage() でエラー内容を参照可能（デバック時のみ表示）
            // echo $e->getMessage();
        }
    } else if ($_POST["password"] != $_POST["password2"]) {
        $errorMessage3 = 'パスワードに誤りがあります。';
        echo $errorMessage3;
    }
}

?>