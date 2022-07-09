<?php
//to serialize an object into a string, you use the 
// serialize() function
class customers
{
    private $id;
    private $name;
    private $email;

    public function __construct(int $id, string $name, string $email)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
    }

    public function getInitial()
    {
        if($this->name !== ''){
            return strtoupper(substr($this->name, 0, 1));
        }
    }

    public function __sleep(): array
    {
        return ['id', 'name'];
    }

    //if you want to use serialize magic method instead
    //it will return an associative array

    public function __serialize(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }
}

$customer = new Customer(10, 'Fathi Abdi', 'fat@gmail.com');
$str = serialize($customer);
var_dump($str);

//Below is a representation of the unserialize function

class Customer
{
    //below is known as constructor promotion and it
    //saves alot time 
    public function __construct(
        private int $id,
        private string $name,
        private string $email
    ) {

    }
    
    public function getInitial()
    {
        if($this->name !== ''){
            return strtoupper(substr($this->name, 0, 1));
        }
    }
   
}

// next we serialize the customer object into a string 
// and save it to the customer.dat file

$customer = new Customer(10, 'gdgg gsgs', 'gg@gmail.com');
$str = serialize($customer);

file_put_contents('customer.dat', $str);

// Next we will unserialize

$str = file_get_contents('customer.dat');
$customer = unserialize($str);
var_dump($customer);

// Another example on how to use the unserialize method

class FileReader
{
    private $filehandle;
    private $filename;

    public function __construct(string $filename)
    {
        $this->filename = $filename;
        $this->open();
    }
}