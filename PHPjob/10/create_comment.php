<?php
// dbconnect.phpの読み込みFILL_IN
// function.phpの読み込みFILL_IN
// ログインしていなければ、login.phpにリダイレクトFILL_IN

// db_connect.phpの読み込み
require_once('dbconnect.php');
// function.phpの読み込み
require_once('function.php');

// ログインしていなければ、login.phpにリダイレクト
check_user_logged_in();

$post_id = $_GET['post_id'];

// 提出ボタンが押された場合
if (!empty($_POST)) { 
    // POST送信されたpost_idを変数に格納しておく 
    $post_id = $_POST["post_id"];
    //echo $post_id;

    // nameとcontentの入力チェック 
    if (empty($_POST["name"])) { 
        echo '名前が未入力です。';
    } else if (empty($_POST["content"])) { 
        echo 'コメントが未入力です。'; 
    } 

    if (!empty($_POST["name"]) && !empty($_POST["content"])) { 
        // name、contentを格納 
        $name = $_POST["name"];
        $content = $_POST["content"]; 

        // PDOのインスタンスを取得 FILL_IN
        $dbh = db_connect();

        try { 
        // SQL文の準備 FILL_IN 
        // プリペアドステートメントの準備 FILL_IN
        // post_idをバインド FILL_IN
        // nameをバインド FILL_IN 
        // contentをバインド FILL_IN
        // 実行 FILL_IN
            $sql = "INSERT INTO comments (post_id, name, content) VALUES (:post_id, :name, :content)";
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':post_id', $post_id);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':content', $content);
            $stmt->execute();
            //echo $post_id;
            //echo $name;
            //echo $content;
        // 対象のpost_idのdetail_post.phpにリダイレクト
            echo "登録完了しました。";
            header("Location: detail_post.php?id=".$post_id);
                exit; 
        } catch (PDOException $e) {
        // エラーメッセージの出力
            echo 'Error: ' . $e->GETMessage(); 
        // 終了
            die(); 
        }
        } else {
        // GETで渡されたデータがなかった場合
        // POSTで渡されたpost_idを受け取る 
            $post_id = $_POST['post_id']; 
            // $post_idが空だった場合は不正な遷移なので、main.phpに戻す
            redirect_main_unless_parameter($post_id);
            }
}
?>

<!DOCTYPE html>
<html>
<head> 
<title>
</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>

<body>
    <h1>コメント</h1> 
    <form method="POST" action="create_comment.php">
        
        <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
        投稿者名:<br> 
        <input type="text" name="name"> <br> 
        コメント:<br>   
        <input type="text" name="content" style="width:200px;height:100px;"><br> 
        <input type="submit" value="submit">
    </form>

    <a href="detail_post.php?id=<?php echo $post_id ?>">記事詳細に戻る</a>
</body>
</html>