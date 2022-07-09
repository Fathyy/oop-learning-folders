<?php
// You can use abstract classes or interfaces to implement 
//polymorphism in PHP

abstract class Person
{
    abstract public function greet();
}

class English extends Person
{
    public function greet()
    {
        return "hello!";
    }
}

class German extends Person
{
    public function greet()
    {
        return "hallo!";
    }
}

class French extends Person
{
    public function greet()
    {
        return "Bonjour!";
    }
}

function greeting($people)
{
    foreach($people as $person){
        echo $person->greet() . '<br>';
    }
}

$people =[
    new English(),
    new German(),
    new French(),
];

greeting($people);

///Below is an example of polymorphism using an interface

interface greeting
{
    public function greet();
}

class English implements Person
{
    public function greet()
    {
        return "hello!";
    }
}

class German implements Person
{
    public function greet()
    {
        return "hallo!";
    }
}

class French implements Person
{
    public function greet()
    {
        return "Bonjour!";
    }
}



