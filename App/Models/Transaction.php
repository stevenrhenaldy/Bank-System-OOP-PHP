<?php
namespace Models;

enum TransactionType{
    case Send;
    case Receive;
}

abstract class Transaction{
    private TransactionType $type;
    private int $amount;
    private int $timestamp;

    public function __construct(TransactionType $type){
        $this->timestamp = time();
        $this->type = $type;
    }

    public abstract function getNote(): string;

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
    public function getTimestamp(){
        return $this->timestamp;
    }

}