<?php

require_once(dirname(__FILE__) . "/../src/Numeric_Diamonds.php");

class Numeric_DiamondsTest extends PHPUnit_Framework_TestCase {

	/**
	 * Sets up our state
	 */
	public function setUp() {
		$this->Numeric_Diamonds = new Numeric_Diamonds(100);
	}

	/**
	 * We test that our construct does indeed
	 * set the number
	 * 
	 * @covers Numeric_Diamonds::__construct
	 */
    public function testConstruct() {

    	//Check to see if construct can set _squareNumber to 9
    	$Numeric_Diamonds = new Numeric_Diamonds(9);

    	$this->assertEquals(
    		$this->readAttribute($this->Numeric_Diamonds, '_squareNumber'), 9);

    	//Check to see if construct can set _squareNumber to 20
    	$Numeric_Diamonds = new Numeric_Diamonds(20);

    	$this->assertEquals(
    		$this->readAttribute($this->Numeric_Diamonds, '_squareNumber'), 20);

    }

    /**
     * Test our check for detecting if a number is square
     * 
     * @covers Numeric_Diamonds::_checkNumberIsSquare
     */
    public function testCheckNumberIsSquare() {

    	//Allow access to our private method
        $method = new ReflectionMethod(
          $this->Numeric_Diamonds, '_checkNumberIsSquare'
        );

        $method->setAccessible(TRUE);

        //Test input of (int) 100
        $result = $method->invokeArgs(
        	$this->Numeric_Diamonds, array(100));

        $this->assertTrue($result);

        //Test input of (int) 49
        $result = $method->invokeArgs(
        	$this->Numeric_Diamonds, array(49));
        
        $this->assertTrue($result);

        //Test input of (int) 5
        $result = $method->invokeArgs(
        	$this->Numeric_Diamonds, array(5));
        
        $this->assertFalse($result);

        //Test input of (int) 'cat'
        $result = $method->invokeArgs(
        	$this->Numeric_Diamonds, array('cat'));
        
        $this->assertFalse($result);

    }

    /**
     * Test our diamond output
     * 
     * @covers Numeric_Diamonds::generateDiamond
     */
    public function testGenerateDiamond() {

    	//Test triangle with input of 9
    	$Numeric_Diamonds_1 = new Numeric_Diamonds(9);
    	$this->assertStringEqualsFile(__DIR__.'/expected/9.txt', 
    		$Numeric_Diamonds_1->generateDiamond());

    	//Test triangle with input of 36
    	$Numeric_Diamonds_1 = new Numeric_Diamonds(36);
    	$this->assertStringEqualsFile(__DIR__.'/expected/36.txt', 
    		$Numeric_Diamonds_1->generateDiamond());

    	//Test triangle with input of 100
    	$Numeric_Diamonds_1 = new Numeric_Diamonds(100);
    	$this->assertStringEqualsFile(__DIR__.'/expected/100.txt', 
    		$Numeric_Diamonds_1->generateDiamond());

    }

}