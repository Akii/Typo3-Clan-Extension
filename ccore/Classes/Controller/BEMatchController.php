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
class Tx_Ccore_Controller_BEMatchController extends Tx_Ccore_Controller_AbstractController {

	/**
	 * matchRepository
	 *
	 * @var Tx_Ccore_Domain_Repository_MatchRepository
	 */
	protected $matchRepository;

	/**
	 * injectMatchRepository
	 *
	 * @param Tx_Ccore_Domain_Repository_MatchRepository $matchRepository
	 * @return void
	 */
	public function injectMatchRepository(Tx_Ccore_Domain_Repository_MatchRepository $matchRepository) {
		$this->matchRepository = $matchRepository;
	}

	/**
	 * action show
	 *
	 * @param $match
	 * @return void
	 */
	public function showAction(Tx_Ccore_Domain_Model_Match $match) {
		$this->view->assign('_tablename', 'tx_ccore_domain_model_match');
		$this->view->assign('_uid', $match->getUid());
		
		$this->view->assign('match', $match);
	}

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$this->view->assign('_tablename', 'tx_ccore_domain_model_match');
	
		$matches = $this->matchRepository->findAll();
		$this->view->assign('matches', $matches);
	}
	
	/**
	 * action new
	 *
	 * @param $newMatch
	 * @dontvalidate $newMatch
	 * @return void
	 */
	public function newAction(Tx_Ccore_Domain_Model_Match $newMatch = NULL) {
		$this->view->assign('newMatch', $newMatch);
	}

	/**
	 * action create
	 *
	 * @param $newMatch
	 * @return void
	 */
	public function createAction(Tx_Ccore_Domain_Model_Match $newMatch) {
		$this->matchRepository->add($newMatch);
		$this->flashMessageContainer->add('Your new Match was created.');
		$this->redirect('list');
	}

	/**
	 * action edit
	 *
	 * @param $match
	 * @return void
	 */
	public function editAction(Tx_Ccore_Domain_Model_Match $match) {
		$this->view->assign('match', $match);
	}

	/**
	 * action update
	 *
	 * @param $match
	 * @return void
	 */
	public function updateAction(Tx_Ccore_Domain_Model_Match $match) {
		$this->matchRepository->update($match);
		$this->flashMessageContainer->add('Your Match was updated.');
		$this->redirect('list');
	}

	/**
	 * action delete
	 *
	 * @param $match
	 * @return void
	 */
	public function deleteAction(Tx_Ccore_Domain_Model_Match $match) {
		$this->matchRepository->remove($match);
		$this->flashMessageContainer->add('Your Match was removed.');
		$this->redirect('list');
	}

}
?>