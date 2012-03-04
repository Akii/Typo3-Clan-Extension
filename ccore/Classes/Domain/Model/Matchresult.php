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
	 * ID of the match this result belongs to
	 *
	 * @var Tx_Ccore_Domain_Model_Match
	 */
	protected $matchid;

	/**
	 * The map being played
	 *
	 * @var Tx_Ccore_Domain_Model_Map
	 */
	protected $mapid;

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

}
?>