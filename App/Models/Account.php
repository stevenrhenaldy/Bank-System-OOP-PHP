<?php
namespace Models;

use Exception;

enum AccountType{
    case Business;
    case Individual;
}

class Accounts {
    private string $account_number;
    private int $balance;
    private AccountType $type;
    private Card $card;
    private $transactions = array();
    
    public function __construct(string $account_number){
        $this->cards = array();
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
        // Check if enough balance
        if($this->balance <= $amount)
            throw new Exception("Insufficient Balance");
        
        $newTransaction = new Withdraw($amount);
        $this->balance -= $amount;
        array_push($this->transactions, $newTransaction);
    }


}