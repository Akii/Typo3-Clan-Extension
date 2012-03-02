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
 * Test case for class Tx_Ccore_Domain_Model_Map.
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
class Tx_Ccore_Domain_Model_MapTest extends Tx_Extbase_Tests_Unit_BaseTestCase {
	/**
	 * @var Tx_Ccore_Domain_Model_Map
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new Tx_Ccore_Domain_Model_Map();
	}

	public function tearDown() {
		unset($this->fixture);
	}
	
	
	/**
	 * @test
	 */
	public function getTitleReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setTitleForStringSetsTitle() { 
		$this->fixture->setTitle('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getTitle()
		);
	}
	
	/**
	 * @test
	 */
	public function getDescriptionReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setDescriptionForStringSetsDescription() { 
		$this->fixture->setDescription('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getDescription()
		);
	}
	
	/**
	 * @test
	 */
	public function getImageReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setImageForStringSetsImage() { 
		$this->fixture->setImage('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getImage()
		);
	}
	
	/**
	 * @test
	 */
	public function getDownloadReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setDownloadForStringSetsDownload() { 
		$this->fixture->setDownload('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getDownload()
		);
	}
	
	/**
	 * @test
	 */
	public function getGameReturnsInitialValueForTx_Ccore_Domain_Model_Game() { 
		$this->assertEquals(
			NULL,
			$this->fixture->getGame()
		);
	}

	/**
	 * @test
	 */
	public function setGameForTx_Ccore_Domain_Model_GameSetsGame() { 
		$dummyObject = new Tx_Ccore_Domain_Model_Game();
		$this->fixture->setGame($dummyObject);

		$this->assertSame(
			$dummyObject,
			$this->fixture->getGame()
		);
	}
	
	/**
	 * @test
	 */
	public function getModesReturnsInitialValueForObjectStorageContainingTx_Ccore_Domain_Model_Gamemode() { 
		$newObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getModes()
		);
	}

	/**
	 * @test
	 */
	public function setModesForObjectStorageContainingTx_Ccore_Domain_Model_GamemodeSetsModes() { 
		$mode = new Tx_Ccore_Domain_Model_Gamemode();
		$objectStorageHoldingExactlyOneModes = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneModes->attach($mode);
		$this->fixture->setModes($objectStorageHoldingExactlyOneModes);

		$this->assertSame(
			$objectStorageHoldingExactlyOneModes,
			$this->fixture->getModes()
		);
	}
	
	/**
	 * @test
	 */
	public function addModeToObjectStorageHoldingModes() {
		$mode = new Tx_Ccore_Domain_Model_Gamemode();
		$objectStorageHoldingExactlyOneMode = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneMode->attach($mode);
		$this->fixture->addMode($mode);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneMode,
			$this->fixture->getModes()
		);
	}

	/**
	 * @test
	 */
	public function removeModeFromObjectStorageHoldingModes() {
		$mode = new Tx_Ccore_Domain_Model_Gamemode();
		$localObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$localObjectStorage->attach($mode);
		$localObjectStorage->detach($mode);
		$this->fixture->addMode($mode);
		$this->fixture->removeMode($mode);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getModes()
		);
	}
	
}
?>