/* Interface class for MySQL database */

<?php
class MySQLInterface{
  public static $dbHandle;

/* Execute query as safe prepared statement.
  @param templated SQL statement
  @param assoc array with params
  @returns query result. */
  public static function Exec(string $sqlQry, array $sqlParams = null){
    $prepStatement = static::$dbHandle->prepare($sqlQry);
      $prepStatement->execute($sqlParams);

    $out = [];

    while($result = $prepStatement->fetch(PDO::FETCH_ASSOC)){
      array_push($out, $result);
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

  MySQLInterface::Init();
}
?>
