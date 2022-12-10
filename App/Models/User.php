<?php
namespace Models;

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

    public function setUsername(string $username): void {
        $this->$username = $username;
    }
    
    public function setPassword(string $password) : void {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $this->$password = $hashed_password;
    }
    
    public function setName(string $name): void {
        $this->name = $name;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }
    
    public function setAuthorization(Authorization $authorization): void {
        $this->authorization = $authorization;
    }
    
    public function getUsername(): string {
        return $this->username;
    }
    
    public function getAuthorization(): Authorization {
        return $this->authorization;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getEmail(): string {
        return $this->email;
    }
    
    public function authenticate(string $password): bool {
        if($password == $this->password){
            return true;
        }
        return false;
    }
}