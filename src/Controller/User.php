<?php

namespace Controller;
class user {
    
   public function __construct(\Helper\Request $req)
    {
        $this->userRepo = new \Repository\UserRepository(USERS_PATH);
        $this->request = $req;
    }
    
public function start($username){
    
    $_SESSION['Login']= $username;
       
}    
    
    
   

    
    
    
    
 public function addUser(){
     
     
 }
 
 public function removeUser(){
     
     
 }
 

 
}
