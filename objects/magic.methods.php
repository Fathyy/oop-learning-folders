 <?php
 class BankAccount
 {
    private $accountNumber;
    private $balance;

    public function __construct($accountNumber, $balance)
    {
        $this->accountNumber = $accountNumber;
        $this->balance = $balance;   
    }
 }

 $account = new BankAccount('2332332', 100);
 echo $account;


 class BankAccount
 {
    private $accountNumber;
    private $balance;

    public function __construct($accountNumber, $balance)
    {
        $this->accountNumber = $accountNumber;
        $this->balance = $balance;   
    }

    //we implement a to string() that returns 
    //string implementation of the bankaccount object

    public function __toString()
    {
        return "Bank Account: $this->accountNumber. Balance:$this->balance";
    }
 }

 //the __callStatic() magic method is called 
 //when an inaccessible method is invoked

 class Str
 {
    private static $methods = [
        'upper' => 'strtoupper',
        'lower' => 'strtolower',
        'len' => 'strlen',
    ];

    public static function __callStatic(string $method, array $parameters)
    {
        if(!array_key_exists($method, self::$methods))
        {
            throw new Exception('The' . $method . 'is not supported');   
        }

        return call_user_func_array(self::$methods[$method], $parameters);

    }
 }

 echo Str::lower('Hello') . '<br>';
 echo Str::upper('Hello') . '<br>';
 echo Str::len('Hello') . '<br>';


 // __invoke magic method below. This function is 
 //called when you use an object as a function
 // basically php will call the __invoke() when 
 //you use the object as a function

 class MyClass 
 {
    public function __invoke(...$arguments)
    {
        echo 'Called to the invoke method';
    }
 }

 $instance = new MyClass;
 $instance();

 //Below is an example to to show how to use the 
 // __invoke method 

 class Comparator
 {
    private $key;

    public function __construct(string $key)
    {
        $this->key = $key;
    }

    public function __invoke($a, $b)
    {
        return $a[$this->key] <=> $b[$this->key];
    }
 }

 $customers = [
    ['id' => 1, 'name' => 'John', 'credit' =>200],
    ['id' => 2, 'name' => 'Alice', 'credit' =>400],
    ['id' => 3, 'name' => 'Bob', 'credit' =>340],

 ];

 //below is how to sort the customers by name
//the 2nd parameter of the usort function is a callable 
//that determines the sort order
 usort($customers, new Comparator('name'));
 print_r($customers);

 //sorting the customers by credit
 usort($customers, new Comparator('credit'));
 print_r($customers);