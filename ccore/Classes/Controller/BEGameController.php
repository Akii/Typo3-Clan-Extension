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
class Tx_Ccore_Controller_BEGameController extends Tx_Ccore_Controller_AbstractController {

	/**
	 * gameRepository
	 *
	 * @var Tx_Ccore_Domain_Repository_GameRepository
	 */
	protected $gameRepository;

	/**
	 * injectGameRepository
	 *
	 * @param Tx_Ccore_Domain_Repository_GameRepository $gameRepository
	 * @return void
	 */
	public function injectGameRepository(Tx_Ccore_Domain_Repository_GameRepository $gameRepository) {
		$this->gameRepository = $gameRepository;
	}

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$this->view->assign('_tablename', 'tx_ccore_domain_model_game');
	
		$games = $this->gameRepository->findAll();
		$this->view->assign('games', $games);
	}
	
	/**
	 * action show
	 *
	 * @param $game
	 * @return void
	 */
	public function showAction(Tx_Ccore_Domain_Model_Game $game) {
		$this->view->assign('_tablename', 'tx_ccore_domain_model_game');
		$this->view->assign('_uid', $game->getUid());
		
		$this->view->assign('game', $game);
	}
	
	/**
	 * action new
	 *
	 * @param $newGame
	 * @dontvalidate $newGame
	 * @return void
	 */
	public function newAction(Tx_Ccore_Domain_Model_Game $newGame = NULL) {
		$this->view->assign('newGame', $newGame);
	}

	/**
	 * action create
	 *
	 * @param $newGame
	 * @return void
	 */
	public function createAction(Tx_Ccore_Domain_Model_Game $newGame) {
		$this->gameRepository->add($newGame);
		$this->flashMessageContainer->add('Your new Game was created.');
		$this->redirect('list');
	}

	/**
	 * action edit
	 *
	 * @param $game
	 * @return void
	 */
	public function editAction(Tx_Ccore_Domain_Model_Game $game) {
		$this->view->assign('game', $game);
	}

	/**
	 * action update
	 *
	 * @param $game
	 * @return void
	 */
	public function updateAction(Tx_Ccore_Domain_Model_Game $game) {
		$this->gameRepository->update($game);
		$this->flashMessageContainer->add('Your Game was updated.');
		$this->redirect('list');
	}

	/**
	 * action delete
	 *
	 * @param $game
	 * @return void
	 */
	public function deleteAction(Tx_Ccore_Domain_Model_Game $game) {
		$this->gameRepository->remove($game);
		$this->flashMessageContainer->add('Your Game was removed.');
		$this->redirect('list');
	}

}
?>