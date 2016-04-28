<?php

namespace Entity;

class UserEntity
{

    private $username;
    private $password;
    private $email;
    private $name;
    private $role;


    public function __construct($username,$password ,$email , $name, $role = false)
    {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;

        $this->name = $name;

        $this->role = $role;
    }

    public function hashPassword()
    {
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);  
    }
    
    public function userName()
    {
        return $this->username;
    }

    public function transformObjectToArray()
    {
        return array(
            "username" => $this->username,
            "password" => $this->password,
            "email" => $this->email,
            "name" => $this->name,
            "role" => $this->role
           
           
        );
    }

    public function verifyPass($value)
    {
        return password_verify($value, $this->password);
        
//        return $pass == $this->password_;
    }


    public function password()
    {
       
        return $this->password;
    }

    public function name()
    {
        return $this->name;
    }

    public function email()
    {
        return $this->email;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function isAdmin(){
        if ($this->role==1) {
            return true;
        }
        return false;
        
    }
    
    
    public function search()
    {
        return $this->search;
    }

}
