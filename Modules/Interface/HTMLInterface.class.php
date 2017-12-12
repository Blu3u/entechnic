<?php
/* Interface class for MySQL database */
require_once 'Modules\Interface\HTMLWorker.class.php';
require_once 'Core\Auth\SessionInterface.class.php';

class HTMLInterface{
  private function __construct(){}

  public static function GetNavigation(){
    $guestOnly = '';
    $userOnly = '';
    $adminOnly = '';

    switch(SessionInterface::GetUserState()){
      case UserState::Admin: {

      }
      case UserState::User: {

        break;
      }
      case UserState::Guest: {
        $guestOnly = <<<HTML
        <li class="nav-item">
          <a href="#" class="nav-link" id="signIn">Sing In</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link" id="signUp" >Sing Up</a>
        </li>
HTML;
        break;
      }
      default: {
        //unrecognised user state
        break;
      }
    }

    $navigationText = <<<HTML
    <ul class="navbar-nav">
      <li class="nav-item">
        <a href="index.html" class="nav-link navpos" id="home">Home</a>
      </li>
      $guestOnly
      <li class="nav-item">
        <a href="contact.html" class="nav-link navpos" id="contact">Contact</a>
      </li>
    </ul>
HTML;

  echo $navigationText;
  }


  public static function GetExamOverlay(){

  }

  public static function GetAdminOverlay(){

  }

  public static function GetContactOverlay(){

  }
}
?>
