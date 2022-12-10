<?php
namespace App\Models;

use Exception;

class Card{
    private string $card_number;
    private int $expiry_date;      //Timestamp
    private string $pin;
    private string $cvv;
    private Account $account;

    public function __construct(Account $account, string $pin, ){
        $this->account = $account;
        $this->pin = $pin;
        $this->expiry_date = strtotime("+1825 Days");   // 5 years since the card creation
        $this->cvv = rand(100, 999);
    }

    public function getAccount(): Account{
        return $this->account;
    }

    public function setCardNumber(string $card_number): void {
        $this->card_number = $card_number;
    }

    public function getExpiryDate(): int {
        return $this->expiry_date;
    }

    public function setexpiryYear(int $expiry_date): void {
        $this->expiry_year = $expiry_date;
    }

    public function setCVV($cvv): void {
        $this->cvv = $cvv;
    }

    public function getCardNumber(): string {
        return $this->card_number;
    }

    public function setPin(string $pin): void{
        $this->pin = $pin;
    }

    public function authenticatePIN(string $pin){
        if($this->expiry_date < time()){
            throw new Exception("Card Expired");
        }

        if($this->pin == $pin){
            return true;
        }
        return false;
    }

    public function authenticateCVV(string $cvv): bool {
        if($this->expiry_date < time()){
            throw new Exception("Card Expired");
        }

        if($this->cvv == $cvv){
            return true;
        }
        return false;
    }
}