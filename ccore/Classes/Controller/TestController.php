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
class Tx_Ccore_Controller_TestController extends Tx_Ccore_Controller_AbstractController {

	/**
	 * matchRepository
	 *
	 * @var Tx_Ccore_Domain_Repository_MatchRepository
	 */
	protected $matchRepository;
	
	/**
	 * gameRepository
	 *
	 * @var Tx_Ccore_Domain_Repository_GameRepository
	 */
	protected $gameRepository;

	/**
	 * injectMatchRepository
	 *
	 * @param Tx_Ccore_Domain_Repository_MapRepository $matchRepository
	 * @return void
	 */
	public function injectMapRepository(Tx_Ccore_Domain_Repository_MapRepository $matchRepository) {
		$this->matchRepository = $matchRepository;
	}
	
	/**
	 * injectGameRepository
	 *
	 * @param Tx_Ccore_Domain_Repository_GameRepository $matchRepository
	 * @return void
	 */
	public function injectGameRepository(Tx_Ccore_Domain_Repository_GameRepository $matchRepository) {
		$this->gameRepository = $matchRepository;
	}
	
	/**
	 * @param Tx_Ccore_Domain_Model_Map $map
	 */
	public function newAction(Tx_Ccore_Domain_Model_Map $map = NULL) {
		$this->view->assign('test', 'test');
		
		$this->injectGameRepository(t3lib_div::makeInstance('Tx_Ccore_Domain_Repository_GameRepository'));
		
		$games = $this->gameRepository->findAll();
		
		$this->view->assign('games', $games);
	}
	
	/**
	 * @param Tx_Ccore_Domain_Model_Map $map
	 * @return void
	 */
	public function createAction(Tx_Ccore_Domain_Model_Map $map) {
		$this->matchRepository->add($map);
	}

}
?>