<?php
require_once('dbconnect.php');
require_once('function.php');

// ログインしていなければ、login.phpにリダイレクト
check_user_logged_in();

// ログイン処理開始
$dbh = db_connect();

# id降順に並び替え
$sql = "SELECT * FROM posts ORDER BY id ASC";
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
</head>

<body>
    <h1>メインページ</h1>
    <p>ようこそ<?php echo $_SESSION["user_name"]; ?>さん</p>

    <a href="logout.php">ログアウト</a>

    <table>
    <tr>
        <td>記事ID</td>
        <td>タイトル</td>
        <td>本文</td>
        <td>投稿日</td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['content']; ?></td>
            <td><?php echo $row['time']; ?></td>
            <td><a href="detail_post.php?id=<?php echo $row['id']; ?>">詳細</a></td>
            <td><a href="edit_post.php?id=<?php echo $row['id']; ?>">編集</a></td>
            <td><a href="delete_post.php?id=<?php echo $row['id']; ?>">削除</a></td>
        </tr>
    <?php } ?>
</table>

</body>

</html>

