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
class Tx_Ccore_Domain_Model_Match extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * Date the match takes/took place
	 *
	 * @var DateTime
	 * @validate NotEmpty
	 */
	protected $matchdate;

	/**
	 * name of the league
	 *
	 * @var string
	 */
	protected $lname;

	/**
	 * link to the league overview
	 *
	 * @var string
	 */
	protected $llink;

	/**
	 * Match report
	 *
	 * @var string
	 */
	protected $report;

	/**
	 * The game this match took place in
	 *
	 * @var Tx_Ccore_Domain_Model_Game
	 */
	protected $game;

	/**
	 * __construct
	 *
	 * @return void
	 */
	public function __construct() {

	}

	/**
	 * Returns the matchdate
	 *
	 * @return DateTime $matchdate
	 */
	public function getMatchdate() {
		return $this->matchdate;
	}

	/**
	 * Sets the matchdate
	 *
	 * @param DateTime $matchdate
	 * @return void
	 */
	public function setMatchdate($matchdate) {
		$this->matchdate = $matchdate;
	}

	/**
	 * Returns the lname
	 *
	 * @return string $lname
	 */
	public function getLname() {
		return $this->lname;
	}

	/**
	 * Sets the lname
	 *
	 * @param string $lname
	 * @return void
	 */
	public function setLname($lname) {
		$this->lname = $lname;
	}

	/**
	 * Returns the llink
	 *
	 * @return string $llink
	 */
	public function getLlink() {
		return $this->llink;
	}

	/**
	 * Sets the llink
	 *
	 * @param string $llink
	 * @return void
	 */
	public function setLlink($llink) {
		$this->llink = $llink;
	}

	/**
	 * Returns the report
	 *
	 * @return string $report
	 */
	public function getReport() {
		return $this->report;
	}

	/**
	 * Sets the report
	 *
	 * @param string $report
	 * @return void
	 */
	public function setReport($report) {
		$this->report = $report;
	}

	/**
	 * Returns the game
	 *
	 * @return Tx_Ccore_Domain_Model_Game $game
	 */
	public function getGame() {
		return $this->game;
	}

	/**
	 * Sets the game
	 *
	 * @param Tx_Ccore_Domain_Model_Game $game
	 * @return void
	 */
	public function setGame(Tx_Ccore_Domain_Model_Game $game) {
		$this->game = $game;
	}

}
?>