<?php
namespace Models;

enum TransactionType{
    case Send;
    case Receive;
}

abstract class Transaction{
    private TransactionType $type;
    private int $amount;

    public abstract function getNote();

    public function setTransactionType($type){
        $this->type = $type;
    }
    public function getTransactionType(){
        return $this->type;
    }
    public function setAmount($amount){
        $this->amount = $amount;
    }
    public function getAmount(){
        return $this->amount;
    }

}