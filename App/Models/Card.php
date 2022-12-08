<?php
namespace Models;

// No need to state inside the ppt this class :)
// I added this class as PHP don't have date datatype built in
class MonthYear{
    private int $month;
    private int $year;
}
// ********************************************

class Card{
    private string $card_number;
    private int $expiry_year;
    private MonthYear $month_year;
    private int $cvv;

    public function setCardNumber($cardNumber): void{
        
    }
}