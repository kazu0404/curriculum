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
            echo '登録が完了しました。';
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
</head>

<body>
    <h1>新規登録</h1>

    <form method="POST" action="signUp.php">
        user:<br>
        <input type="text" name="name" id="name">
        <br>
        password:<br>
        <input type="password" name="password" id="password"><br>
        <input type="submit" value="submit" id="signUp" name="signUp"><br>
    </form>
</body>

</html>
