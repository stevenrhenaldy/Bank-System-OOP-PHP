<?php
namespace Models;

enum Division{
    case General_Manager;
    case Service_Center;
}

class Staff extends User{
    private Division $division;
    private string $extention;

    public function setDivision(Division $division){
        $this->division = $division;
    }

    public function getDivision(){
        return $this->division;
    }

    public function setExtention(string $extention){
        $this->extention = $extention;
    }

    public function getExtention(){
        return $this->extention;
    }
}