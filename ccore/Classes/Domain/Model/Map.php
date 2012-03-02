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
class Tx_Ccore_Domain_Model_Map extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * Name of the map
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $title;

	/**
	 * Description of the map
	 *
	 * @var string
	 */
	protected $description;

	/**
	 * Small image of the map
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $image;

	/**
	 * download url
	 *
	 * @var string
	 */
	protected $download;

	/**
	 * Game id
	 *
	 * @var Tx_Ccore_Domain_Model_Game
	 */
	protected $game;

	/**
	 * Game modes this map supports
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Ccore_Domain_Model_Gamemode>
	 */
	protected $modes;

	/**
	 * __construct
	 *
	 * @return void
	 */
	public function __construct() {
		//Do not remove the next line: It would break the functionality
		$this->initStorageObjects();
	}

	/**
	 * Initializes all Tx_Extbase_Persistence_ObjectStorage properties.
	 *
	 * @return void
	 */
	protected function initStorageObjects() {
		/**
		 * Do not modify this method!
		 * It will be rewritten on each save in the extension builder
		 * You may modify the constructor of this class instead
		 */
		$this->modes = new Tx_Extbase_Persistence_ObjectStorage();
	}

	/**
	 * Returns the title
	 *
	 * @return string $title
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Sets the title
	 *
	 * @param string $title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * Returns the description
	 *
	 * @return string $description
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Sets the description
	 *
	 * @param string $description
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * Returns the image
	 *
	 * @return string $image
	 */
	public function getImage() {
		return $this->image;
	}

	/**
	 * Sets the image
	 *
	 * @param string $image
	 * @return void
	 */
	public function setImage($image) {
		$this->image = $image;
	}

	/**
	 * Returns the download
	 *
	 * @return string $download
	 */
	public function getDownload() {
		return $this->download;
	}

	/**
	 * Sets the download
	 *
	 * @param string $download
	 * @return void
	 */
	public function setDownload($download) {
		$this->download = $download;
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
	 * Adds a Gamemode
	 *
	 * @param Tx_Ccore_Domain_Model_Gamemode $mode
	 * @return void
	 */
	public function addMode(Tx_Ccore_Domain_Model_Gamemode $mode) {
		$this->modes->attach($mode);
	}

	/**
	 * Removes a Gamemode
	 *
	 * @param Tx_Ccore_Domain_Model_Gamemode $modeToRemove The Gamemode to be removed
	 * @return void
	 */
	public function removeMode(Tx_Ccore_Domain_Model_Gamemode $modeToRemove) {
		$this->modes->detach($modeToRemove);
	}

	/**
	 * Returns the modes
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Ccore_Domain_Model_Gamemode> $modes
	 */
	public function getModes() {
		return $this->modes;
	}

	/**
	 * Sets the modes
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Ccore_Domain_Model_Gamemode> $modes
	 * @return void
	 */
	public function setModes(Tx_Extbase_Persistence_ObjectStorage $modes) {
		$this->modes = $modes;
	}

}
?>