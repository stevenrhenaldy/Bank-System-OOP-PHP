<?php
namespace Models;

enum Type{
    case Business;
    case Individual;
}

enum Authorization{
    case Staff;
    case User;
}

class User{
    private string $username;
    private string $password;
    private string $name;
    private string $email;
    private Authorization $authorization;

    public function setUsername(string $username){
        $this->$username = $username;
    }
    
    public function setPassword(string $password){
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $this->$password = $hashed_password;
    }
    
    public function setName(string $name){
        $this->name = $name;
    }

    public function setEmail(string $email){
        $this->email = $email;
    }
    
    public function setAuthorization(Authorization $authorization){
        $this->authorization = $authorization;
    }
    
    public function getUsername(){
        return $this->username;
    }
    
    public function getAuthorization(){
        return $this->authorization;
    }

    public function getName(){
        return $this->name;
    }

    public function getEmail(){
        return $this->email;
    }
    
    public function authenticate(string $password){
        if($password == $this->password){
            return true;
        }
        return false;
    }
}