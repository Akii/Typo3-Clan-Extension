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
class Tx_Ccore_Domain_Model_Matchcomment extends Tx_Extbase_DomainObject_AbstractValueObject {
	
	/**
	 * Time it was created
	 *
	 * @var DateTime
	 */
	protected $createdon;
	
	/**
	 * Time it was changed
	 *
	 * @var DateTime
	 */
	protected $changedon;

	/**
	 * The comment
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $comment;

	/**
	 * fe_user relationship
	 *
	 * @var string
	 */
	protected $feuser;

	/**
	 * ID of the match
	 *
	 * @var Tx_Ccore_Domain_Model_Match
	 */
	protected $matchid;

	/**
	 * __construct
	 *
	 * @return void
	 */
	public function __construct() {

	}

	/**
	 * Returns the changedon
	 *
	 * @return DateTime $changedon
	 */
	public function getChangedon() {
		return $this->changedon;
	}

	/**
	 * Sets the changedon
	 *
	 * @param DateTime $changedon
	 * @return void
	 */
	public function setChangedon($changedon) {
		$this->changedon = $changedon;
	}

	/**
	 * Returns the comment
	 *
	 * @return string $comment
	 */
	public function getComment() {
		return $this->comment;
	}

	/**
	 * Sets the comment
	 *
	 * @param string $comment
	 * @return void
	 */
	public function setComment($comment) {
		$this->comment = $comment;
	}

	/**
	 * Returns the feuser
	 *
	 * @return string $feuser
	 */
	public function getFeuser() {
		return $this->feuser;
	}

	/**
	 * Sets the feuser
	 *
	 * @param string $feuser
	 * @return void
	 */
	public function setFeuser($feuser) {
		$this->feuser = $feuser;
	}

	/**
	 * Returns the matchid
	 *
	 * @return Tx_Ccore_Domain_Model_Match $matchid
	 */
	public function getMatchid() {
		return $this->matchid;
	}

	/**
	 * Sets the matchid
	 *
	 * @param Tx_Ccore_Domain_Model_Match $matchid
	 * @return void
	 */
	public function setMatchid(Tx_Ccore_Domain_Model_Match $matchid) {
		$this->matchid = $matchid;
	}

}
?>