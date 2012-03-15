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
 * Responsible for displaying matches on the FE
 *
 * @package ccore
 * @license http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public License, version 3 or later
 *
 */
class Tx_Ccore_Controller_MatchController extends Tx_Ccore_Controller_AbstractController {

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
	 * fetches all matches to display
	 *
	 * @return void
	 */
	public function matchListAction() {
		$this->view->assign('matches', $this->matchRepository->findAll());
	}
	
	/**
	 * displays the last matches
	 *
	 * @return void
	 */
	public function lastMatchesAction() {
		$this->matchListAction();
	}
	
	/**
	 * displays match details
	 * in case no $match is passed, a list is shown
	 * is a router for custom templates/views like sc2/lol
	 *
	 * @param Tx_Ccore_Domain_Model_Match $match
	 * @return void
	 */
	public function showMatchAction(Tx_Ccore_Domain_Model_Match $match = NULL) {
		if($match === null) {
			//$this->flashMessages->add('No match found.*');
			$this->forward('matchList');
		}
		
		if($match->getGame()->getTag() == "sc2")
			$this->forward('showSc2Match', null, null, array('match' => $match));
		//elseif($match->getGame()->getTag() == "sc2")
		
		$this->view->assign('match', $match);
	}
	
	/**
	 * custom view for sc2 matches
	 *
	 * @param Tx_Ccore_Domain_Model_Match $match
	 * @return void
	 */
	public function showSc2MatchAction(Tx_Ccore_Domain_Model_Match $match) {
		$this->view->assign('match', $match);
	}
	
	/**
	 * custom view for LoL matches
	 *
	 * @param Tx_Ccore_Domain_Model_Match $match
	 * @return void
	 */
	 public function showLolMatchAction(Tx_Ccore_Domain_Model_Match $match) {
		$this->view->assign('match', $match);
	}
}
?>