<?php

namespace Repository;
use Helper\Myex;
use Repository\Interface_repository as Interface_repository;
use Entity\UserEntity as User;

class UserRepository implements Interface_repository
{

    private $content;
  
    private $file;

    function __construct($file)
    {
       
        $this->file = $file;
        $this->content = $this->loadUserInfo($this->file);
    }

    public function load($id)
    {
        foreach ($this->content as $user) {
            if ($user->userName() == $id) {
                return $user;
            }
        }
        throw new Myex("User dont exist");
         
    }

    public function loadAll()
    {
        return $this->content;
    }

    public function save($entity)
    {
        /* @var $user \Entity\User */
         $contents = file_get_contents($this->file);
       
        $contentsArray = json_decode($contents, true);
        $contentsArray[]=$entity->transformObjectToArray();
 
         $users = [];
         $users[]=file_put_contents($this->file, json_encode($contentsArray));

    }

    
    
    private function loadJSONContent()
    {
        
        $fileContent = file_get_contents($this->file);
        $decodedContent = json_decode($fileContent);
        return $decodedContent;
    }

    private function loadUserInfo()
    {
        $users = [];
        $jsonContent = $this->loadJSONContent($this->file);
//       var_dump($jsonContent);
        foreach ($jsonContent as $userInfo) {
            $users[] = new User($userInfo->username, $userInfo->password, $userInfo->name, $userInfo->email, $userInfo->role);
        }
        return $users;
      
    }

    
    
    public function search($id)
    {

        $jsonContent = $this->loadJSONContent($this->file);
       
        
        
        foreach ($jsonContent as $data) {
            foreach ($data as $key => $value) {
                 if($key === 'username' and $value === $id)
                {
                     
                   throw new Myex("User  exist in database");

            }
            
        }
//            $key = array_search('green', $array);
        }
       
        return false;
    }
}

