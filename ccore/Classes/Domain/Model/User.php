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
class Tx_Ccore_Domain_Model_User extends Tx_Extbase_Domain_Model_FrontendUser {
	/**
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Ccore_Domain_Model_Squad>
	 */
	protected $usergroup;
	
	/**
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Ccore_Domain_Model_Point>
	 */
	protected $txccorepoints;
	
	/**
	 * Sets the usergroups. Keep in mind that the property is called "usergroup"
	 * although it can hold several usergroups.
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Ccore_Domain_Model_Squad> $usergroup An object storage containing the usergroups to add
	 * @return void
	 * @api
	 */
	public function setUsergroup(Tx_Extbase_Persistence_ObjectStorage $usergroup) {
		$this->usergroup = $usergroup;
	}

	/**
	 * Adds a usergroup to the frontend user
	 *
	 * @param Tx_Ccore_Domain_Model_Squad $usergroup
	 * @return void
	 * @api
	 */
	public function addUsergroup(Tx_Ccore_Domain_Model_Squad $usergroup) {
		$this->usergroup->attach($usergroup);
	}

	/**
	 * Removes a usergroup from the frontend user
	 *
	 * @param Tx_Ccore_Domain_Model_Squad $usergroup
	 * @return void
	 * @api
	 */
	public function removeUsergroup(Tx_Ccore_Domain_Model_Squad $usergroup) {
		$this->usergroup->detach($usergroup);
	}
	
	/**
	 * Gets the point(s)
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Ccore_Domain_Model_Point>
	 */
	public function getTxccorepoints() {
		return $this->txccorepoints;
	}
	
	/**
	 * Returns the number of points a user has
	 *
	 * @return int
	 */
	public function getCalcPoints() {
		$i = 0;
		foreach($this->txccorepoints as $obj) {
			$i += $obj->getValue();
		}
		return $i;
	}
	
	/**
	 * Sets the point(s)
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Ccore_Domain_Model_Point> $point Obj storage containing the points
	 * @return void
	 */
	public function setTxccorepoints(Tx_Extbase_Persistence_ObjectStorage $point) {
		$this->txccorepoints = $point;
	}
	
	/**
	 * Adds points to the user
	 *
	 * @param Tx_Ccore_Domain_Model_Point $point
	 * @return void
	 */
	public function addTxccorepoints(Tx_Ccore_Domain_Model_Point $point) {
		$this->txccorepoints->attach($point);
	}
	
	/**
	 * Removes points from the user
	 *
	 * @param Tx_Ccore_Domain_Model_Point $point
	 * @return void
	 */
	public function removeTxccorepoints(Tx_Ccore_Domain_Model_Point $point) {
		$this->txccorepoints->detach($point);
	}
}
?>