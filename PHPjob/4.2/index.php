<?php
    require_once('getData.php');

    $dbh = new getData();
    $users_data = $dbh->getUserData();
    $post_data = $dbh->getPostData();

?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="style.css">
</head>

<body>
        <div class="header">
            <div class="header-left">
                <img class="logo" src="logo.png" alt="logo">
            </div>

            <div class="header-right">
                <div class="right-1">
                    <p>ようこそ<?php echo $users_data['last_name'] . $users_data['first_name']?>さん</p>
                </div>

                <div class="right-2">
                    <p>最終ログイン日：<?php echo $users_data['last_login']?></p>
                </div>
            </div>
        </div>

        <div class="main">
            <table>
                <div class="table-h">   
                    <thead>
                        <tr>
                                <th>記事ID</th>
                                <th>タイトル</th>
                                <th>カテゴリ</th>
                                <th>本文</th>
                                <th>投稿日</th>
                        </tr>
                    </thead>
                </div>

                <tbody>
                    <div class="table-d">   
                            <?php foreach($post_data as $val){ 
                                    echo '<tr>';

                                        if ($val['category_no']==1){
                                            $val['category_no']="食事";
                                        }else if($val['category_no']==2){
                                            $val['category_no']="旅行";
                                        }else{
                                            $val['category_no']="その他";
                                        }

                                        echo '<td>'.$val['id'].'</td>';
                                        echo '<td>'.$val['title'].'</td>';
                                        echo '<td>'.$val['category_no'].'</td>';
                                        echo '<td>'.$val['comment'].'</td>';
                                        echo '<td>'.$val['created'].'</td>';

                                    echo '</tr>';
                            }?>
                    </div>
                </tbody>         
            </table>
        </div>
        
        <div class="footer">
            <p>Y&I group.inc</p>
        </div>  

</body>
</html>
