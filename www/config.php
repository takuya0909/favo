<?php
require_once (dirname(__FILE__)."/favo.php");
$favo = new Favo();
if(isset($_POST['favorite'])){
  $current_user = $_SESSION['user']['id'];
  $post_id = $_POST['post_id'];

  if($favo->check_favolite_duplicate($current_user,$post_id)){
    $favo->out_favo($current_user,$post_id);
  }
  else
  {
    $favo->in_favo($current_user,$post_id);
  }
  header('Location: user_disp.php');
}
?>