<?php
require_once('dbconnect.php');
// セッション開始
session_start();

// $_POSTが空ではない場合
// つまり、ログインボタンが押された場合のみ、下記の処理を実行する
if (!empty($_POST)) {
    // ログイン名が入力されていない場合の処理
    if (empty($_POST["title"])) {
        echo "タイトルが未入力です。";
    }
    // パスワードが入力されていない場合の処理
    if (empty($_POST["content"])) {
        echo "コンテンツが未入力です。";
    }

    // 両方共入力されている場合
    if (!empty($_POST["title"]) && !empty($_POST["content"])) {
        //title名とcontentのエスケープ処理
        $title = htmlspecialchars($_POST['title'], ENT_QUOTES);
        $content = htmlspecialchars($_POST['content'], ENT_QUOTES);

        // ログイン処理開始
        $dbh = db_connect();
        
        try {
            //データベースアクセスの処理文章。ログイン名があるか判定
            $sql = "INSERT INTO posts (title, content) VALUES (:title, :content)";
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':content', $content);
            $stmt->execute();
            echo "insert完了しました。";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            die();
        }
    }
}
?>

<!doctype html>
<html lang="ja">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>記事登録</title>
    </head>

    <body>
        <h1>記事登録</h1>
        <form method="post" action="create_post.php">
            title：<br>
            <input type="text" name="title" size="20" style="width:200px;height:50px"><br>
            content：<br>
            <input type="text" name="content" size="100" style="width:200px;height:100px"><br>
            <input type="submit" value="submit">
        </form>
    
    </body>

</html>
