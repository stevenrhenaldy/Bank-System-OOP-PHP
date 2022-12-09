<?php
namespace Models;

class Bank{
    private $users;
    private string $name;
    
    public function __construct(string $bankName){
        $this->name = $bankName;
        $users = array();
    }

    public function addUser(User $user){
        array_push($this->users,$user);
    }

    public function getAllUsers(){
        return $this->users;
    }

    public function getUser($id){
        if(!is_null($id)){
            return $this->users[$id];
        }
    }

    public function searchUser(?string $username = null, ?Authorization $authorization = null, ?string $email = null){
        // fulltext search
        $result = array();
        foreach ($this->users as $u) {
            if(!is_null($username)){
                if ($u->getusername() !== $username) {
                    continue;
                }
            }
            if(!is_null($authorization)){
                if ($u->getAuthorization() !== $authorization) {
                    continue;
                }
            }
            if(!is_null($email)){
                if ($u->getEmail() !== $email) {
                    continue;
                }
            }
            array_push($result, $u);
        }

        return $result;
    }

}