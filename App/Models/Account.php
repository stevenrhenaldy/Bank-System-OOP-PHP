<?php
namespace Models;

enum Type{
    case Business;
    case Individual;
}

class Accounts{
    private string $account_number;
    private int $amount;
    private Type $type;
    private Card $cards;
    
    public function __construct(){
        $this->cards = array();
    }
    
    public function setAccountNumber($account_number){
        $this->account_number = $account_number;
    }

    public function setAmount($amount){
        $this->amount = $amount;
    }

    public function setType($type){
        $this->type = $type;
    }
}