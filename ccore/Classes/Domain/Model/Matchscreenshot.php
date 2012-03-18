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
class Tx_Ccore_Domain_Model_Matchscreenshot extends Tx_Extbase_DomainObject_AbstractValueObject {
	
	/**
	 * @var string
	 * @validate notEmpty
	 */
	protected $screenshot;
	
	/**
	 * @var string
	 * @validate notEmpty
	 */
	protected $caption;
	
	/**
	 * @return Tx_Ccore_Domain_Model_Match
	 */
	public function getMatchid() { return $this->matchid; }
	
	/**
	 * @param Tx_Ccore_Domain_Model_Match $match
	 * @return void
	 */
	 public function setMatchid(Tx_Ccore_Domain_Model_Match $match) { $this->matchid = $match; }
	 
	 /**
	  * @return string
	  */
	 public function getScreenshot() { return $this->screenshot; }
	 
	 /**
	  * @param string $screenshot
	  * @return void
	  */
	 public function setScreenshot($screenshot) { $this->screenshot = $screenshot; }
	 
	 /**
	  * @return string
	  */
	 public function getCaption() { return $this->caption; }
	 
	 /**
	  * @param string $caption
	  * @return void
	  */
	 public function setCaption($caption) { $this->caption = $caption; }
	 
	 /**
	  * @return string
	  */
	 public function getName() { return $this->screenshot; }
}
?>