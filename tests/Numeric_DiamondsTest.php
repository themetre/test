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
	 */
    public function testConstruct() {

    }

    /**
     * Test our check for detecting if a number is square
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
     */
    public function testGenerateDiamond() {

    }

    /**
     * Resets our state
     */
    public function tearDown() {

    }

}