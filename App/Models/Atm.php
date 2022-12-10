<?php
namespace App\Models;

use Exception;

class Atm{
    private int $atm_id;
    private string $location;
    private int $atm_balance;
    public function __construct(int $atm_id, string $location, int $initial_balance){
        $this->atm_id = $atm_id;
        $this->location = $location;
        $this->atm_balance = $initial_balance;
    }

    public function withdraw(Card $card, string $pin, int $amount): void {
        if(!$card->authenticatePIN($pin)){
            throw new Exception("Wrong PIN!");
        }
        
        if($this->atm_balance < $amount){
            throw new Exception("Insufficient ATM balance to withdraw");
        }

        $card->account->withdraw();

    }
    public function deposit(Card $card, string $pin, int $amount): void {

    }
    public function transfer(Card $card, string $pin, $amount): void {

    }
}