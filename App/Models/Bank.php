<?php
namespace App\Models;

class Bank{
    private $users;
    private string $name;
    
    public function __construct(string $bankName){
        $this->name = $bankName;
        $users = array();
    }

    public function getBankName(): string{
        return $this->name;
    }

    public function addUser(User $user): void{
        array_push($this->users,$user);
    }

    public function getAllUsers(): array{
        return $this->users;
    }

    public function getUser($id): User|null{
        return $this->users[$id];
    }

    public function searchUser(?string $username = null, ?Authorization $authorization = null, ?string $email = null): array|null{
        // Fulltext search
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