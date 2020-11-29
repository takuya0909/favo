<?php
session_start();
session_regenerate_id(true);
require_once (dirname(__FILE__)."/config.php");
require_once (dirname(__FILE__)."/leyout/head.php");
unset($_SESSION['user']);
ini_set("display_errors", 1);
error_reporting(E_ALL);

$posts = $favo->post();
$user = $favo->user();
foreach ($user as $row)
{
  $_SESSION['user'] =['id'=>$row['id'],'name'=>$row['name'],];
}
//////////////////////////////
?>

<!-- body -->
<?php foreach($posts as $post): ?>
  <div class="test">
    <div><?= $post['name']; ?></div>
    <div><?= $post['post']; ?></div>
    <form class="favorite_count" action="#" method="post">
      <input type="hidden" name="post_id" value="<?=$post['id']; ?>">
      <button type="submit" name="favorite" class="favorite_btn">
        <?php if(!$favo->check_favolite_duplicate($_SESSION['user']['id'],$post['id'])): ?>
          <p>いいね</p>
        <?php else: ?>
          <p class="favo">いいね</p>
        <? endif; ?>
      </button>
    </form>
  </div>
<?php endforeach;?>
<!-- endbody -->
<?php require_once (dirname(__FILE__)."/leyout/foot.php"); ?>