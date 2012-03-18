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
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Ccore_Domain_Model_Race>
	 */
	protected $banspro;
	
	/**
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Ccore_Domain_Model_Race>
	 */
	protected $banscon;
	
	/**
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Ccore_Domain_Model_Matchplayer>
	 */
	protected $players;

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
	 * Sets banspro
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Ccore_Domain_Model_Race> $obj
	 * @return void
	 */
	public function setBanspro(Tx_Ccore_Domain_Model_Race $obj) {
		$this->banspro = $obj;
	}
	
	/**
	 * Gets banspro
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Ccore_Domain_Model_Race>
	 */
	public function getBanspro() {
		return $this->banspro;
	}
	
	/**
	 * Sets banscon
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Ccore_Domain_Model_Race> $obj
	 * @return void
	 */
	public function setBanscon(Tx_Ccore_Domain_Model_Race $obj) {
		$this->banscon = $obj;
	}
	
	/**
	 * Gets banscon
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Ccore_Domain_Model_Race>
	 */
	public function getBanscon() {
		return $this->banscon;
	}
	
	/**
	 * Sets players
	 * 
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Ccore_Domain_Model_Matchplayer> $obj
	 * @return void
	 */
	public function setPlayers(Tx_Extbase_Persistence_ObjectStorage $obj) {
		$this->players = $obj;
	}
	
	/**
	 * Adds a player
	 *
	 * @param Tx_Ccore_Domain_Model_Matchplayer $player
	 * @return void
	 */
	public function addPlayers(Tx_Ccore_Domain_Model_Matchplayer $player) {
		$this->players->attach($player);
	}
	
	/**
	 * Removes a player
	 *
	 * @param Tx_Ccore_Domain_Model_Matchplayer $player
	 * @return void
	 */
	public function removePlayers(Tx_Ccore_Domain_Model_Matchplayer $player) {
		$this->players->remove($player);
	}
	
	/**
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Ccore_Domain_Model_Matchplayer>
	 */
	public function getPlayers() {
		return $this->players;
	}
	
	/**
	 * returns players of team A
	 *
	 * @return array
	 */
	public function getPlayerspro() {
		$out = array();
		foreach($this->players as $player) {
			if($player->getTeam() === false) $out[] = $player;
		}
		return $out;
	}
	
	/**
	 * returns players of team B
	 *
	 * @return array
	 */
	public function getPlayerscon() {
		$out = array();
		foreach($this->players as $player) {
			if($player->getTeam() === true) $out[] = $player;
		}
		return $out;
	}
}
?>