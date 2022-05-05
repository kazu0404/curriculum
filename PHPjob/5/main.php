<?php
require_once('dbconnect.php');
require_once('function.php');

// ログインしていなければ、login.phpにリダイレクト
check_user_logged_in();

// ログイン処理開始
$dbh = db_connect();

# id降順に並び替え
$sql = "SELECT * FROM books ORDER BY id ASC";
$stmt = $dbh->prepare($sql);
$stmt->execute();

/*
// セッション開始
session_start();

// セッションにuser_nameの値がなければlogin.phpにリダイレクト
if (empty($_SESSION["user_name"])) {
    header("Location: login.php");
    exit;
}
//echo $_SESSION["user_name"];
*/
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>メイン</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>在庫一覧画面</h1>
    
    <div class="header">
        <div class="left">
            <!--<a href="create_book.php" class="new_btn">新規登録</a> -->
            <button onclick="location.href='create_book.php'" id="create-main">新規登録</button> 
        </div>

        <div class="right">
           <!-- <a href="logout.php" class="out_btn">ログアウト</a>-->
            <button onclick="location.href='logout.php'" id="logout-main">ログアウト</button> 
        </div>
    </div>

    <table>
        <tr>
            <td>タイトル</td>
            <td>発売日</td>
            <td>在庫数</td>
            <td></td>
        </tr>

        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['stock']; ?></td>
                <td class="delete"><a href="delete_post.php?id=<?php echo $row['id']; ?>">削除</a></td>
            </tr>
        <?php } ?>
    </table>    
</body>
</html>

