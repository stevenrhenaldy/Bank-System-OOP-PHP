<?php
namespace App\Models;

enum Division{
    case General_Manager;
    case Service_Center;
}

class Staff extends User{
    private Division $division;
    private string $extention;

    public function setDivision(Division $division): void {
        $this->division = $division;
    }

    public function getDivision(): Division {
        return $this->division;
    }

    public function setExtention(string $extention): void {
        $this->extention = $extention;
    }

    public function getExtention(): string {
        return $this->extention;
    }
}