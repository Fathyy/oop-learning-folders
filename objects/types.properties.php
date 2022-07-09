<?php
class BankAccount
{
    public float $balance = 0;

    public function __construct(float $balance)
    {
        $this->balance = $balance;
    }
}

$account = new BankAccount(100);
var_dump($account->balance);

//below are examples of readonly properties in php

class User 
{
    public readonly string $username;

    public function __construct()
    {
        $this->username = $username;
    }

    public function setUsername(string $username)
    {
        $this->username = $username;
    }
}

$user = new User('joe');
$user = setUsername('janine');

// Aproperty without a type has a default value of none
class User
{
    public $username;
}
$user = new User();
var_dump($user->username);

// a readonly property doesn't ensure the immutability of objects
// lets see in the example below

class UserProfile
{
    public function __construct(private string $name, private string $phone)
    {


    }

    public function changePhone(string $phone)
    {
        $this->phone = $phone;
    }
}

class User
{
    private readonly string $username;
    private readonly string $profile;

    public function __construct(string $username)
    {
        $this->username = $username;
    }

    public function setProfile(UserProfile $profile)
    {
        $this->profile = $profile;
    }

    public function profile(): UserProfile
    {
        return $this->profile;
    }
}

$user = new User('joe');
$user->setProfile(new UserProfile('John Doe', '0735535353'));