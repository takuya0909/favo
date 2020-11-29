<?php
require_once (dirname(__FILE__)."/db.php");
class Favo extends Database
{
 //user情報取得
  function user ()
  {
    $hoge = $this->pdo();
    $sql = "SELECT * FROM user WHERE name = 'takuya'";
    $stmt = $hoge->query($sql);
    $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $items;
  }

  function post ()
  {
    $hoge = $this->pdo();
    $sql = "SELECT * FROM post";
    $stmt = $hoge->query($sql);
    $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $items;
  }

//ユーザーIDと投稿IDを元にいいね値の重複チェックを行っています
  function check_favolite_duplicate($user_id,$post_id)
  {
    $hoge = $this->pdo();
    $sql = "SELECT * FROM favo WHERE user_id = :user_id AND post_id = :post_id";
    $stmt = $hoge->prepare($sql);
    $stmt->execute(array(':user_id' => $user_id ,':post_id' => $post_id));
    $favorite = $stmt->fetch();
    return $favorite;
  }

  function in_favo($user_id,$post_id)
  {
    $hoge = $this->pdo();
    $sql = "INSERT INTO favo(user_id,post_id,del_flg) VALUES(:user_id,:post_id,0)";
    $stmt = $hoge->prepare($sql);
    $stmt->execute(array(':user_id' => $user_id ,':post_id' => $post_id));
  }

  function out_favo($user_id,$post_id)
  {
    $hoge = $this->pdo();
    $sql = "DELETE FROM favo WHERE :user_id = user_id AND :post_id = post_id";
    $stmt = $hoge->prepare($sql);
    $stmt->execute(array(':user_id' => $user_id ,':post_id' => $post_id));
  }
}

?>