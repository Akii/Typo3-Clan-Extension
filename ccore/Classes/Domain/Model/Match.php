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
	 * @var Tx_Ccore_Domain_Model_Gamemode
	 * @validate NotEmpty
	 */
	protected $gamemodeid;
	
	// TODO: Use single table inheritance to move those two to a different class
	/**
	 * @var Tx_Ccore_Domain_Model_Matchplayer
	 */
	protected $playerproid;
	
	/**
	 * @var Tx_Ccore_Domain_Model_Matchplayer
	 */
	protected $playerconid;
	
	/**
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Ccore_Domain_Model_Matchresult>
	 * @validate NotEmpty
	 */
	protected $rounds;
	
	public function __construct() {
		$this->initStorageObjects();
	}
	
	protected function initStorageObjects() {
		$this->rounds = new Tx_Extbase_Persistence_ObjectStorage();
	}
	
	/**
	 * Gets gamemodeid
	 *
	 * @return Tx_Ccore_Domain_Model_Gamemode
	 */
	public function getGamemodeid() { return $this->gamemodeid; }
	
	/**
	 * Sets gamemodeid
	 *
	 * @param Tx_Ccore_Domain_Model_Gamemode $gamemode
	 * @return void
	 */
	public function setGamemodeid(Tx_Ccore_Domain_Model_Gamemode $gamemode) { $this->gamemodeid = $gamemode; }
	
	/**
	 * Gets playerproid
	 *
	 * @return Tx_Ccore_Domain_Model_Matchplayer
	 */
	public function getPlayerproid() { return $this->playerproid; }
	
	/**
	 * Sets playerproid
	 *
	 * @param Tx_Ccore_Domain_Model_Matchplayer $player
	 * @return void
	 */
	public function setPlayerproid(Tx_Ccore_Domain_Model_Matchplayer $player) { $this->playerproid = $player; }
	
	/**
	 * Gets playerconid
	 *
	 * @return Tx_Ccore_Domain_Model_Matchplayer
	 */
	public function getPlayerconid() { return $this->playerconid; }
	
	/**
	 * Sets playerconid
	 *
	 * @param Tx_Ccore_Domain_Model_Matchplayer $player
	 * @return void
	 */
	public function setPlayerconid(Tx_Ccore_Domain_Model_Matchplayer $player) { $this->playerconid = $player; }
	
	/**
	 * Gets rounds
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Ccore_Domain_Model_Matchresult>
	 */
	public function getRounds() { return $this->rounds; }
	
	/**
	 * Sets rounds
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Ccore_Domain_Model_Matchresult> $rounds
	 * @return void
	 */
	public function setRounds(Tx_Extbase_Persistence_ObjectStorage $rounds) { $this->rounds = $rounds; }
	
	/**
	 * Adds a round
	 *
	 * @param Tx_Ccore_Domain_Model_Matchresult $round
	 * @return void
	 */
	public function addRounds(Tx_Ccore_Domain_Model_Matchresult $round) { $this->rounds->attach($round); }
	
	/**
	 * Removes a round
	 *
	 * @param Tx_Ccore_Domain_Model_Matchresult $round
	 * @return void
	 */
	public function removeRounds(Tx_Ccore_Domain_Model_Matchresult $round) { $this->rounds->detach($round); }
	
	/**
	 * @see Matchdata.getResult()
	 *
	 * @return int
	 */
    public function getResult() { return $this->getResultpro() - $this->getResultcon(); }
	
	/**
	 * Returns the result of team A
	 *
	 * @return int
	 */
    public function getResultpro() {
        $out = 0;
        foreach($this->rounds as $round) {
            $out += $round->getResultpro();
        }
        return $out;
    }
    
    /**
     * Returns the result of team B
     *
     * @return int
     */
    public function getResultcon() {
        $out = 0;
        foreach($this->rounds as $round) {
            $out += $round->getResultcon();
        }
        return $out;
    }
    
    /**
     * Returns the number of rounds played
     *
     * @return int
     */
    public function getRoundNum() { return count($this->rounds); }
}
?>