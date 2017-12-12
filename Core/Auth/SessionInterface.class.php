<?php
require_once 'UserState.class.php';
require_once 'Modules\Database\MySQLInterface.class.php';

/* Class that handless session and user authorization */
class SessionInterface{
  private static $userState = UserState::Guest;

  private function __construct(){}

  public static function Init(){
    session_start();

    static::RegisterUser();
    static::AuthorizeUser();
  }

  public static function GetUserState(){
    return static::$userState;
  }

  public static function GetAuth(){
    return isset($_SESSION['authKey']) ? $_SESSION['authKey'] : false;
  }

  private static function SetAuth($authKey){
    $_SESSION['authKey'] = $authKey;
  }

/* Detect user login attempt or existing session */
  private static function AuthorizeUser(){
    if(isset($_POST['usrLogin']) && isset($_POST['usrPasswd'])){
      $qryStatement = 'SELECT idUsers, userMail, userPrivileges FROM users WHERE userMail = :name AND userPass = SHA2(:pass,256) LIMIT 1';
      $qryParams = [':name' => $_POST['usrLogin'], ':pass' => $_POST['usrLogin']];

      if($qryResult = MySQLInterface::Exec($qryStatement, $qryParams)){ /* logging in */
        if($qryResult['userPrivileges']){
          static::$userState = UserState::Admin;
        }else{
          static::$userState = UserState::User;
        }
        static::SetAuth($qryResult['idUsers']);
      }
    }else if(isset($_SESSION['isLogged'])){ /* already logged in */
      if(isset($_SESSION['isAdmin'])) static::$userState = UserState::Admin;
      else static::$userState = UserState::User;
    }
  }

/* Detect user registration attempt and validate credentials */
  private static function RegisterUser(){
    if(isset($_POST['newLogin']) && isset($_POST['newMail']) && isset($_POST['newPassword'])){
      if(preg_match('/^[A-Za-z][A-Za-z0-9]{5,31}$/', $_POST['newLogin'])
      && filter_var($_POST['newMail'], FILTER_VALIDATE_EMAIL)){
        $qryStatement = 'SELECT userName FROM users WHERE userName = :name LIMIT 1';
        $qryParams = [':name' => $_POST['newLogin']];
        if(!MySQLInterface::Exec($qryStatement, $qryParams)){
          $qryStatement = 'SELECT userName FROM users WHERE userMail = :mail LIMIT 1';
          $qryParams = [':mail' => $_POST['newMail']];
          if(!MySQLInterface::Exec($qryStatement, $qryParams)){
            $qryStatement = 'INSERT INTO users(userName, userMail, userPass) VALUES(:name,:mail,SHA2(:pass,256))';
            $qryParams = [':name' => $_POST['newLogin'], ':mail' => $_POST['newMail'], ':pass' => $_POST['newPassword']];
            if(MySQLInterface::Exec($qryStatement, $qryParams)){
              // user registered - success!
            }
          }else{
            // mail in use
          }
        }else{
          // username in use
        }
      }else{
        // login or email not valid
      }
    }
  }
}

SessionInterface::Init();
?>
