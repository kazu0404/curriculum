<?php
// db_connect.phpの読み込み
require_once('dbconnect.php');
// function.phpの読み込み
require_once('function.php');

// ログインしていなければ、login.phpにリダイレクト
check_user_logged_in();

// URLの?以降で渡されるIDをキャッチ
$id = $_GET['id'];
// もし、$idが空であったらmain.phpにリダイレクト
// 不正なアクセス対策
if (empty($id)) {
    header("Location: main.php");
    exit;
}

// PDOのインスタンスを取得
$dbh = db_connect();

try {
    $sql = "DELETE FROM books WHERE id = :id";
    // プリペアドステートメントの作成
    $stmt = $dbh->prepare($sql);
    // idのバインド
    $stmt->bindParam(':id', $id);
    $stmt->execute();
   
    // main.phpにリダイレクト
    //header("Location: main.php");
    //exit;
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
    // 終了
    die();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>削除完了</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <h1>削除完了</h1>
        <p>ID: <?php echo $id; ?>を削除しました。</p>
        <!--<a href="main.php">ホームへ戻る</a>-->
        <button onclick="location.href='main.php'" id="delete-main">ホームへ戻る</button> 
    </body>
</html>
