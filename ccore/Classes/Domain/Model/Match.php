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
	 * @var boolean
	 */
	protected $clanwar;
	
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
	 * @var Tx_Ccore_Domain_Model_Gamemode
	 */
	protected $gamemode;
	
	/**
	 * @var Tx_Ccore_Domain_Model_Clan
	 */
	protected $clanPro;
	
	/**
	 * @var Tx_Ccore_Domain_Model_Clan
	 */
	protected $clanCon;
	
	/**
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Ccore_Domain_Model_Matchscreenshot>
	 */
	protected $screenshots;

	/**
	 * Returns the matchdate
	 *
	 * @return DateTime $matchdate
	 */
	public function getMatchdate() {
		return $this->matchdate;
	}

	/**
	 * @return boolean
	 */
	public function getClanwar() {
		return $this->clanwar;
	}
	
	/**
	 * @param boolean $cw
	 * @return void
	 */
	public function setClanwar($cw) {
		$this->clanwar = $cw;
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
	
	/**
	 * @return Tx_Ccore_Domain_Model_Gamemode
	 */
	public function getGamemode() {
		return $this->gamemode;
	}
	
	/**
	 * @param Tx_Ccore_Domain_Model_Gamemode $gm
	 * @return void
	 */
	public function setGamemode(Tx_Ccore_Domain_Model_Gamemode $gm) {
		$this->gamemode = $gm;
	}
	
	/**
	 * @return Tx_Ccore_Domain_Model_Clan
	 */
	public function getClanPro() {
		return $this->clanPro;
	}
	
	/**
	 * @param Tx_Ccore_Domain_Model_Clan $clanpro
	 * @return void
	 */
	public function setClanPro(Tx_Ccore_Domain_Model_Clan $clanpro) {
		$this->clanPro = $clanpro;
	}
	
	/**
	 * @return Tx_Ccore_Domain_Model_Clan
	 */
	public function getClanCon() {
		return $this->clanCon;
	}
	
	/**
	 * @param Tx_Ccore_Domain_Model_Clan $clancon
	 * @return void
	 */
	public function setClanCon(Tx_Ccore_Domain_Model_Clan $clancon) {
		$this->clanCon = $clancon;
	}

	/**
	 * Sets the screenshots
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Ccore_Domain_Model_Matchscreenshot> $obj
	 * @return void
	 */
	public function setScreenshots(Tx_Extbase_Persistence_ObjectStorage $obj) {
		$this->screenshots = $obj;
	}
	
	/**
	 * Add a screenshot
	 *
	 * @param Tx_Ccore_Domain_Model_Matchscreenshot $screenshot
	 * @return void
	 */
	public function addScreenshot(Tx_Ccore_Domain_Model_Matchscreenshot $screenshot) {
		$this->screenshots->attatch($screenshot);
	}
	
	/**
	 * Removes a screenshot
	 *
	 * @param Tx_Ccore_Domain_Model_Matchscreenshot $screenshot
	 * @return void
	 */
	public function removeScreenshot(Tx_Ccore_Domain_Model_Matchscreenshot $screenshot) {
		$this->screenshots->remove($screenshot);
	}
	
	/**
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Ccore_Domain_Model_Matchscreenshot>
	 */
	public function getScreenshots() {
		return $this->screenshots;
	}

}
?>