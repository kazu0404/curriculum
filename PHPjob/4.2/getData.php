<?php
require_once('pdo.php');

class getData{

    public $dbh;
    public $data;

    //コンストラクタ
    function __construct()  {
        $this->dbh = db_connect();
    }

    /**
     * ユーザ情報の取得
     *
     * @param 
     * @return array $users_data ユーザ情報
     */

    public function getUserData(){
        $getusers_sql = "SELECT * FROM users limit 1"; //1行取得
        $users_data = $this->dbh->query($getusers_sql)->fetch(PDO::FETCH_ASSOC);
        return $users_data;
    }
    
    /**
     * 記事情報の取得
     *
     * @param 
     * @return array $post_data 記事情報
     */

    public function getPostData(){
        $getposts_sql = "SELECT * FROM posts ORDER BY id desc"; //全件取得
        $post_data = $this->dbh->query($getposts_sql);
        return $post_data;
    }
}