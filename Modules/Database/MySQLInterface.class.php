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
    $prepStatement = static::$dbHandle->prepare($sqlQry);
      $prepStatement->execute($sqlParams);

    $out = [];

    while($result = $prepStatement->fetch(PDO::FETCH_ASSOC)){
      array_push($out, $result);
    }

    if(count($out) == 1){
      return $out[0];
    }else if(!count($out)){
      return false;
    }

    return $out;
  }

  /* Connect with database. */
  public static function Init(){
    try {
      static::$dbHandle = new PDO('mysql:host=localhost;dbname=entechnic', 'root', '');
    }
    catch (PDOException $exception) {
        print $exception->getMessage();
        die('err');
    }
  }
}

MySQLInterface::Init();
?>
