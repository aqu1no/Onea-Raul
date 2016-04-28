<?php

namespace Controller;

class Question
{

    private $questionRepo;
    private $request;

    public function __construct(\Helper\Request $req)
    {
        $this->questionRepo = new \Repository\QuestionRepository(QUESTIONS_PATH);
        $this->request = $req;
    }

    public function removeQuestion($remove)
    {
        return $this->removeQuestion($remove);
    }

    public function addQuestion()
    {
        $question = $this->request->post('question');
        $answer = $this->request->post('answer');
        $correct = $this->request->post('correct');
        $procent = $this->request->post('procent');
        
        try {
            $this->questionRepo->search($question);
            
            $content = new \Entity\QuestionEntity($question, $answer, $correct, $procent);
//            var_dump($content);
            $this->questionRepo->save($content);
//            var_dump($this->questionRepo->save($content));die();
            header('Location: http://localhost/newWork4/src/View/User/adauga.php');
        } catch (\Exception $ex) {
            echo $ex->getMessage();
            header('Refresh: 2; URL=http://localhost/newWork4/index.php');
        }
    }

}
