<?php
namespace App\Models;

class Withdraw extends Transaction{

    public function __construct(int $amount){
        $this->amount = $amount;
        parent::__construct(TransactionType::Send);
    }

    public function getNote(): string {
        return "Withdraw: Nt$".$this->amount;
    }
}