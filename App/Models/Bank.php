<?php
namespace Models;

class Bank{
    private User $users;
    private string $name;
    
    public function __construct(string $bankName){
        $this->name = $bankName;
        $users = array();
    }

}