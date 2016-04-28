<?php

namespace Controller;

class Authentification
{

    private $userRepo;
    private $request;

    public function __construct(\Helper\Request $req)
    {
        $this->userRepo = new \Repository\UserRepository(USERS_PATH);

        $this->request = $req;
    }

    public function login()
    {
        session_start();

        $username = $this->request->post('username');
        $pass = $this->request->post('password');

        try {
            $user = $this->userRepo->load($username);

            if ($user->verifyPass($pass)) {

                $_SESSION['Login'] = $username;

                if ($user->isAdmin() == true) {

                    header('Location: http://localhost/newWork4/src/View/User/ADMIN.php');
                } else {

                    header('Location: http://localhost/newWork4/src/View/User/USER.php');
                }
            }
        } catch (\Exception $ex) {
            echo $ex->getMessage();
            header('Refresh: 2; URL=http://localhost/newWork4/index.php');
        }
    }

    public function logout()
    {
        session_start();

        session_destroy();
    }

    public function register()
    {


        $username = $this->request->post('username');
        $pass = $this->request->post('password');
        $email = $this->request->post('email');
        $name = $this->request->post('name');
       
        /* @var $user \Entity\UserEntity */
        try {
            $this->userRepo->search($username);
            $user = new \Entity\UserEntity($username, $pass, $email, $name, 0);

            $user->hashPassword();

            $this->userRepo->save($user);
            header('Location: http://localhost/newWork4/index.php');
        } catch (\Exception $ex) {
            echo $ex->getMessage();
            header('Refresh: 3; URL=http://localhost/newWork4/index.php');
        }
    }

}
