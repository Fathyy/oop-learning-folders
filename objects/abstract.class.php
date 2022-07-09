<?php
abstract class Dumper
{
    abstract public function dump($data);
    
}

class WebDumper extends Dumper
{
    public function dump($data)
    {
        echo '<pre>';
        var_dump($data);
        echo '</pre>';
    }

}

$webDumper = new WebDumper();
$webDumper->dump('PHP abstract class is good');

//Interfaces in php

interface Logger
{
    public function log($message);
}

class FileLogger implements Logger
{
    private $handle;
    private $logFile;

    public function __construct($filename, $mode = 'a')
    {
        $this->logFile = $filename;
        //open log file for append
        $this->handle = fopen($filename, $mode)
        or die('could not open file');
    }

    public function log($message)
    {
        $message = date('F j, Y, g:i a') . ': ' . $message . "\n";
        fwrite($this->handle, $message); 
    }

    public function __destruct()
    {
        if($this->handle){
            fclose($this->handle);
        }
    }

}

class DatabaseLogger implements Logger
{
    public function log($message)
    {
        echo sprintf("Log %s to the database\n", $message);
    }
}

// example 1
$logger = new FileLogger('./log.txt', 'w');
$logger->log('PHP interfae is awesome');

// example 2
$loggers = [
	new FileLogger('./log.txt'),
	new DatabaseLogger()
];

foreach ($loggers as $logger) {
	$logger->log('Log message');
}