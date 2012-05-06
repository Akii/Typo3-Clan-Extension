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
class Tx_Ccore_Domain_Model_Squad extends Tx_Extbase_Domain_Model_FrontendUserGroup {
	
	/**
	 * @var string Logo
	 */
	protected $txCcoreLogo;
	
	/**
	 * @var Tx_Ccore_Domain_Model_Game
	 */
	protected $txCcoreGameid;
	
	/**
	 * Gets logo
	 *
	 * @return string
	 */
	public function getTxCcoreLogo() { return $this->txCcoreLogo; }
	
	/**
	 * Sets logo
	 *
	 * @param string $logo
	 * @return void
	 */
	public function setTxCcoreLogo($logo) { $this->txCcoreLogo = $logo; }
	
	/**
	 * Gets gameid
	 *
	 * @return Tx_Ccore_Domain_Model_Game
	 */
	public function getTxCcoreGameid() { return $this->txCcoreGameid; }
	
	/**
	 * Sets gameid
	 *
	 * @param Tx_Ccore_Domain_Model_Game $game
	 * @return void
	 */
	public function setTxCcoreGameid(Tx_Ccore_Domain_Model_Game $game) { $this->txCcoreGameid = $game; }
	
	/**
	 * Simplified getter for logo
	 *
	 * @return string
	 */
    public function getPicture() { return $this->txCcoreLogo; }
    
    /**
     * Simplified getter for gameid
     *
     * @return Tx_Ccore_Domain_Model_Game
     */
    public function getGameid() { return $this->txCcoreGameid; }
}
?>