<?php
require_once('dbconnect.php');
// セッション開始
session_start();

// $_POSTが空ではない場合
// つまり、ログインボタンが押された場合のみ、下記の処理を実行する
if (!empty($_POST)) {
    // ログイン名が入力されていない場合の処理
    if (empty($_POST["name"])) {
        echo "名前が未入力です。";
    }
    // パスワードが入力されていない場合の処理
    if (empty($_POST["password"])) {
        echo "パスワードが未入力です。";
    }

    // 両方共入力されている場合
    if (!empty($_POST["name"]) && !empty($_POST["password"])) {
        //ログイン名とパスワードのエスケープ処理
        $name = htmlspecialchars($_POST['name'], ENT_QUOTES); //HTMLの中では特殊な意味を持つため直接書くことが出来ない < や > といった記号等を、正しく画面に < や > といった記号のまま出力できるような形に変換出来ます。
        $password = htmlspecialchars($_POST['password'], ENT_QUOTES);

        // ログイン処理開始
        $dbh = db_connect();

        try {
            //データベースアクセスの処理文章。ログイン名があるか判定
            $sql = "SELECT * FROM users WHERE name = :name";
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            die();
        }

        // 結果が1行取得できたら
        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // ハッシュ化されたパスワードを判定する定形関数のpassword_verify
            // 入力された値と引っ張ってきた値が同じか判定しています。
            if (password_verify($password, $row['password'])) {
                // セッションに値を保存
                $_SESSION["id"] = $row['id'];
                $_SESSION["name"] = $row['name'];
                // main.phpにリダイレクト
                header("Location: main.php");
                exit;
            } else {
                // パスワードが違ってた時の処理
                echo "パスワードに誤りがあります。";
            }
        } else {
            //ログイン名がなかった時の処理
            echo "ユーザー名かパスワードに誤りがあります。";
        }
    }
}
?>

<!doctype html>
<html lang="ja">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>ログインページ</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <div class="header">
            <div class="left">
                 <h2>ログイン画面</h2>
            </div>
            <div class="right">
                <!--<input type="submit" href="signUp.php" id="signUp-login" value="新規ユーザー登録"> -->
                <button onclick="location.href='signUp.php'" id="signUp-login">新規ユーザー登録</button>
            </div>
        </div>

        <form method="post" action="login.php">
            <input type="text" name="name" size="15" id="name" placeholder="ユーザー名"><br>
            <input type="text" name="password" size="15" id="password" placeholder="パスワード"><br>
            <input type="submit" id="login" value="ログイン">
        </form>
    </body>

</html>
