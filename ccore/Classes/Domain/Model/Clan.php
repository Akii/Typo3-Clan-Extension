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
class Tx_Ccore_Domain_Model_Clan extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * Name of the clan
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $name;

	/**
	 * Clantag
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $tag;

	/**
	 * Language
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $lang;

	/**
	 * A slogan
	 *
	 * @var string
	 */
	protected $slogan;

	/**
	 * The clans homepage
	 *
	 * @var string
	 */
	protected $homepage;

	/**
	 * Information about the clan
	 *
	 * @var string
	 */
	protected $about;

	/**
	 * Logo of the clan
	 *
	 * @var string
	 */
	protected $picture;
	
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
	 * Returns the language
	 *
	 * @return string
	 */
	public function getLang() {
		return $this->lang;
	}

	/**
	 * Sets the language
	 *
	 * @param string $lang
	 * @validate StringLength(maximum=2)
	 * @return void
	 */
	public function setLang($lang) {
		$this->lang = $lang;
	}

	/**
	 * Returns the slogan
	 *
	 * @return string
	 */
	public function getSlogan() {
		return $this->slogan;
	}

	/**
	 * Sets the slogan
	 *
	 * @param string $slogan
	 * @return void
	 */
	public function setSlogan($slogan) {
		$this->slogan = $slogan;
	}
	
	/**
	 * Gets the homepage
	 *
	 * @return string
	 */
	public function getHomepage() { return $this->homepage; }
	
	/**
	 * Sets the homepage
	 *
	 * @param string $homepage
	 * @return void
	 */
	public function setHomepage($homepage) { $this->homepage = $homepage; }

	/**
	 * Returns the about
	 *
	 * @return string $about
	 */
	public function getAbout() {
		return $this->about;
	}

	/**
	 * Sets the about
	 *
	 * @param string $about
	 * @return void
	 */
	public function setAbout($about) {
		$this->about = $about;
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