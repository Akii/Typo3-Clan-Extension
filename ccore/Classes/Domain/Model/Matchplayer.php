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
class Tx_Ccore_Domain_Model_Matchplayer extends Tx_Extbase_DomainObject_AbstractValueObject {

	/**
	 * fe_user relationship
	 *
	 * @var Tx_Ccore_Domain_Model_Player
	 * @validate NotEmpty
	 * @lazy
	 */
	protected $playerid;
	
	/**
	 * Race/Character
	 *
	 * @var Tx_Ccore_Domain_Model_Race
	 * @lazy
	 */
	protected $race;
	
	/**
	 * Is in team A or B
	 *
	 * @var boolean
	 * @validate NotEmpty
	 */
	protected $team;
	
	/**
	 * Gets playerid
	 *
	 * @return Tx_Ccore_Domain_Model_Player
	 */
	public function getPlayerid() { return $this->playerid; }
	
	/**
	 * Sets playerid
	 *
	 * @param Tx_Ccore_Domain_Model_Player $player
	 * @return void
	 */
	public function setPlayerid(Tx_Ccore_Domain_Model_Player $player) { $this->playerid = $player; }
	
	/**
	 * @return Tx_Ccore_Domain_Model_Race
	 */
	public function getRace() {
		return $this->race;
	}
	
	/**
	 * @param Tx_Ccore_Domain_Model_Race $race
	 * @return void
	 */
	public function setRace(Tx_Ccore_Domain_Model_Race $race) {
		$this->race = $race;
	}

	/**
	 * returns enemy
	 *
	 * @return boolean
	 */
	public function getTeam() {
		return $this->team;
	}
	
	/**
	 * sets enemy
	 *
	 * @param boolean $team
	 * @return void
	 */
	public function setTeam($team) {
		$this->team = $team;
	}
    
    /**
     * Returns the name of the player associated with this matchplayer
     *
     * @return string
     */
    public function getName() { return $this->playerid->getName(); }
}
?>