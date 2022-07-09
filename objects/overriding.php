<?php
class BankAccount
{
    private $balance;

    public function __construct($amount)
    {
        $this->balance = $amount;
    }

    public function getBalance()
    {
        return $this->balance = $amount;
    }

    public function deposit($amount)
    {
        if ($amount > 0) {
            $this->balance += $amount;
        }
        return $this;

    } 

    public function withdraw($amount)
    {
        if($amount > 0 && $amount <= $this->balance)
        {
            $this->balance -= $amount;
            return true;
        }
        return false;

    }
}

class checkingAccount extends BankAccount
{
    private $minBalance;

    public function __construct($amount, $minBalance)
    {
        if($amount > 0 && $amount >=$minBalance)
        {
            parent::__construct($amount);
            $this->minBalance = $minBalance;
        }
        else{
            throw new InvalidArgumentException('Amount must be more than zero and higher than minimum balance');
        }


    }

    public function withdraw($amount)
    {
        $canWithdraw = $amount > 0 && $this->getBalance() - $amount > $this->minBalance;

        if($canWithdraw)
        {
            parent::withdraw($amount);
            return true;
        }
        return false;
        
    }
}