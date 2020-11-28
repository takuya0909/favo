<?php
class Database
{
  const DB_NAME = 'favo';
  const HOST = 'mysql';
  const UTF = 'utf8';
  const USER = 'root';
  const PASS = 'password';

  function pdo()
  {
    $dsn = "mysql:host=".self::HOST."; port=3306;dbname=".self::DB_NAME.";charset=".self::UTF;
    $user = self::USER;
    $pass = self::PASS;

    try
    {
      $pdo=new PDO($dsn,$user,$pass,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES '.self::UTF));
    }
    catch(PDOException $e)
    {
      echo 'error'.$e->getMesseage;
      die();
    }
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    return $pdo;
  }

}

?>