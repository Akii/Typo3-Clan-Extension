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
class Tx_Ccore_Domain_Model_Game extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * Title (name) of the game
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $title;

	/**
	 * Short name for the game (e.g. sc2)
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $tag;

	/**
	 * Description of the game
	 *
	 * @var string
	 */
	protected $description;

	/**
	 * Logo of the game
	 *
	 * @var string
	 */
	protected $picture;

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
	 * Returns the tag
	 *
	 * @return string $tag
	 */
	public function getTag() {
		return $this->tag;
	}

	/**
	 * Sets the tag
	 *
	 * @param string $tag
	 * @return void
	 */
	public function setTag($tag) {
		$this->tag = $tag;
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
	 * Returns the picture
	 *
	 * @return string
	 */
	public function getPicture() {
		return $this->picture;
	}

	/**
	 * Sets the picture
	 *
	 * @param string $picture
	 * @return void
	 */
	public function setPicture($picture) {
		$this->picture = $picture;
	}

}
?>