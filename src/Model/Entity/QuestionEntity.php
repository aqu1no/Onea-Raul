<?php

namespace Entity;

class QuestionEntity {
   private $question;
    private $answer;
    private $correct;
    private $procent;


 public function __construct($question, $answer, $correct, $procent) {
     
        $this->question = $question;
        $this->answer = $answer;
        $this->correct = $correct;
        $this->procent = $procent;
        
    }
    
    public function setQuestion($question) {
        $this->question = $question;
    }

    public function getQuestion() {
        return $this->question;
    }

    public function getAnswer() {
        return $this->answer;
    }

    public function setAnswer($answer) {
        $this->answer = $answer;
    }
    
    
    public function getCorrect() {
        return $this->correct;
    }

    public function setCorrect($correct) {
        $this->correct = $correct;
    }
    
    public function getProcent() {
        return $this->procent;
    }

    public function setProcent($procent) {
        $this->procent = $procent;
    } 
    
    public function transformObjectToArrayQuestion() {
        return array(
            "question" => $this->question,
            "answer" => $this->answer,
            "correct" => $this->correct,
            "procent" => $this->procent
        );
    }
    
    
    
    
    
}