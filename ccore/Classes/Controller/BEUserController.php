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
class Tx_Ccore_Controller_BEUserController extends Tx_Ccore_Controller_AbstractController {

	/**
	 * squadRepository
	 *
	 * @var Tx_Ccore_Domain_Repository_SquadRepository
	 */
	protected $squadRepository;
	
	/**
	 * userRepository
	 *
	 * @var Tx_Ccore_Domain_Repository_UserRepository
	 */
	protected $userRepository;
	
	public function initializeAction() {
		parent::initializeAction();
		
		$this->injectUserRepository(t3lib_div::makeInstance('Tx_Ccore_Domain_Repository_UserRepository'));
	}
	
	/**
	 * injectSquadRepository
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
		$this->view->assign('_tablename', 'fe_users');
		
		$args = $this->request->getArguments();
		$search = $args['searchform']['search'];
		
		if($search != "") {
			$users = $this->userRepository->searchByUsername($search);
		} else {
			$users = $this->userRepository->findAll();
		}
		
		$this->view->assign('users', $users);
	}
	
	/**
	 * action show
	 *
	 * @param Tx_Ccore_Domain_Model_User $user
	 * @return void
	 */
	public function showAction(Tx_Ccore_Domain_Model_User $user) {
		$this->view->assign('_tablename', 'fe_users');
		$this->view->assign('_uid', $user->getUid());
		
		$this->view->assign('user', $user);
	}
	
	/**
	 * action delete
	 *
	 * @param $match
	 * @return void
	 */
	public function deleteAction(Tx_Ccore_Domain_Model_User $user) {
		$this->userRepository->remove($user);
		$this->flashMessageContainer->add('The User '.$user->getUsername().' was removed.');
		$this->redirect('list');
	}

}
?>