

<?php

include_once 'autoloader.php';
include_once 'config.php';

//session_start();
$req = new Helper\Request();

if (isset($_SESSION['username'])) {
    
} else {
    switch ($req->get('action')) {
        
        
        
        case 'auth':
            $auth = new Controller\Authentification($req);
            if ($req->get('method') == 'login') {
                try {
                    $auth->login();
                } catch (\Exception $ex) {
                    echo $ex->getMessage();
                }
            } else if ($req->get('method') == 'logout') {
                $auth->logout();
            }
            break;



        case 'register':


            $register = new Controller\Authentification($req);

            if ($req->get('method') == 'register') {


                $register->register();
                
                break;
                header('Location: ' . 'src/View/User/add.php');
            }
        default:
            header('Location: ' . 'src/View/User/add.php');
    
            
            
            
            
        case 'question': 
            $question = new Controller\Question($req);
            if ($req->get('method')== 'addQuestion'){
                $question->addQuestion();
                break;
                header('Location: ' . 'src/View/User/adauga.php');
            }
            
            
            
            }
    
    
    
    
    
}
