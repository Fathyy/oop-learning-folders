<?php

trait Logger
{
    public function log($msg)
    {
        echo '<pre>';
		echo date('Y-m-d h:i:s') . ':' . '(' . __CLASS__ . ') ' . $msg . '<br/>';
		echo '</pre>';
    }
}

class BankAccount 
{
    use Logger;

    private $accountNumber;

    public function __construct($accountNumber)
    {
        $this->accountNumber = $accountNumber;
        $this->log("A new $accountNumber bank account created");
    }
}

class User
{
    use Logger;

    public function __construct()
    {
        $this->log("A new user is created!");
    }
}

//A class can also use multiple traits 

trait Preprocessor
{
    public function preprocess()
    {
        echo "proprocess done" . '<br/>';
    }

}

trait Compiler
{
    public function compile()
    {
        echo "Compiling code done" . '<br/>';
    }
}

trait Assembler
{
    public function createObjCode()
    {
        echo "creating the object code" . '<br/>';
    }
}

trait Linker
{
    public function createExec()
    {
        echo "creating the executable file done" . '<br/>';
    }
}

class IDE
{
    use Preprocessor, Compiler, Assembler, Linker;

    public function run()
    {
        $this->preprocess();
        $this->compile();
        $this->createObjCode();
        $this->createExec();

        echo "Execute the file done" . '<br/>';
    }
}

$ide = new IDE();
$ide->run();