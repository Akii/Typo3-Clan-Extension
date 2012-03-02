<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2012 Akii 
 *  			
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Test case for class Tx_Ccore_Domain_Model_Points.
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @package TYPO3
 * @subpackage Clan Core
 *
 * @author Akii 
 */
class Tx_Ccore_Domain_Model_PointsTest extends Tx_Extbase_Tests_Unit_BaseTestCase {
	/**
	 * @var Tx_Ccore_Domain_Model_Points
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new Tx_Ccore_Domain_Model_Points();
	}

	public function tearDown() {
		unset($this->fixture);
	}
	
	
	/**
	 * @test
	 */
	public function getFeuseridReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setFeuseridForStringSetsFeuserid() { 
		$this->fixture->setFeuserid('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getFeuserid()
		);
	}
	
	/**
	 * @test
	 */
	public function getNoteReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setNoteForStringSetsNote() { 
		$this->fixture->setNote('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getNote()
		);
	}
	
	/**
	 * @test
	 */
	public function getValueReturnsInitialValueForInteger() { 
		$this->assertSame(
			0,
			$this->fixture->getValue()
		);
	}

	/**
	 * @test
	 */
	public function setValueForIntegerSetsValue() { 
		$this->fixture->setValue(12);

		$this->assertSame(
			12,
			$this->fixture->getValue()
		);
	}
	
}
?>