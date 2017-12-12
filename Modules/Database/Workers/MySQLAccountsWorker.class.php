<?php
class MySQLAccountsWorker{
  private function __construct(){}

  public static function Get(){
    static $instanceMySQLAccountsWorker = null;
        if ($instanceMySQLAccountsWorker === null) {
            $instanceMySQLAccountsWorker = new MySQLAccountsWorker();
        }
    return $instanceMySQLAccountsWorker;
  }

  public static function AuthorizeUser(array $userData) : bool{
    return false;
  }

  public static function RegisterUser(array $userData) : bool{
    return false;
  }

  public static function RemoveUser(array $userData) : bool{
    return false;
  }

  public static function BanUser(array $userData) : bool{
    return false;
  }

  public static function IsAdmin(array $userData) : bool{
    return false;
  }

  public static function GrantAdminPrivileges(array $userData) : bool{
    return false;
  }

  private static function GetUserId(array $userData) : integer{
    return 0;
  }

  private static function GetUserData(array $userData, string $key) : mixed{
    return [];
  }
}
?>
