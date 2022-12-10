<?php
namespace Models;

class Payment extends Transaction{
    private string $invoice;
    private Account $from_account;
    private Account $to_account;

    public function __construct(int $amount,Account $fromAccount, Account $toAccount, string $invoice){
        $this->amount = $amount;
        $this->invoice = $invoice;
        $this->from_account = $fromAccount;
        $this->to_account = $toAccount;
        parent::__construct(TransactionType::Send);
    }

    public function getFromAccount(): Account {
        return $this->from_account;
    }

    public function getToAccount(): Account{
        return $this->to_account;
    }

    public function getInvoice(): string {
        return $this->getInvoice;
    }

    public function getNote(): string{
        return "Payment to Invoice: {$this->invoice}";
    }

}