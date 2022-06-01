<?php
if(isset($_POST['signUp'])){
    // db_connect.phpの読み込みFILL_IN
    require_once('dbconnect.php');

    // POSTで送られていれば処理実行
    // nameとpassword両方送られてきたら処理実行
    $name = $_POST['name'];
    $password = $_POST['password'];
    
    if (isset($name)&&isset($password)) {
        $sql = "INSERT INTO users (name, password) VALUES (:name, :password)";

        $dbh = db_connect();

        try {
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':name', $name);
            //$stmt->bindParam(':password', $password);
            $password_hash = password_hash($password, PASSWORD_DEFAULT);  
            $stmt->bindValue(':password', $password_hash);
            $stmt->execute();  
            //echo '登録が完了しました。';
            header("Location: login.php");
        }catch (PDOException $e) {
            $errorMessage = 'データベースエラー';
            // $e->getMessage() でエラー内容を参照可能（デバック時のみ表示）
            // echo $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>ユーザー登録画面</h1>

    <form method="POST" action="signUp.php">
        <input type="text" name="name" id="name" placeholder="ユーザー名"><br>
        <input type="password" name="password" id="password" placeholder="パスワード"><br>
        <input type="submit" name="signUp" id="signUp" value="新規登録" ><br>
    </form>
</body>

</html>
