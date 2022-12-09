<?php
namespace Models;

class Payment extends Transaction{
    private int $amount;
    private string $note;

    public function getAmount(){
        return $this->amount;
    }

    public function getNote(){
        return $this->note;
    }

    

}