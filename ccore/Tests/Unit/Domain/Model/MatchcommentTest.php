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
 * Test case for class Tx_Ccore_Domain_Model_Matchcomment.
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
class Tx_Ccore_Domain_Model_MatchcommentTest extends Tx_Extbase_Tests_Unit_BaseTestCase {
	/**
	 * @var Tx_Ccore_Domain_Model_Matchcomment
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new Tx_Ccore_Domain_Model_Matchcomment();
	}

	public function tearDown() {
		unset($this->fixture);
	}
	
	
	/**
	 * @test
	 */
	public function getChangedonReturnsInitialValueForDateTime() { }

	/**
	 * @test
	 */
	public function setChangedonForDateTimeSetsChangedon() { }
	
	/**
	 * @test
	 */
	public function getCommentReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setCommentForStringSetsComment() { 
		$this->fixture->setComment('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getComment()
		);
	}
	
	/**
	 * @test
	 */
	public function getFeuserReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setFeuserForStringSetsFeuser() { 
		$this->fixture->setFeuser('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getFeuser()
		);
	}
	
	/**
	 * @test
	 */
	public function getMatchidReturnsInitialValueForTx_Ccore_Domain_Model_Match() { 
		$this->assertEquals(
			NULL,
			$this->fixture->getMatchid()
		);
	}

	/**
	 * @test
	 */
	public function setMatchidForTx_Ccore_Domain_Model_MatchSetsMatchid() { 
		$dummyObject = new Tx_Ccore_Domain_Model_Match();
		$this->fixture->setMatchid($dummyObject);

		$this->assertSame(
			$dummyObject,
			$this->fixture->getMatchid()
		);
	}
	
}
?>