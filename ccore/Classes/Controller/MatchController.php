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
	 * matchdataRepository
	 *
	 * @var Tx_Ccore_Domain_Repository_MatchdataRepository
	 */
	protected $matchdataRepository;

	/**
	 * injectMatchdataRepository
	 *
	 * @param Tx_Ccore_Domain_Repository_MatchdataRepository $matchdataRepository
	 * @return void
	 */
	public function injectMatchdataRepository(Tx_Ccore_Domain_Repository_MatchdataRepository $matchdataRepository) {
		$this->matchdataRepository = $matchdataRepository;
	}

	/**
	 * fetches all matches to display
	 *
	 * @return void
	 */
	public function matchListAction() {
		$this->view->assign('matchDetailPageUid', $this->settings['lastMatches']['matchDetailPage']);
		$this->view->assign('matches', $this->matchdataRepository->findAll());
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
	 * @param Tx_Ccore_Domain_Model_Matchdata $match
	 * @return void
	 */
	public function showMatchAction(Tx_Ccore_Domain_Model_Matchdata $match = NULL) {
		global $GLOBALS;
		
		if($match === null) {
			//$this->flashMessages->add('No match found.*');
			$this->forward('matchList');
		}
		
		// Dirty but probably faster than using extbase :)
		// Fetch the results of all matches played against clan contra
		/*$query = $GLOBALS['TYPO3_DB']->exec_SELECTquery(
			'matchid, SUM(resultpro - resultcon) as result',
			'tx_ccore_domain_model_matchresult',
			'matchid IN(SELECT uid FROM tx_ccore_domain_model_match 
									WHERE clan_con = '. intval($match->getClanCon()) .' 
									AND game = '. intval($match->getGame()->getUid()) .'
									AND gamemode = '. intval($match->getGamemode()->getUid()) .')',
			'matchid'
		);
		
		$won = $lost = $draw = 0;
		
		// calculate statistics
		while($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($query)) {
			if($row['result'] < 0) {
				$lost++;
			} else if($row['result'] == 0) {
				$draw++;
			} else {
				$won++;
			}
		}*/
		
		if($match->getGameid()->getTag() == "sc2")
			$this->forward('showSc2Match', null, null, array('match' => $match));
		if($match->getGameid()->getTag() == "LoL")
			$this->forward('showLolMatch', null, null, array('match' => $match));
		
		$this->view->assign('match', $match);
	}
	
	/**
	 * custom view for sc2 matches
	 *
	 * @param Tx_Ccore_Domain_Model_Matchdata $match
	 * @return void
	 */
	public function showSc2MatchAction(Tx_Ccore_Domain_Model_Matchdata $match) {
		$this->view->assign('match', $match);
	}
	
	/**
	 * custom view for LoL matches
	 *
	 * @param Tx_Ccore_Domain_Model_Matchdata $match
	 * @return void
	 */
	 public function showLolMatchAction(Tx_Ccore_Domain_Model_Matchdata $match) {
		$this->view->assign('match', $match);
	}
}
?>