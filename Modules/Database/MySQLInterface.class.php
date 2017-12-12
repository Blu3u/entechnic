<?php
/* Interface class for MySQL database */

class MySQLInterface{
  public static $dbHandle;

  private function __construct(){}

/* Execute query as safe prepared statement.
  @param templated SQL statement
  @param assoc array with params
  @returns query results array if more than 1 row received. */
  public static function Exec(string $sqlQry, array $sqlParams = null){
    $outputData = [];

    $prepStatement = static::$dbHandle->prepare($sqlQry);
      $prepStatement->execute($sqlParams);

    while($result = $prepStatement->fetch(PDO::FETCH_ASSOC)){
      array_push($outputData, $result);
    }

    if(count($outputData) == 1) return $outputData[0];
    else if(!count($outputData)) return false;

    return $outputData;
  }

/* Disconnect from the database. */
  public static function Disconnect(){
    static::$dbHandle = null;
  }

/* Reconnect to database after disconnecting. */
  public static function Reconnect(){
    static::Init();
  }

/* Connect with database. */
  public static function Init(){
    try {
      static::$dbHandle = new PDO('mysql:host=localhost;dbname=entechnic', 'root', '');
    }
    catch (PDOException $exception) {
        print $exception->getMessage();
        //die('Database connection error. Try again later!');
    }
  }
}

MySQLInterface::Init();
?>
