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
class Tx_Ccore_Domain_Repository_UserRepository extends Tx_Extbase_Domain_Repository_FrontendUserRepository {
	
	public function findAll() {
        $query = $this->createQuery();
        $query->getQuerySettings()->setRespectEnableFields(false);
        return $query->execute();
	}
	
	/**
	 * Finds all users in a usergroup (squad)
	 *
	 * @param Tx_Ccore_Domain_Model_Squad $squad
	 */
	public function findSquadMembers(Tx_Ccore_Domain_Model_Squad $squad) {
		$query = $this->createQuery();
        $query->getQuerySettings()->setRespectEnableFields(false);
		
		return $query
			->matching(
				$query->contains('usergroup', $squad->getUid())
			)
			->execute();
	}
	
	/**
	 * Search for username
	 *
	 * @param string $username Search query
	 */
	public function searchByUsername($username) {
		$query = $this->createQuery();
        $query->getQuerySettings()->setRespectEnableFields(false);
		
		return $query
			->matching(
				$query->like('username', '%'.$username.'%')
			)
			->execute();
	}
	
}
?>