<?php
//copying the object via assignment operator
class Person
{
    public $name;

    public function __construct($name)
    {
        $this->name= $name;
    }
}

//creating an object known as Bob
$bob = new Person('Bob');

$alex = $bob;

$alex->name = 'Alex';
var_dump($bob);
var_dump($alex);

//copying an object using clone keyword
$bob = new Person('Bob');
//cloning an object
$alex = clone $bob;
$alex->name = 'Alex';
//showing both objects
var_dump($bob);
var_dump($alex);


//lets look at shallow cloning
class Address
{
    public $street;
    public $city;
}

class Person
{
    public $name;
    public $address;

    public function __construct($name)
    {
        $this->name = $name;
        $this->address = new Address(); //the address property references another object, so this property will remain a reference after cloning
    }
}
$bob = new Person('Bob');
$bob->address->street = 'North 1st street';
$bob->address->city = 'San Jose';

var_dump($bob);

//The following creates a copy of the bob object and assigns
//it to alex

$alex = clone $bob;
$alex->name = 'Alex';
var_dump($alex);

// this means that both person objects i.e alex and bob
//have the address property that references the same 
//address object. Changing the address object form akex 
//will affect bob

$alex->address->street = '1 Apple Park Way';
$alex->address->city = 'Cupertino';
var_dump($bob);

//Now we wll move to deep copy with the clone method

//copying object via assignment

class Person
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }
}

$bob = new Person('bob');
//assign bob to alex and change the name
$alex = $bob;
$alex->name= 'Alex';

//copying the object using clone keyword
$bob = new Person('bob');
$alex = clone $bob;
$alex->name = 'Alex';

class Address 
{
    public $street;
    public $city;
}

class Person
{
    public $name;
    public $address;

    public function __construct($name)
    {
        $this->name = $name;
        $this->address = new Address();
    }
}
$bob = new Person('Bob');
$bob->address->street = 'North street';
$bob->address->city = 'San Jose';
