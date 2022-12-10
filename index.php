<?php
namespace App;

use App\Models\Account;
use App\Models\AccountType;
use Exception;

$a = new Account("123", AccountType::Individual);
echo $a->getAccountNumber();
echo "<br>";
echo $a->getBalance();
try{
    echo $a->Withdraw(100);
    echo "<br>";
}catch(Exception $e){
    echo $e;
    echo "<br>";
}
echo $a->deposit(100);
echo $a->getBalance();
echo "<br>";