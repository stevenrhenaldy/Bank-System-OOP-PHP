<?php
namespace Models;

class Transfer extends Transaction{
    private string $note;
    private Account $from_account;
    private Account $to_account;

    public function __construct(int $amount, Account $fromAccount, Account $toAccount, string $note){
        $this->amount = $amount;
        $this->note = $note;
        $this->from_account = $fromAccount;
        $this->to_account = $toAccount;
        parent::__construct(TransactionType::Send);
    }

    public function getFromAccount(): Account{
        return $this->from_account;
    }

    public function getToAccount(): Account{
        return $this->to_account;
    }

    public function getNote(): string{
        return $this->note;
    }
}