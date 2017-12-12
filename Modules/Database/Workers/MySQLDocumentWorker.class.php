<?php
class MySQLDocumentWorker{
  private function __construct(){}

  public static function Get(){
    static $instanceMySQLDocumentWorker = null;
        if ($instanceMySQLDocumentWorker === null) {
            $instanceMySQLDocumentWorker = new MySQLDocumentWorker();
        }
    return $instanceMySQLDocumentWorker;
  }

  public static function GetUserProfile() : array{
    $sqlQry = 'query to get profile';
    $sqlParams = [];

    MySQLInterface::Exec($sqlQry, $sqlParams);
  }

  public static function GetUserInfo() : array{
    $sqlQry = 'query to get info';
    $sqlParams = [];

    MySQLInterface::Exec($sqlQry, $sqlParams);
  }

  public static function GetUserNotifications() : array{
    return [];
  }
}
?>
