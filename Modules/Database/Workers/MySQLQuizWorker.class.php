<?php
class MySQLQuizWorker{
  private function __construct(){}

  public static function Get(){
    static $instanceMySQLQuizWorker = null;
        if ($instanceMySQLQuizWorker === null) {
            $instanceMySQLQuizWorker = new MySQLQuizWorker();
        }
    return $instanceMySQLQuizWorker;
  }

  private $previousExamMode;
  private $previousExam;
  private $previousFilter;

  public static function GetExam(mixed $examMode, $filter = false){
    $sqlQry = '';
    $sqlParams = [];

    switch($examMode){
      case FindExam::ByChapter:{
        break;
      }
      case FindExam::BySubject:{
        break;
      }
      case FindExam::RandByChapter:{
        break;
      }
      case FindExam::RandBySubject:{
        break;
      }
      case FindExam::RandByLanguage:{
        break;
      }
      default:{
        break;
      }
    }

    MySQLInterface::Exec($sqlQry, $sqlParams);
  }

  public static function GetAllExams(mixed $examMode, $filter = false) : array{
    return [];
  }

  public static function GetNumExams(mixed $examMode, $filter = false, $number) : array{
    //GetExam() x-times
    return [];
  }

  private $previousExercise;
  private $previousIndex;

  public static function GetExercise(mixed $examMode, $filter = false, $index) : array{
    $sqlQry = '';
    $sqlParams = [];

    switch($examMode){
      case FindExam::ByChapter:{
        break;
      }
      case FindExam::BySubject:{
        break;
      }
      case FindExam::RandByChapter:{
        break;
      }
      case FindExam::RandBySubject:{
        break;
      }
      case FindExam::RandByLanguage:{
        break;
      }
      default:{
        break;
      }
    }

    MySQLInterface::Exec($sqlQry, $sqlParams);
  }

  public static function GetAllExercises(mixed $examMode, $filter = false, $index) : array{
    return [];
  }

  public static function GetNumExercises(mixed $examMode, $filter = false, $number) : array{
    //GetExercise() x-times
    return [];
  }
}

abstract class FindExam{
  const ByChapter = 0;
  const BySubject = 1;
  const RandByChapter = 2;
  const RandBySubject = 3;
  const RandByLanguage = 4;
}
?>
