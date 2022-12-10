<?php
namespace Models;

class Card{
    private string $card_number;
    private int $expiry_date;      //Timestamp
    private string $cvv;

    public function setCardNumber(string $card_number): void {
        $this->card_number = $card_number;
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

    public function getExpiryYear(): int {
        return $this->expiry_year;
    }

    public function getCVV(): string {
        return $this->cvv;
    }

    public function authenticateCVV(string $cvv): bool {
        if($this->cvv == $cvv){
            return true;
        }
        return false;
    }
}