<?php
namespace Models;

class Transfer extends Transaction{
    private string $note;
    private Account $to_account;

    public function __construct(int $amount, Account $toAccount, string $note){
        $this->amount = $amount;
        $this->note = $note;
        $this->to_account = $toAccount;
        parent::__construct(TransactionType::Send);
    }

    public function getAmount(){
        return $this->amount;
    }

    public function getToAccount(){
        return $this->to_account;
    }

    public function getNote(): string{
        return $this->note;
    }
}