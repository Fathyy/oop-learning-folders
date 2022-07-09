<?php
class BankAccount
{
    private $balance;

    public function getBalance()
    {
        return $this->balance;
    }

    public function deposit($amount)
    {
        if($amount > 0)
        {
            $this->balance += $amount;
        }

        return $this;
    }
}

class SavingsAccount extends BankAccount
{
    private $interestRate;

    public function setInterestRate($interestRate)
    {
        $this->interestRate = $interestRate;
    }

    public function addInterest()
    {
        // claculate interest
        $interest = $this->interestRate * $this->getBalance();
        //deposit interest to the balance
        $this->deposit($interest);
    }


}

$account = new SavingsAccount();
$account->deposit(100);
echo $account->getBalance();

// How to call the parent constructor

class BankAccount
{
    private $balance;

    public function __construct($balance)
    {
        $this->balance = $balance;
    }

    public function getBalance()
    {
        return $this->balance;
    }

    public function deposit($amount)
    {
        if($amount > 0)
        {
            $this->balance += $amount;
        }
        return $this;
    }
}

class SavingsAccount extends BankAccount
{
    private $interestRate;

    public function __construct($balance, $interestRate)
    {
        parent::__construct($balance);
        $this->interestRate = $interestRate;
    }

    public function setInterestRate($interestRate)
    {
        $this->interestRate = $interestRate;
    }

    public function addInterest()
    {
        $interest = $this->interestRate = $interestRate * $this->getBalance();
        $this->deposit($interest);
    }

}

$account = new SavingsAccount(100, 0.05);
$account->addInterest();
echo $account->getBalance();
