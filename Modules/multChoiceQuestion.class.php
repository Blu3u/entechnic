<?php 
class multChoiceQuestion {
    
    public $id = 1;

    function __construct($row) {
        $this->id = $row['id'];
        $this->question = $row['question'];
        $this->correct = $row['correct'];
        $this->ans['a'] = $row['a'];
        $this->ans['b'] = $row['b'];
        $this->ans['c'] = $row['c'];
        $this->ans['d'] = $row['d'];
    }
    
    function go() {
        //
    }

    function showResult($answer) {
        $res = '';
        $res .= '
            <div style="padding: 5px; margin: 5px; border: 1px solid black;"><form>
            <input type="hidden" name="question" value="mult">
            <input type="hidden" name="id" value="'.$this->id.'">
            <h3>'.$this->question.'</h3>
        ';

        if ($this->correctAnswer($answer)) {
            $res .= '<h4 style="color: lime">Your answer was correct!</h4>';
        } else {
            $res .= '<h4 style="color: red">Your answer was incorrect!</h4>';
        }
        
        foreach ($this->ans as $key => $value) {
            $res .= $key.'<label ';
            if ($key == $this->correct) { $res .= 'style="color: lime"'; }
            $res .= '><input type="radio" name="answer" value="'.$key.'" disabled="disabled"';
            if ($key == $answer) { $res .= 'checked'; }
            $res .= '>'.$value.'</label><br>';
        }
        $res .= '<a href="/?question=mult"><button>Next question</button></a></form></div>';

        echo $res;
    }

    function correctAnswer($answer) {
        if ($this->correct == $answer) {
            return true;
        }
        return false;
    }

    function getById($id) {
        $conn = new mysqli('localhost', 'root', '', 'entechnic');
        $conn->set_charset('utf8');

        $sql = 'SELECT * FROM `mult_choice_questions` WHERE id = '.$id;
        
        $row = $conn->query($sql)->fetch_assoc();
        
        return new multChoiceQuestion($row);
    }

    function getRandom() {
        $conn = new mysqli('localhost', 'root', '', 'entechnic');
        $conn->set_charset('utf8');

        $sql = "SELECT * FROM `mult_choice_questions` ORDER BY RAND() LIMIT 1";

        $row = $conn->query($sql)->fetch_assoc();

        return new multChoiceQuestion($row);
    }
    function show() {
        $res = "";
        $res .= '
            <div style="padding: 5px; margin: 5px; border: 1px solid black;"><form>
            <input type="hidden" name="question" value="mult">
            <input type="hidden" name="id" value="'.$this->id.'">
            <h3>'.$this->question.'</h3>
        ';
        foreach ($this->ans as $key => $value) {
            $res .= '<label><input type="radio" name="answer" value="'.$key.'">'.$value.'</label><br>';
        }
        $res .= '
            <input type="submit">
            </form></div>
        ';

        echo $res;
    }
}