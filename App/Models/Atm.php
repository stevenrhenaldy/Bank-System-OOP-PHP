<?php
namespace App\Models;

use Exception;

class Atm{
    private string $location;
    private int $atm_balance;
    public function __construct(string $location, int $initial_balance){
        $this->location = $location;
        $this->atm_balance = $initial_balance;
    }

    public function getLocation(){
        return $this->location;
    }

    public function withdraw(Card $card, string $pin, int $amount): void {
        if(!$card->authenticatePIN($pin)){
            throw new Exception("Wrong PIN!");
        }
        
        if($this->atm_balance < $amount){
            throw new Exception("Insufficient ATM balance to withdraw");
        }

        try{
            $card->getAccount()->withdraw($amount);
        }catch(Exception $e){
            throw $e;
        }

        $this->atm_balance -= $amount;
    }

    public function deposit(Card $card, string $pin, int $amount): void {
        if(!$card->authenticatePIN($pin)){
            throw new Exception("Wrong PIN!");
        }

        try{
            $card->getAccount()->deposit($amount);
        }catch(Exception $e){
            throw $e;
        }

        $this->atm_balance += $amount;
    }

    public function transfer(Card $card, string $pin, $amount, $to_account, $note): void {
        if(!$card->authenticatePIN($pin)){
            throw new Exception("Wrong PIN!");
        }

        try{
            $card->getAccount()->transfer($to_account, $amount, $note);
        }catch(Exception $e){
            throw $e;
        }

    }
}