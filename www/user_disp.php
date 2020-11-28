<?php
session_start();
require_once (dirname(__FILE__)."/head.php");
require_once (dirname(__FILE__)."/db.php");
unset($_SESSION['user']);
ini_set("display_errors", 1);
error_reporting(E_ALL);

class Favo extends Database
{
  //favo一覧表示。
  // function favolite ()
  // {
  //   $hoge = $this->pdo();
  //   $sql = "SELECT * FROM favo WHERE user_id = 1 AND post_id = 2";
  //   $stmt = $hoge->query($sql);
  //   $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
  //   return $items;
  // }

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
}

$favo = new Favo();
$posts = $favo->post();
$user = $favo->user();
foreach ($user as $row)
{
  $_SESSION['user'] =['id'=>$row['id'],'name'=>$row['name'],];
}

?>

<!-- body -->
<?php foreach($posts as $post): ?>
  <div class="test">
    <div><?= $post['name']; ?></div>
    <div><?= $post['post']; ?></div>
    <form class="favorite_count" action="#" method="post">
      <input type="hidden" name="post_id" value="<?=$post['id']; ?>">
      <button type="button" name="favorite" class="favorite_btn">
        <?php if(!$favo->check_favolite_duplicate($_SESSION['user']['id'],$post['id'])): ?>
          いいね
        <?php else: ?>
          いいね解除
        <? endif; ?>
      </button>
    </form>
  </div>
<?php endforeach;?>
<!-- endbody -->
<?php require_once (dirname(__FILE__)."/foot.php"); ?>