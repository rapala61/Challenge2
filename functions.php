<?php 

  /**
  * class HappyNumberChallenge
  * 
  * This class its used by the programming challenge "Happy Number". It accepts the input, processes it by separating its values into an array, looping through each value
  * and assesing if it is considered a happy number or not. It then packages only those who are happy into an array an returns it to the object calling it.
  * 
  * Methods in class:
  * 							
  *  happyNumbersArray 
  *  splitAndRaise
  *  isHappy
  * 
  * @author Rafael pacas
  *
  */
class HappyNumberChallenge{
	
	
	/**
	 * function happyNUmbersArray
	 * 
	 * This function receives the input from the user and calls on the internal class methods to processes the array and return an array of happy numbers.
	 * 
	 * @param array $array This is array is formed from the input by the user.
	 * @return array $happyArray THis array contains the happy numbers. 
	 */
	public function happyNumbersArray($array){
		
		$commaPattern = "/[\s]*[,][\s]*/";
		$unknownNumbers = array();
		$happyArray = array();
		
		if (preg_match($commaPattern, $array)){
				
				$unknownNumbers = preg_split($commaPattern, $array);
	
			}else{
				
				$unknownNumbers = array($array);
			}
			
		$numbersCount = count($unknownNumbers);
		
		
		for ($i=0; $i < $numbersCount ; $i++) { 
			$isHappy = $this->isHappy($unknownNumbers[$i]);
			if($isHappy){
				$happyArray[] = $unknownNumbers[$i];
			}
			
			
		}
		
		return $happyArray;
		
	}
	

	
/**
 * function splitAndRaise
 * 
 * Used to split any two-digit+ number into single numbers to then be raised to its 2 power and added together to create a newNumber. 
 * Or to raise a single digit number to the power of 2, split the number, raise the split numbers and then add them to get the newNumber.
 * 
 * @param int $number This is the number to be split and raised to the power of 2.
 * @return array $happyArray This array contains the happy numbers. 
 */	
	public function splitAndRaise($number){
	$newNumber;
	$numberLenght = strlen($number);
	
	
		
	if($numberLenght > 1){
		$splitNumber = array();
		$splitNumber = str_split($number, 1);
		$SplitNumberCount = count($splitNumber);
		
		for ($i=0; $i < $SplitNumberCount; $i++) { 
			$newNumber += $splitNumber[$i] * $splitNumber[$i];
		}
		
		
	}else{
		$raised = $number * $number;
		$splitNumber = array();
		$splitNumber = str_split($raised, 1);
		$SplitNumberCount = count($splitNumber);
		
		for ($i=0; $i < $SplitNumberCount; $i++) { 
			$newNumber += $splitNumber[$i] * $splitNumber[$i];
		}
		
	}
		unset($splitNumber);
		return $newNumber;
		
	}
	
/**
 * function isHappy
 * 
 * Used to loop a number through the splitAndRaise method until it determines if the number and which numbers is/are happy. 
 * 
 * 
 * @param int $num This is the number to be looped through.
 * @return bool $isHappy returns TRUE if value is determined to be a happy number or FALSE otherwise. 
 */		
	public function isHappy($num){
		$value;
		$checkLoop = array();
		$isHappy;
		
		if(empty($value)){
			$value = $this->splitAndRaise($num);		
		}
		
		do {
			$value = $this->splitAndRaise($value);
			array_push($checkLoop, $value);
			$counter = count($checkLoop);
			
		} while ($value != 1 && $counter <= 30);
		
		if($value == 1){
			$isHappy = TRUE;
		}else{
			$isHappy = FALSE;
		}
		
		return $isHappy;
		
		
	}
	
	
}
