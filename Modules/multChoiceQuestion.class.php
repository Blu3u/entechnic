<?php

function dd($a) {
    die(json_encode($a));
}

class multChoiceQuestion {

    function __construct($data) {
        if (!$data) return;

        $this->idExercises = $data['idExercises'];

        $subject = MySQLInterface::Exec('SELECT * FROM `Subjects` WHERE `idSubjects` = ' . $data['Subjects_idSubjects']);
        $this->Chapters_idChapters = $subject['Chapters_idChapters'];

        $this->Subjects_idSubjects = $data['Subjects_idSubjects'];
        $this->exerciseTitle = $data['exerciseTitle'];
        $this->exerciseDescription = $data['exerciseDescription'];
        $this->exerciseCorrectAnswer = $data['exerciseCorrectAnswer'];

        $rows = MySQLInterface::Exec('SELECT * FROM `Answers` WHERE `Exercises_idExercises` = ' . $this->idExercises);

        $this->content = [];

        foreach ($rows as $row) {
            $this->content[] = [
                'idAnswers' => $row['idAnswers'],
                'answerDescription' => $row['answerDescription'],
                'answerIndex' => $row['answerIndex'],
            ];
        }
    }
    
    function getRandom() {
        $row = MySQLInterface::Exec("SELECT * FROM `Exercises` ORDER BY RAND() LIMIT 1");
        return new multChoiceQuestion($row);
    }

    function getById($id) {
        $row = MySQLInterface::Exec("SELECT * FROM `Exercises` WHERE `idExercises` = $id");
        return new multChoiceQuestion($row);
    }

    function getRandomBySubject($subject_id) {
        $row = MySQLInterface::Exec("SELECT * FROM `Exercises` WHERE `Subjects_idSubjects` = $subject_id ORDER BY RAND() LIMIT 1");
        return new multChoiceQuestion($row);
    }

    function getRandomByChapter($chapter_id) {
        $row = MySQLInterface::Exec("SELECT * FROM `Exercises` WHERE `Subjects_idSubjects` IN ( SELECT `idSubjects` FROM `Subjects` WHERE `Chapters_idChapters` = $chapter_id) ORDER BY RAND() LIMIT 1");
        return new multChoiceQuestion($row);
    }

    function correctAnswer($answer) {
        if ($this->exerciseCorrectAnswer == $answer) {
            return true;
        }
        return false;
    }
}