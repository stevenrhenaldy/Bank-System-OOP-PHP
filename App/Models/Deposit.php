<?php
namespace App\Models;

class Deposit extends Transaction{

    public function __construct(int $amount){
        $this->amount = $amount;
        parent::__construct(TransactionType::Receive);
    }

    public function getNote(): string{
        return "Deposit: Nt$".$this->amount;
    }
}