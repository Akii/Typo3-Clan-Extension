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
	 * Logo of the squad
	 *
	 * @var string
	 */
	protected $txccorelogo;
	
	/**
	 * Game the squad plays
	 *
	 * @var Tx_Ccore_Domain_Model_Game
	 */
	protected $txccoregameid;
	
	/**
	 * @returns string
	 */
	public function getLogo() {
		return $this->txccorelogo;
	}
	
	/**
	 * @returns string
	 */
	public function getTxccorelogo() {
		return $this->txccorelogo;
	}
	
	/**
	 * @param string $logo
	 */
	public function setTxccorelogo($logo) {
		$this->txccorelogo = $logo;
	}
	
	/**
	 * @returns Tx_Ccore_Domain_Model_Game
	 */
	public function getGame() {
		return $this->txccoregameid;
	}
	
	/**
	 * @returns Tx_Ccore_Domain_Model_Game
	 */
	public function getTxccoregameid() {
		return $this->txccoregameid;
	}
	
	/**
	 * @param Tx_Ccore_Domain_Model_Game $game
	 */
	public function setTxccoregameid(Tx_Ccore_Domain_Model_Game $game) {
		$this->txccoregameid = $game;
	}
	
}
?>