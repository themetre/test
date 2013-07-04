<?php
class Numeric_Diamonds {

	private $_squareNumber;

	/**
	 * Our construct - takes our square number we want
	 * to convert into a diamond.
	 * 
	 * @param int $squareNumber - Must be a square number!
	 * 
	 */
	public function __construct($squareNumber) {
		$this->_squareNumber = $squareNumber;
	}


	/**
	 * Generates our diamond string
	 * 
	 * @return string
	 */
	public function generateDiamond() {
		$output = "";
		$blank = " ";
		$digits = ceil( log10 ( $this->_squareNumber + 1) );
		$maxdigits = $digits * 2;
		
		$root = intval( $this->squareRoot( $this->_squareNumber ) );
		
		$right = -1 * $root + 1;
		
		for($index = 1; $index < $root * 2; $index++) {
			$left = ($root <= $index) ? $root * 2 - $index : $index;
			
			$right = ($root < $index) ? $right + 1 : $right + $root;
			
			$margin = abs($root - $index) * $digits + $digits;
			$output .= $this->fill($right, $margin, $blank);
			
			for($j = 1; $j < $left; $j++) {
				$current_number = $right - ($root - 1) * $j;
				$output .= $this->fill($current_number, $maxdigits, $blank); // str_replace(" ", $blank, printf($padding, $current_number));
			}
			$output .= $index + 1 < $root * 2? PHP_EOL : "";
		}
		
		return $output;
	}
	
	
	/**
	 * Generates our diamond string
	 * 
	 * @return string
	 */
	private function fill($string, $digits, $spacer = ".") {
		$padding = "";
		$max = $digits - strlen($string);
		for($index = 0; $index < $max; $index++)
			$padding .= $spacer;
		
		return $padding . $string;
	}


	/**
	 * Tests if the number is a square number (e.g. 4,
	 * 9, 16, 25, 36, 49)
	 * 
	 * @return bool
	 */
	private function _checkNumberIsSquare($number) {
		$squareRoot = $this->squareRoot($number);

		return $squareRoot == floor($squareRoot); 
	}
	
	/**
	 * Get Square root of number, only 
	 * 
	 * @return float
	 */
	private function squareRoot($number) {
		if ( is_numeric( $number ) )
			return sqrt( doubleval( $number ));
		
		return -0.1;
	}	

}