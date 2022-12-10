<?php
namespace App\Models;
use Exception;

enum AccountType{
    case Business;
    case Individual;
}

class Account {
    private string $account_number;
    private int $balance;
    private AccountType $type;
    private Card $card;
    private $transactions;
    
    public function __construct(string $account_number, AccountType $type){
        $this->transactions = array();
        $this->balance = 0;
        $this->type = $type;
        $this->account_number = $account_number;
    }

    public function getAccountNumber(): string {
        return $this->account_number;
    }

    public function setCard(Card $card): void {
        $this->card = $card;
    }

    public function getCard(): Card {
        return $this->card;
    }

    public function getBalance(): int {
        return $this->balance;
    }

    public function setType(AccountType $type): void {
        $this->type = $type;
    }

    public function getType(): AccountType {
        return $this->type;
    }

    public function withdraw(int $amount): void {
        // Check for insufficient balance
        if($this->balance <= $amount)
            throw new Exception("Insufficient Balance");
        
        $newTransaction = new Withdraw($amount);
        $this->balance -= $amount;
        array_push($this->transactions, $newTransaction);
    }

    public function pay(Account $to_account, int $amount, string $invoice): void {
        // Check for insufficient balance
        if($this->balance <= $amount)
            throw new Exception("Insufficient Balance");
        
        $from_account = $this;
        $newTransaction = new Payment($amount, $from_account, $to_account, $invoice, TransactionType::Send);
        // Let the other end to receive the payment
        $to_account->receivePayment($from_account, $amount, $invoice);
        $this->balance -= $amount;
        array_push($this->transactions, $newTransaction);
    }

    public function transfer(Account $to_account, int $amount, $note): void {
        // Check for insufficient balance
        if($this->balance <= $amount)
            throw new Exception("Insufficient Balance");
        
        $from_account = $this;
        $newTransaction = new Transfer($amount, $from_account, $to_account, $note, TransactionType::Send);
        // Let the other end to receive the transfer
        $to_account->receiveTransfer($from_account, $amount, $note);
        $this->balance -= $amount;
        array_push($this->transactions, $newTransaction);
    }

    public function deposit(int $amount): void {
        $newTransaction = new Deposit($amount);
        $this->balance += $amount;
        array_push($this->transactions, $newTransaction);
    }

    // Internal Methods
    private function receivePayment(Account $from_account, int $amount, string $invoice): void {
        $to_account = $this;
        $newTransaction = new Payment($amount, $from_account, $to_account, $invoice, TransactionType::Receive);
        $this->balance += $amount;
        array_push($this->transactions, $newTransaction);
    }

    private function receiveTransfer(Account $from_account, int $amount, $note): void {
        $to_account = $this;
        $newTransaction = new Transfer($amount, $from_account, $to_account, $note, TransactionType::Receive);
        $this->balance += $amount;
        array_push($this->transactions, $newTransaction);
    }

}