<?php
/* Interface class for MySQL database */
class MySQLInterface{
  public static $dbHandle;

/* Handles connection with database. */
  public static function Init(){
    try {
      static::$dbHandle = new PDO('mysql:host=localhost;dbname=entechnic', 'root', '');
    }
    catch (PDOException $exception) {
        print $exception->getMessage();
        die('err');
    }
  }

/* Execute query as safe prepared statement.
  @param templated SQL statement
  @param assoc array with params
  @returns query result. */
  public static function Exec(string $sqlQry, array $sqlParams = null){
    return static::$dbHandle->prepare($sqlQry)->execute($sqlParams);
  }
}

MySQLInterface::Init();
?>
