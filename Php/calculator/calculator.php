<?php

class Calculator{
    function addition($number){
        $this->operation = __METHOD__;
        $this->result += $number;
    }
    function multiplication($number){
        
    }
    function division($number){
       
    }
    function substraction($number){
      
    }
    function get($number){

    }
    function set($number){

    }
    function reset($number){
        $this->result = 0;
    }
}

try{
	$calc = new Calculator(false);
	$calc->set(10);
	// doit renvoyer une exception
	//$calc->set("aaa");
	$calc->addition(50);
	$calc->multiplication(20);
	$calc->division(20);
	$calc->substraction(20);
	$result = $calc->get();
	$calc->reset();
	$logger = new Logger(true);
	$logger->info("Result: $result");
}

catch (Exception $e){
	$logger = new Logger(true);
	$logger->debug($e->getMessage());
}

?>