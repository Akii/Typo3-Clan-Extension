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
	 * Is in team A or B
	 *
	 * @var boolean
	 * @validate NotEmpty
	 */
	protected $team;

	/**
	 * Name of the player
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $name;

	/**
	 * Language like de, en
	 *
	 * @var string
	 */
	protected $languagetag;
	
	/**
	 * Race/Character
	 *
	 * @var Tx_Ccore_Domain_Model_Race
	 * @lazy
	 */
	protected $race;

	/**
	 * fe_user relationship
	 *
	 * @var Tx_Ccore_Domain_Model_User
	 * @lazy
	 */
	protected $feuser;

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
	 * Returns the name
	 *
	 * @return string $name
	 */
	public function getName() {
		// if a fe_user is associated, we prefer that name
		if($this->feuser !== NULL && $this->feuser->getName() != "")
			return $this->feuser->getName();
		else
			return $this->name;
	}

	/**
	 * Sets the name
	 *
	 * @param string $name
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * Returns the languagetag
	 *
	 * @return string $languagetag
	 */
	public function getLanguagetag() {
		return $this->languagetag;
	}

	/**
	 * Sets the languagetag
	 *
	 * @param string $languagetag
	 * @return void
	 */
	public function setLanguagetag($languagetag) {
		$this->languagetag = $languagetag;
	}
	
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
	 * Returns the feuser
	 *
	 * @return Tx_Ccore_Domain_Model_User $feuser
	 */
	public function getFeuser() {
		return $this->feuser;
	}

	/**
	 * Sets the feuser
	 *
	 * @param Tx_Ccore_Domain_Model_User $feuser
	 * @return void
	 */
	public function setFeuser(Tx_Ccore_Domain_Model_User $feuser) {
		$this->feuser = $feuser;
	}

}
?>