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
	 * @validate NotEmpty
	 */
	protected $languagetag;

	/**
	 * is this a player of the enemy team
	 *
	 * @var boolean
	 * @validate NotEmpty
	 */
	protected $enemy;

	/**
	 * fe_user relationship
	 *
	 * @var string
	 */
	protected $feuser;

	/**
	 * The match this player played in
	 *
	 * @var Tx_Ccore_Domain_Model_Match
	 */
	protected $matchid;

	/**
	 * __construct
	 *
	 * @return void
	 */
	public function __construct() {

	}

	/**
	 * Returns the name
	 *
	 * @return string $name
	 */
	public function getName() {
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
	 * Returns the enemy
	 *
	 * @return boolean $enemy
	 */
	public function getEnemy() {
		return $this->enemy;
	}

	/**
	 * Sets the enemy
	 *
	 * @param boolean $enemy
	 * @return void
	 */
	public function setEnemy($enemy) {
		$this->enemy = $enemy;
	}

	/**
	 * Returns the boolean state of enemy
	 *
	 * @return boolean
	 */
	public function isEnemy() {
		return $this->getEnemy();
	}

	/**
	 * Returns the feuser
	 *
	 * @return string $feuser
	 */
	public function getFeuser() {
		return $this->feuser;
	}

	/**
	 * Sets the feuser
	 *
	 * @param string $feuser
	 * @return void
	 */
	public function setFeuser($feuser) {
		$this->feuser = $feuser;
	}

	/**
	 * Returns the matchid
	 *
	 * @return Tx_Ccore_Domain_Model_Match $matchid
	 */
	public function getMatchid() {
		return $this->matchid;
	}

	/**
	 * Sets the matchid
	 *
	 * @param Tx_Ccore_Domain_Model_Match $matchid
	 * @return void
	 */
	public function setMatchid(Tx_Ccore_Domain_Model_Match $matchid) {
		$this->matchid = $matchid;
	}

}
?>