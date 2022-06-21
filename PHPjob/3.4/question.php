<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <div class="main">
    <?php
    $my_name = $_POST['my_name'];
    $question1 = array("80","22","20","21");
    $question2 = array("PHP","Python","JAVA","HTML");
    $question3 = array("join","select","insert","update");

    ?>
    <div class="question_form">
      <form action="answer.php" method="post">
          <p class="myname">お疲れ様です<?php echo $my_name; ?>さん</p>
          <input type="hidden" name="my_name" value=<?=$my_name?>>
          
          <!--フォームの作成 通信はPOST通信で-->
          <h2 class="h2">①ネットワークのポート番号は何番？</h2>
          <!--③ 問題のradioボタンを「foreach」を使って作成する-->
            <div class="question">
              <?php
                foreach($question1 as $id => $value ){
          
                echo "<input type=\"radio\" name=\"question1\" value=\"{$value}\"";
          
                if($id == 0) echo "checked";
          
                echo ">";
          
                echo $value;
            }
            ?>
            </div>

          <h2 class="h2">②Webページを作成するための言語は？</h2>
          <!--③ 問題のradioボタンを「foreach」を使って作成する-->
          <div class="question">
              <?php
                foreach($question2 as $id => $value ){
          
                echo "<input type=\"radio\" name=\"question2\" value=\"{$value}\"";
          
                if($id == 0) echo "checked";
          
                echo ">";
          
                echo $value;
            }
            ?>
          </div>

          <h2 class="h2">③MySQLで情報を取得するためのコマンドは？</h2>
          <!--③ 問題のradioボタンを「foreach」を使って作成する-->
          <div class="question">
              <?php
                foreach($question3 as $id => $value ){
          
                echo "<input type=\"radio\" name=\"question3\" value=\"{$value}\"";
          
                if($id == 0) echo "checked";
          
                echo ">";
          
                echo $value;
            }
            ?>
          </div>

      <br>
      <br>

          <!--問題の正解の変数と名前の変数を[answer.php]に送る-->
          <div class="question_submit">
            <input type="submit" class="submit2" value="回答する">
          </div>
      </form>
    </div>
  </div>
</body>

</html>