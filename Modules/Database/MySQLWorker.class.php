<?php
/* Interface class for MySQL database */

require_once 'Modules\Database\Workers\MySQLAccountsWorker.class.php';
require_once 'Modules\Database\Workers\MySQLDocumentWorker.class.php';
require_once 'Modules\Database\Workers\MySQLQuizWorker.class.php';

class MySQLWorker{
  public static $Accounts;
  public static $Document;
  public static $Quiz;

  private function __construct(){}

  public static function Init(){
    static::$Accounts = MySQLAccountsWorker::Get();
    static::$Document = MySQLDocumentWorker::Get();
    static::$Quiz = MySQLQuizWorker::Get();
  }
}

MySQLWorker::Init();
?>
