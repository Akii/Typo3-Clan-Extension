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
class Tx_Ccore_Domain_Model_Matchdata extends Tx_Extbase_DomainObject_AbstractEntity {
	
	/**
	 * Disables comments for this match
	 *
	 * @var boolean
	 */
	protected $disableComments = false;
	
	/**
	 * Date the match takes/took place
	 *
	 * @var DateTime
	 * @validate NotEmpty
	 */
	protected $matchdate;
	
	/**
	 * Type of the matches
	 * 0: 1vs1
	 * 1: Clanwar
	 *
	 * @var int
	 * @validate NotEmpty
	 */
    protected $matchtype;
	
	/**
	 * The game this match took place in
	 *
	 * @var Tx_Ccore_Domain_Model_Game
	 * @validate NotEmpty
	 */
	protected $gameid;
	
	/**
	 * @var Tx_Ccore_Domain_Model_Clan
	 * @validate NotEmpty
	 */
	protected $clanproid;
	
	/**
	 * @var Tx_Ccore_Domain_Model_Clan
	 * @validate NotEmpty
	 */
	protected $clanconid;
	
	/**
	 * @var Tx_Ccore_Domain_Model_League
	 */
	protected $leagueid;
	
	/**
	 * @var string
	 */
	protected $llink;
	
	/**
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Ccore_Domain_Model_Matchcomment>
	 */
	protected $comments;
	
	/**
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Ccore_Domain_Model_Match>
	 */
	protected $matches;
	
	public function __construct() {
		$this->initStorageObjects();
	}
	
	protected function initStorageObjects() {
		$this->comments = new Tx_Extbase_Persistence_ObjectStorage();
		$this->matches	= new Tx_Extbase_Persistence_ObjectStorage();
	}
	
	/**
	 * Gets disable_comments
	 *
	 * @return boolean
	 */
	public function getDisableComments() { return $this->disableComments; }
	
	/**
	 * Sets disable_comments
	 *
	 * @param boolean $comments
	 * @return void
	 */
	public function setDisableComments($comments) { $this->disableComments = $comments; }
	
	/**
	 * Gets matchdate
	 *
	 * @return DateTime
	 */
	public function getMatchdate() { return $this->matchdate; }
	
	/**
	 * Sets matchdate
	 *
	 * @param DateTime $date
	 * @return void
	 */
	public function setMatchdate($date) { $this->matchdate = $date; }
	
	/**
	 * Gets matchtype
	 *
	 * @return int
	 */
    public function getMatchtype() { return $this->matchtype; }
    
    /**
     * Sets matchtype
     *
     * @param int $type
     * @return void
     */
    public function setMatchtype($type) { $this->matchtype = $type; }
	
	/**
	 * Gets gameid
	 *
	 * @return Tx_Ccore_Domain_Model_Game
	 */
	public function getGameid() { return $this->gameid; }
	
	/**
	 * Sets gameid
	 *
	 * @param Tx_Ccore_Domain_Model_Game $game
	 * @return void
	 */
	public function setGameid(Tx_Ccore_Domain_Model_Game $game) { $this->gameid = $game; }
	 
	/**
	 * Get clanproid
	 *
	 * @return Tx_Ccore_Domain_Model_Clan
	 */
	public function getClanproid() { return $this->clanproid; }
	 
	/**
	 * Sets clanproid
	 *
	 * @param Tx_Ccore_Domain_Model_Clan $clan
	 * @return void
	 */
	public function setClanproid(Tx_Ccore_Domain_Model_Clan $clan) { $this->clanproid = $clan; }
	 
	/**
	 * Get clanconid
	 *
	 * @return Tx_Ccore_Domain_Model_Clan
	 */
	public function getClanconid() { return $this->clanconid; }
	 
	/**
	 * Sets clanconid
	 *
	 * @param Tx_Ccore_Domain_Model_Clan $clan
	 * @return void
	 */
	public function setClanconid(Tx_Ccore_Domain_Model_Clan $clan) { $this->clanconid = $clan; }
	  
	/**
	 * Gets leagueid
	 *
	 * @return Tx_Ccore_Domain_Model_League
	 */
	public function getLeagueid() { return $this->leagueid; }
	   
	/**
	 * Sets leagueid
	 *
	 * @param Tx_Ccore_Domain_Model_League $league
	 * @return void
	 */
	public function setLeagueid(Tx_Ccore_Domain_Model_League $league) { $this->leagueid = $league; }
	    
	/**
	 * Gets llink
	 *
	 * @return string
	 */
	public function getLlink() { return $this->llink; }
	
	/**
	 * Sets llink
	 *
	 * @param string $link
	 * @return void
	 */
	public function setLlink($link) { $this->llink = $link; }
	
