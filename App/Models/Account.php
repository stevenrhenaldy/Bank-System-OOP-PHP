<?php
namespace Models;

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
    
    public function __construct(string $account_number){
        $this->transactions = array();
        $this->account_number = $account_number;
    }

    public function getAccountNumber(): string {
        return $this->account_number;
    }

    public function setCard(Card $card){
        $this->card = $card;
    }

    public function getCard(){
        return $this->card;
    }

    public function getBalance(): int {
        return $this->balance;
    }

    public function setType(AccountType $type){
        $this->type = $type;
    }

    public function getType(): AccountType {
        return $this->type;
    }

    public function withdraw(int $amount): void{
        // Check for insufficient balance
        if($this->balance <= $amount)
            throw new Exception("Insufficient Balance");
        
        $newTransaction = new Withdraw($amount);
        $this->balance -= $amount;
        array_push($this->transactions, $newTransaction);
    }

    public function pay(Account $toAccount, int $amount, string $invoice): void{
        // Check for insufficient balance
        if($this->balance <= $amount)
            throw new Exception("Insufficient Balance");
        
        $fromAccount = $this;
        $newTransaction = new Payment($amount, $fromAccount, $toAccount, $invoice);
        $this->balance -= $amount;
        array_push($this->transactions, $newTransaction);
    }

    public function transfer(Account $toAccount, int $amount, $note): void{
        // Check for insufficient balance
        if($this->balance <= $amount)
            throw new Exception("Insufficient Balance");
        
        $fromAccount = $this;
        $newTransaction = new Transfer($amount, $fromAccount, $toAccount, $note);
        $this->balance -= $amount;
        array_push($this->transactions, $newTransaction);
    }

    public function deposit(int $amount): void{
        $newTransaction = new Deposit($amount);
        $this->balance += $amount;
        array_push($this->transactions, $newTransaction);
    }

}