<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
<div class="main">
    <?php 
    //[question.php]から送られてきた名前の変数、選択した回答、問題の答えの変数を作成

    //選択した回答と正解が一致していれば「正解！」、一致していなければ「残念・・・」と出力される処理を組んだ関数を作成する

    $my_name = $_POST['my_name'];
    $answer1 = $_POST['question1'];
    $answer2 = $_POST['question2'];
    $answer3 = $_POST['question3'];

    ?>

    <div class="answer_form">
      <div class="answer_name">
        <p><?php echo $my_name; ?>さんの結果は・・・？</p>
      </div>

      <div class="answer_result1-1">
        <p>①の答え</p>
      </div>

      <div class="answer_result1-2">
        <!--作成した関数を呼び出して結果を表示-->
        <?php
        if($answer1 == '80'){
          echo '正解！';
        }else{
          echo '残念・・・';
        }
        ?>
      </div>
      
      <div class="answer_result2-1">
        <p>②の答え</p>
      </div>
      
      <div class="answer_result2-2">
      <!--作成した関数を呼び出して結果を表示-->
      <?php
      if($answer2 == 'HTML'){
        echo '正解！';
      }else{
        echo '残念・・・';
      }
      ?>
      </div>

      <div class="answer_result3-1">
        <p>③の答え</p>
      </div>

      <div class="answer_result3-2">
        <!--作成した関数を呼び出して結果を表示-->
        <?php
        if($answer3 == 'select'){
          echo '正解！';
        }else{
          echo '残念・・・';
        }
        ?>
      </div>
      
  </div>

</body>
</html>