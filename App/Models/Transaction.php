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

    public function setTransactionType(TransactionType $type): void {
        $this->type = $type;
    }
    public function getTransactionType(): TransactionType {
        return $this->type;
    }
    public function setAmount(int $amount): void {
        $this->amount = $amount;
    }
    public function getAmount(): int {
        return $this->amount;
    }
    public function getTimestamp(): int {
        return $this->timestamp;
    }

}