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
	 * @var boolean
	 */
	protected $disableComments;
	
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
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Ccore_Domain_Model_Matchresult>
	 */
	protected $matchresults;
	
	/**
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Ccore_Domain_Model_Matchplayer>
	 * @lazy
	 */
	protected $matchplayers;

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
	 * @return boolean
	 */
	public function getDisableComments() {
		return $this->disableComments;
	}
	
	/**
	 * @param boolean $com
	 * @return void
	 */
	public function setDisableComments($com) {
		$this->disableComments = $com;
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

	/**
	 * Sets the results
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Ccore_Domain_Model_Matchresult> $obj
	 * @return void
	 */
	public function setMatchresults(Tx_Extbase_Persistence_ObjectStorage $obj) {
		$this->matchresults = $obj;
	}
	
	/**
	 * Add a result
	 *
	 * @param Tx_Ccore_Domain_Model_Matchresult $result
	 * @return void
	 */
	public function addMatchresults(Tx_Ccore_Domain_Model_Matchresult $result) {
		$this->matchresults->attatch($result);
	}
	
	/**
	 * Removes a result
	 *
	 * @param Tx_Ccore_Domain_Model_Matchresult $screenshot
	 * @return void
	 */
	public function removeMatchresults(Tx_Ccore_Domain_Model_Matchresult $result) {
		$this->matchresults->remove($result);
	}
	
	/**
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Ccore_Domain_Model_Matchresult>
	 */
	public function getMatchresults() {
		return $this->matchresults;
	}
	
	/**
	 * Sets the results
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Ccore_Domain_Model_Matchplayer> $obj
	 * @return void
	 */
	public function setMatchplayers(Tx_Extbase_Persistence_ObjectStorage $obj) {
		$this->matchplayers = $obj;
	}
	
	/**
	 * Add a result
	 *
	 * @param Tx_Ccore_Domain_Model_Matchplayer $player
	 * @return void
	 */
	public function addMatchplayers(Tx_Ccore_Domain_Model_Matchplayer $player) {
		$this->matchplayers->attatch($result);
	}
	
	/**
	 * Removes a result
	 *
	 * @param Tx_Ccore_Domain_Model_Matchplayer $player
	 * @return void
	 */
	public function removeMatchplayers(Tx_Ccore_Domain_Model_Matchplayer $player) {
		$this->matchplayers->remove($result);
	}
	
	/**
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Ccore_Domain_Model_Matchplayer>
	 */
	public function getMatchplayers() {
		return $this->matchplayers;
	}
	
	/**
	 * Calculates the end result of all matchresults
	 *
	 * @return string
	 */
	public function getEndresult() {
		$pro = $this->getEndresultPro();
		$con = $this->getEndresultCon();
		
		return $pro . ':' . $con;
	}
	
	/**
	 * Returns the end result for team A
	 *
	 * @return int
	 */
	public function getEndresultPro() {
		$pro = 0;
		foreach($this->matchresults as $result) {
			$pro += $result->getResultpro();
		}
		
		return $pro;
	}
	
	/**
	 * Returns the end result for team B
	 *
	 * @return int
	 */
	public function getEndresultCon() {
		$con = 0;
		foreach($this->matchresults as $result) {
			$con += $result->getResultcon();
		}
		
		return $con;
	}
	
	/**
	 * Function to get the title/name of the first team. Needed for 1vs1 matches (!clanwar)
	 * to show the players instead of the clans
	 *
	 * @return string
	 */
	public function getTitlepro() {
		// normally we use the clan name as title
		$title = $this->clanPro->getName();
		
		if($this->clanwar === false && $this->matchresults !== null) {
			// unless it's a 1vs1, then we use the player name
			
			if($result = array_shift(iterator_to_array($this->matchresults))) {
				foreach($result->getPlayers() as $player) {
					if($player->getTeam() === false) {
						$title = $player->getName();
						break;
					}
				}
			}
		}
		
		return $title;
	}
	
	/**
	 * Function to get the title/name of the first team. Needed for 1vs1 matches (!clanwar)
	 * to show the players instead of the clans
	 *
	 * @return string
	 */
	public function getTitlecon() {
		// normally we use the clan name as title
		$title = $this->clanCon->getName();
		
		if($this->clanwar === false && $this->matchresults !== null) {
			// unless it's a 1vs1, then we use the player name
			
			if($result = array_shift(iterator_to_array($this->matchresults))) {
				foreach($result->getPlayers() as $player) {
					if($player->getTeam() === true) {
						$title = $player->getName();
						break;
					}
				}
			}
		}
		
		return $title;
	}

}
?>