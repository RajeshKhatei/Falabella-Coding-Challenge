<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main1 extends CI_Controller 
{

	public function index()
	{
		for($i = 1; $i <= 100; $i++)
        {
            $output = new Output();
            $output -> originalNumber = $i;
            $output -> mod3Reminder  = $this->_calculateRemainder($i, 3);
            $output -> mod5Reminder  = $this->_calculateRemainder($i, 5);
            $output -> mod15Reminder = $this->_calculateRemainder($i, 15);
            $printResult = new PrintResult();
            $printResult->displayOutput($output);
        }
	}

	public function _calculateRemainder($number,$param)
    {
        return $number % $param;

    }
}

class Output
{
    public $mod3Reminder;
    public $mod5Reminder;
    public $mod15Reminder;
    public $number;
}

class PrintResult
{
    function displayOutput($output) : void
    {
        switch ($output) 
        {
            case ($output->mod15Reminder == 0):
                echo "Linianos"."<br/>";
                break;
            case ($output->mod5Reminder == 0):
                echo "IT"."<br/>";
                break;
        	case ($output->mod3Reminder == 0):
                echo "Linio"."<br/>";
                break;
            
            default:
                echo $output->originalNumber."<br/>";
        }
    }
}