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
class Tx_Ccore_Controller_BEClanController extends Tx_Ccore_Controller_AbstractController {

	/**
	 * clanRepository
	 *
	 * @var Tx_Ccore_Domain_Repository_ClanRepository
	 */
	protected $clanRepository;
	
	/**
	 * squadRepository
	 *
	 * @var Tx_Ccore_Domain_Repository_SquadRepository
	 */
	protected $squadRepository;
	
	/**
	 * @var Tx_Ccore_Domain_Repository_UserRepository
	 */
	protected $userRepository;
	
	public function initializeAction() {
		parent::initializeAction();
		
		$this->injectSquadRepository(t3lib_div::makeInstance('Tx_Ccore_Domain_Repository_SquadRepository'));
		$this->injectUserRepository(t3lib_div::makeInstance('Tx_Ccore_Domain_Repository_UserRepository'));
	}
	
	/**
	 * injectClanRepository
	 *
	 * @param Tx_Ccore_Domain_Repository_ClanRepository $clanRepository
	 * @return void
	 */
	public function injectClanRepository(Tx_Ccore_Domain_Repository_ClanRepository $clanRepository) {
		$this->clanRepository = $clanRepository;
	}
	
	/**
	 * injectClanRepository
	 *
	 * @param Tx_Ccore_Domain_Repository_SquadRepository $squadRepository
	 * @return void
	 */
	public function injectSquadRepository(Tx_Ccore_Domain_Repository_SquadRepository $squadRepository) {
		$this->squadRepository = $squadRepository;
	}
	
	/**
	 * injectUserRepository
	 *
	 * @param Tx_Ccore_Domain_Repository_UserRepository $userRepository
	 * @return void
	 */
	public function injectUserRepository(Tx_Ccore_Domain_Repository_UserRepository $userRepository) {
		$this->userRepository = $userRepository;
	}

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$this->view->assign('_tablename', 'tx_ccore_domain_model_clan');
		
		$clans = $this->clanRepository->findAll();
		$this->view->assign('clans', $clans);
		
		$squads = $this->squadRepository->findAllSquads();
		$this->view->assign('squads', $squads);
	}
	
	/**
	 * action showSquad
	 *
	 * @param $squad
	 * @return void
	 */
	public function showSquadAction(Tx_Ccore_Domain_Model_Squad $squad) {
		$this->view->assign('_tablename', 'fe_groups');
		$this->view->assign('_uid', $squad->getUid());
		
		$this->view->assign('squad', $squad);
		
		$players = $this->userRepository->findSquadMembers($squad);
		$this->view->assign('players', $players);
	}

}
?>