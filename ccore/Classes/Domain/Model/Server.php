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
class Tx_Ccore_Domain_Model_Server extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * Name of the server
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $name;

	/**
	 * ip and port of the server
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $ip;

	/**
	 * Game ID, The game the server runs
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
	 * Returns the ip
	 *
	 * @return string $ip
	 */
	public function getIp() {
		return $this->ip;
	}

	/**
	 * Sets the ip
	 *
	 * @param string $ip
	 * @return void
	 */
	public function setIp($ip) {
		$this->ip = $ip;
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