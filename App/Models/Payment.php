<?php
namespace Models;

class Payment extends Transaction{
    private string $invoice;

    public function __construct(int $amount, Account $toAccount, string $invoice, string $note){
        $this->amount = $amount;
        $this->invoice = $invoice;
        $this->to_account = $toAccount;
        $this->note = $note;
        parent::__construct(TransactionType::Send);
    }

    public function getInvoice(){
        return $this->getInvoice;
    }

    public function getNote(): string{
        return "Payment to Invoice: {$this->invoice}";
    }

}