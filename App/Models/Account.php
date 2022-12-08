<?php

enum Type{
    case Business;
    case Individual;
}

class Accounts{
    private string $account_number;
    private int $amount;
    private Type $type;
    
    
}