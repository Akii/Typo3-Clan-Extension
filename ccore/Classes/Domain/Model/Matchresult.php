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
 *  the Free Software Foundation; either version 3 of the License, or
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
 *
 *
 * @package ccore
 * @license http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public License, version 3 or later
 *
 */
class Tx_Ccore_Domain_Model_Matchresult extends Tx_Extbase_DomainObject_AbstractValueObject {

	/**
	 * round number 1, 2, 3...
	 *
	 * @var integer
	 * @validate NotEmpty
	 */
	protected $roundnum;

	/**
	 * Result home clan
	 *
	 * @var integer
	 * @validate NotEmpty
	 */
	protected $resultpro;

	/**
	 * Result enemy clan
	 *
	 * @var integer
	 * @validate NotEmpty
	 */
	protected $resultcon;

	/**
	 * The map being played
	 *
	 * @var Tx_Ccore_Domain_Model_Map
	 * @lazy
	 */
	protected $mapid;
	
	/**
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Ccore_Domain_Model_Matchplayer>
	 */
	protected $playerspro;
	
	/**
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Ccore_Domain_Model_Matchplayer>
	 */
	protected $playerscon;

	/**
	 * Returns the round
	 *
	 * @return integer $roundnum
	 */
	public function getRoundnum() {
		return $this->roundnum;
	}

	/**
	 * Sets the round
	 *
	 * @param integer $roundnum
	 * @return void
	 */
	public function setRoundnum($roundnum) {
		$this->roundnum = $roundnum;
	}

	/**
	 * Returns the resultpro
	 *
	 * @return integer $resultpro
	 */
	public function getResultpro() {
		return $this->resultpro;
	}

	/**
	 * Sets the resultpro
	 *
	 * @param integer $resultpro
	 * @return void
	 */
	public function setResultpro($resultpro) {
		$this->resultpro = $resultpro;
	}

	/**
	 * Returns the resultcon
	 *
	 * @return integer $resultcon
	 */
	public function getResultcon() {
		return $this->resultcon;
	}

	/**
	 * Sets the resultcon
	 *
	 * @param integer $resultcon
	 * @return void
	 */
	public function setResultcon($resultcon) {
		$this->resultcon = $resultcon;
	}

	/**
	 * Returns the mapid
	 *
	 * @return Tx_Ccore_Domain_Model_Map $mapid
	 */
	public function getMapid() {
		return $this->mapid;
	}

	/**
	 * Sets the mapid
	 *
	 * @param Tx_Ccore_Domain_Model_Map $mapid
	 * @return void
	 */
	public function setMapid(Tx_Ccore_Domain_Model_Map $mapid) {
		$this->mapid = $mapid;
	}
	
	/**
	 * Sets players
	 * 
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Ccore_Domain_Model_Matchplayer> $obj
	 * @return void
	 */
	public function setPlayerspro(Tx_Extbase_Persistence_ObjectStorage $obj) {
		$this->playerspro = $obj;
	}
	
	/**
	 * Adds a player
	 *
	 * @param Tx_Ccore_Domain_Model_Matchplayer $player
	 * @return void
	 */
	public function addPlayerspro(Tx_Ccore_Domain_Model_Matchplayer $player) {
		$this->playerspro->attach($player);
	}
	
	/**
	 * Removes a player
	 *
	 * @param Tx_Ccore_Domain_Model_Matchplayer $player
	 * @return void
	 */
	public function removePlayerspro(Tx_Ccore_Domain_Model_Matchplayer $player) {
		$this->playerspro->remove($player);
	}
	
	/**
	 * @return Tx_Ccore_Domain_Model_Matchplayer
	 */
	public function getPlayerspro() {
		return $this->playerspro;
	}
	
	/**
	 * Sets players
	 * 
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Ccore_Domain_Model_Matchplayer> $obj
	 * @return void
	 */
	public function setPlayerscon(Tx_Extbase_Persistence_ObjectStorage $obj) {
		$this->playerscon = $obj;
	}
	
	/**
	 * Adds a player
	 *
	 * @param Tx_Ccore_Domain_Model_Matchplayer $player
	 * @return void
	 */
	public function addPlayerscon(Tx_Ccore_Domain_Model_Matchplayer $player) {
		$this->playerscon->attach($player);
	}
	
	/**
	 * Removes a player
	 *
	 * @param Tx_Ccore_Domain_Model_Matchplayer $player
	 * @return void
	 */
	public function removePlayerscon(Tx_Ccore_Domain_Model_Matchplayer $player) {
		$this->playerscon->remove($player);
	}
	
	/**
	 * @return Tx_Ccore_Domain_Model_Matchplayer
	 */
	public function getPlayerscon() {
		return $this->playerscon;
	}

}
?>