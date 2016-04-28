<?php

namespace Repository;

use Helper\Myex;
use Repository\Interface_repository as Interface_repository;
use Entity\QuestionEntity as Question;

class QuestionRepository implements Interface_repository
{

    private $content;
    private $file;

    function __construct($file)
    {
        $this->file = $file;
        $this->content = $this->loadQuestionInfo($this->file);
    }

    public function load($id)
   
            /* @var $user \Entity\Question */{
        foreach ($this->content as $question) {
            if ($question->getQuestion() == $id) {
                return $question;
                
            }
        }
        throw new Myex("question dont exist");
         
    }

    public function loadAll()
    {
        return $this->content;
    }

    public function save($entity)
    {

        /* @var $user \Entity\Question */
        $contents = file_get_contents($this->file);

        $contentsArray = json_decode($contents, true);
        $contentsArray[] = $entity->transformObjectToArrayQuestion();
       
        $question = [];
        $question[] = file_put_contents($this->file, json_encode($contentsArray));
        
    }

    private function loadJSONContent()
    {
        $fileContent = file_get_contents($this->file);
        $decodedContent = json_decode($fileContent);
        return $decodedContent;
       
    }

    private function loadQuestionInfo()
    {
        $questions = [];
        $jsonContent = $this->loadJSONContent($this->file);

        foreach ($jsonContent as $questionInfo) {
           
            $questions[] = new Question($questionInfo->question, $questionInfo->answer, $questionInfo->correct, $questionInfo->procent);
        }
        return $questions;
    }

    public function search($id)
    {
var_dump($question);die();
        $jsonContent = $this->loadJSONContent($this->file);

        foreach ($jsonContent as $data) {
           
            foreach ($data as $key => $value) {
            
                if ($key === 'question' && $value === $id)
                   
                    {
//                    var_dump($value);
//                    var_dump($key);die();
                    throw new Myex("Question exist in database");
                }
            }
        }
        return false;
    }

}
