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
	 * mapRepository
	 *
	 * @var Tx_Ccore_Domain_Repository_MapRepository
	 */
	protected $mapRepository;

	/**
	 * Make sure we have a MapRepository
	 */
	public function initializeAction() {
		parent::initializeAction();
		
		$this->injectMapRepository(t3lib_div::makeInstance('Tx_Ccore_Domain_Repository_MapRepository'));
	}
	
	public function initializeView(Tx_Extbase_MVC_View_ViewInterface $view) {
		parent::initializeView($view);
		
		$this->view->assign('tablename', 'tx_ccore_domain_model_game');
	}

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
	 * injectMapRepository
	 *
	 * @param Tx_Ccore_Domain_Repository_MapRepository $mapRepository
	 * @return void
	 */
	public function injectMapRepository(Tx_Ccore_Domain_Repository_MapRepository $mapRepository) {
		$this->mapRepository = $mapRepository;
	}

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$this->gameListAction();
		$this->mapListAction();
	}
	
	/**
	 * action gameList
	 *
	 * @return void
	 */
	public function gameListAction() {
		$games = $this->gameRepository->findAll();
		$this->view->assign('games', $games);
	}
	
	/**
	 * action mapList
	 *
	 * @return void
	 */
	public function mapListAction() {
		$args = $this->request->getArguments();
		$search = $args['searchform']['search'];
		
		if($search != "") {
			$maps = $this->mapRepository->searchByMapname($search);
		} else {
			$maps = $this->mapRepository->findAll();
		}
		
		$this->view->assign('maps', $maps);
	}
}
?>