<?php

class BankAccount{
    public $accountNumber;
    public $balance;

    public function deposit($amount){
        if($amount > 0){
            $this->balance += $amount;
        }

    }

    public function withdraw($amount){
        if ($amount <= $this->balance) {
            $this->balance -= $amount;
            return true;
        }
        return false;
    }
}

$account = new BankAccount();

$account->accountNumber = 1;
$account->balance = 100;

// We are going to see how to use the $this keyword below
//chaining methods
$account->deposit(100)
         ->deposit(200) 
         ->deposit(400);

//how to use constructors examples are shown below

class ClassName{
    function __construct(){
        //implementations
    }
}

class BankAccount{
    private $accountNumber;
    private $balance;

    public function __construct($accountNumber, $balance){
        $this->accountNumber = $accountNumber;
        $this->balance = $balance;
    }
}

//constructor promotion
class BankAccount
{
    function __construct(private $accountNumber, private $balance)
    {

    }

}

// we are learning the destructor now

class File
{
    private $handle;
    private $filename;

    public function __construct($filename, $mode = 'r')
    {
        $this->filename = $filename;
        $this->handle = fopen($filename, $mode);
    }

    public function __destruct()
    {
        //close the file handle
        if($this->handle)
        {
            fclose($this->handle);
        }
    }

    public function read()
    {
        //read the file contents
        return fread($this->handle, filesize($this->filename));
    }
}

echo $f->read();

// typed properties 



