<?php
require_once (dirname(__FILE__)."/db.php");
ini_set("display_errors", 1);
error_reporting(E_ALL);

class Favo extends Database
{
  function favolite ()
  {
    $hoge = $this->pdo();
    $sql = "SELECT * FROM favo WHERE user_id = 1 AND post_id = 2";
    $stmt = $hoge->query($sql);
    $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $items;
  }
}

$favo = new Favo();
$items = $favo->favolite();
?>

<?php foreach($items as $item): ?>
<?= $item['user_id'] ?> <br>
<?= $item['post_id'] ?>
<?php endforeach; ?>