	/**
	 * Gets matches
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Ccore_Domain_Model_Match>
	 */
	public function getMatches() { return $this->matches; }
	
	/**
	 * Sets matches
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Ccore_Domain_Model_Match> $matches
	 * @return void
	 */
	public function setMatches(Tx_Extbase_Persistence_ObjectStorage $matches) { $this->matches = $matches; }
	
	/**
	 * Adds a match
	 *
	 * @param Tx_Ccore_Domain_Model_Match $match
	 * @return void
	 */
	public function addMatches(Tx_Ccore_Domain_Model_Match $match) { $this->matches->attach($match); }
	
	/**
	 * Removes a match
	 *
	 * @param Tx_Ccore_Domain_Model_Match $match
	 * @return void
	 */
	public function removeMatches(Tx_Ccore_Domain_Model_Match $match) { $this->matches->detach($match); }
	
	/**
	 * Gets comments
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Ccore_Domain_Model_Matchcomment>
	 */
    public function getComments() { return $this->comments; }
    
    /**
     * Sets comments
     *
     * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Ccore_Domain_Model_Matchcomment> $comments
     * @return void
     */
    public function setComments(Tx_Extbase_Persistence_ObjectStorage $comments) { $this->comments = $comments; }
    
    /**
     * Adds a comment
     *
     * @param Tx_Ccore_Domain_Model_Matchcomment $comment
     * @return void
     */
    public function addComments(Tx_Ccore_Domain_Model_Matchcomment $comment) { $this->comments->attach($comment); }
    
    /**
     * Removes a comment
     *
     * @param Tx_Ccore_Domain_Model_Matchcomment $comment
     * @return void
     */
    public function removeComments(Tx_Ccore_Domain_Model_Matchcomment $comment) { $this->comments->detach($comment); }
	
	/**
	 * Returns the Title for Team A
	 * In case of a clanwar the clan name is returned, otherwise the player on team A
	 *
	 * @return string
	 */
    public function getTitlepro() {
        // clan musn't be empty so this is perfectly safe
        $title = $this->clanproid->getName();
        
        // if this is a 1vs1 match we need to fetch the first match
        // if that exists and the playerproid is set
        // we use this as a name, else we use the clan name
        if($this->matchtype === 0 && $this->matches !== NULL) {
            $first_match = array_shift(iterator_to_array($this->matches));
            
            // a matchplayer must be associated to a player id
            if($first_match !== NULL && $player = $first_match->getPlayerproid())
                $title = $player->getName();
        }
        
        return $title;
    }
    
	/**
	 * Returns the Title for Team B
	 * In case of a clanwar the clan name is returned, otherwise the player on team B
	 *
	 * @return string
	 */
    public function getTitlecon() {
        // clan musn't be empty so this is perfectly safe
        $title = $this->clanconid->getName();
        
        // if this is a 1vs1 match we need to fetch the first match
        // if that exists and the playerproid is set
        // we use this as a name, else we use the clan name
        if($this->matchtype === 0 && $this->matches !== NULL) {
            $first_match = array_shift(iterator_to_array($this->matches));
            
            // a matchplayer must be associated to a player id
            if($first_match !== NULL && $player = $first_match->getPlayerconid())
                $title = $player->getName();
        }
        
        return $title;
    }
    
    /**
     * Computes the result of a match
     * =0: draw
     * <0: lost
     * >0: won
     *
     * @return int
     */
    public function getResult() {
        $res = $this->_getResArr();
        return $res['pro'] - $res['con'];
    }
    
    /**
     * Returns the endresult as string
     *
     * @return string
     */
    public function getResultStr() {
        $res = $this->_getResArr();
        return $res['pro'] . ':' . $res['con'];
    }
    
    /**
     * Returns an array with the calculated results
     *
     * $arr['pro']: contains the result of team A
     * $arr['con']: contains the result of team B
     *
     * Calculation with "Points" when the matchtype is a clanwar
     *
     * @return array
     */
    protected function _getResArr() {
        $out = array('pro' => 0, 'con' => 0);
        // count the maps in case of 1vs1
        if($this->matchtype === 0) {
            foreach($this->matches as $match) {
                $out['pro'] += $match->getResultpro();
                $out['con'] += $match->getResultcon();
            }
        } else {
            foreach($this->matches as $match) {
                if($match->getResultpro() > $match->getResultcon())
                    $out['pro']++;
                else
                    $out['con']++;
            }
        }
        return $out;
    }
    
    /**
     * Returns the number of total rounds played in all matches
     *
     * @return int
     */
    public function getRoundNum() {
        $rounds = 0;
        foreach($this->matches as $match)
            $rounds += $match->getRoundNum();
        
        return $rounds;
    }
}