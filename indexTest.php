<?php

    $conn = new mysqli('localhost', 'root', '', 'entechnic');
    $conn->set_charset('utf8');

    if ($conn->connect_error) {
        die("Failed to connect to database :(");
    }

    include './Modules/multChoiceQuestion.class.php';

    if (isset($_GET['question'])) {
        $q = $_GET['question'];

        if ($q == 'mult') {
            if (isset($_GET['answer']) && isset($_GET['id'])) {
                multChoiceQuestion::getById( $_GET['id'] )->showResult( $_GET['answer'] );
            } else {
                multChoiceQuestion::getRandom()->show();
            }
        }
    } else {
        ?>
            <h1>INDEX</h1>
            <a href="/indexTest.php?question=mult"><button>Mult</button></a>
        <?php
    }

    // if (isset($_GET['question'])) {
    // 	$q = $_GET['question'];
    // 	if ($q == 'mult') {
    //         if (isset($_GET['answer']) && isset($_GET['id'])) {
    //             $id= $_GET['id'];
    //             $sql = 'SELECT * FROM `mult_choice_questions` WHERE id = '.$id.' ORDER BY RAND() LIMIT 1';
    //             $query_result = $conn->query($sql);
    //         } else {
    //             $sql = "SELECT * FROM `mult_choice_questions` ORDER BY RAND() LIMIT 1";
    //             $query_result = $conn->query($sql);
    //         }		
    // 		foreach ($query_result as $key => $v) {
    //             echo '<div style="padding: 5px;">';
    //             echo ' '.$v['id'].' '.$v['question'].'<br>';
    //             if (isset($_GET['answer'])) { 
    //                 if ($v['correct'] == $_GET['answer']) {
    //                     echo '<div>Your answer is correct! :)</div>';
    //                 } else {
    //                     echo '<div>Your answer is incorrect! :(</div>';
    //                 }
    //             }
    //             echo '<form>';
    //                 echo '<input type="hidden" name="question" value="mult">';
    //                 echo '<input type="hidden" name="id" value="'.$v['id'].'">';
    //                 $ans = ['a', 'b', 'c', 'd'];
    //                 foreach ($ans as $l) {
    //                     echo '<label><input type="radio" name="answer" value="'.$l.'">'.$v[$l].'</label><br>';
    //                 }
    //                 echo '<input type="submit">';
    //             echo '</form>';
    // 			echo '</div>';		
    // 		}
    // 	}
    // } else {
    //     // header index
    // }
?>