<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UnitTest extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('unit_test');
	}

	public function _calculateRemainder($number,$param)
    {
        return $number % $param;
    }

    public function _addRemainders($number3,$number5)
    {
        return $number3 + $number5;
    }

	public function calculationForUnitTest($number)
	{
        $output = new Output();
        $output -> originalNumber = $number;
        $output -> mod3Reminder  = $this->_calculateRemainder($number, 3);
        $output -> mod5Reminder  = $this->_calculateRemainder($number, 5);
        $output -> mod35Reminder = $this->_addRemainders($output->mod3Reminder, $output->mod5Reminder);
        $printResult = new PrintResultUnit();
        return $printResult->displayOutputUnit($output);
    }
	
    public function testMultipleOf3()
    {
        $test = $this->calculationForUnitTest(3);
        $expected_result = "Linio";
        $test_name = "Multiple of 3";
        echo $this->unit->run($test, $expected_result, $test_name);
    }

    public function testMultipleOf5()
	{
		$test = $this->calculationForUnitTest(5);
		$expected_result = "IT";
		$test_name = "Multiple of 5";
		echo $this->unit->run($test, $expected_result, $test_name);
	}

    public function testMultipleOf35()
    {
        $test = $this->calculationForUnitTest(15);
        $expected_result = "Linianos";
        $test_name = "Multiple of 3 and 5";
        echo $this->unit->run($test, $expected_result, $test_name);
    }

    public function testNotMultipleOf35()
    {
        $test = $this->calculationForUnitTest(46);
        $expected_result = 46;
        $test_name = "Not Multiple of 3 or 5";
        echo $this->unit->run($test, $expected_result, $test_name);
    }
}

class Output
{
    public $mod3Reminder;
    public $mod5Reminder;
    public $mod35Reminder;
    public $originalNumber;
}

class PrintResultUnit
{
    function displayOutputUnit($output)
    {
        if($output->mod35Reminder == 0)
        {
            return "Linianos";
        }else if($output->mod5Reminder == 0)
        {
            return "IT";
        }else if($output->mod3Reminder == 0)
        {
            return "Linio";
        }else
        {
            return $output->originalNumber;
        }
    }
}