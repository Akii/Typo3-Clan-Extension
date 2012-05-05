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
class Tx_Ccore_Controller_BEMatchdataController extends Tx_Ccore_Controller_AbstractController {

	/**
	 * matchRepository
	 *
	 * @var Tx_Ccore_Domain_Repository_MatchdataRepository
	 */
	protected $matchdataRepository;
	
	/**
	 * gameRepository
	 *
	 * @var Tx_Ccore_Domain_Repository_GameRepository
	 */
    protected $gameRepository;
    
    /**
     * leagueRepository
     *
     * @var Tx_Ccore_Domain_Repository_LeagueRepository
     */
    protected $leagueRepository;
    
    /**
     * Make sure all the repositories are loaded
     */
    public function initializeAction() {
		parent::initializeAction();
		
		$this->injectGameRepository(t3lib_div::makeInstance('Tx_Ccore_Domain_Repository_GameRepository'));
		$this->injectClanRepository(t3lib_div::makeInstance('Tx_Ccore_Domain_Repository_ClanRepository'));
		$this->injectLeagueRepository(t3lib_div::makeInstance('Tx_Ccore_Domain_Repository_LeagueRepository'));
    }

	/**
	 * injectMatchdataRepository
	 *
	 * @param Tx_Ccore_Domain_Repository_MatchdataRepository $matchdataRepository
	 * @return void
	 */
	public function injectMatchRepository(Tx_Ccore_Domain_Repository_MatchdataRepository $matchdataRepository) {
		$this->matchdataRepository = $matchdataRepository;
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
	 * injectClanRepository
	 *
	 * @param Tx_Ccore_Domain_Repository_ClanRepository $clanRepository
	 * @return void
	 */
	public function injectClanRepository(Tx_Ccore_Domain_Repository_ClanRepository $clanRepository) {
		$this->clanRepository = $clanRepository;
	}
	
	/**
	 * injectLeagueRepository
	 *
	 * @param Tx_Ccore_Domain_Repository_LeagueRepository $league
	 * @return void
	 */
    public function injectLeagueRepository(Tx_Ccore_Domain_Repository_LeagueRepository $league) {
        $this->leagueRepository = $league;
    }

	/**
	 * action show
	 *
	 * @param $match
	 * @return void
	 */
	public function showAction(Tx_Ccore_Domain_Model_Matchdata $match) {
		$this->view->assign('tablename', 'tx_ccore_domain_model_matchdata');
		$this->view->assign('uid', $match->getUid());
		
		$this->view->assign('matchdata', $match);
	}

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$this->view->assign('tablename', 'tx_ccore_domain_model_matchdata');
	
		$matches = $this->matchdataRepository->findAll();
		$this->view->assign('matchdata', $matches);
	}
	
	/**
	 * action new
	 *
	 * @param Tx_Ccore_Domain_Model_Matchdata $newMatchdata
	 * @dontvalidate $newMatchdata
	 * @return void
	 */
    public function newAction(Tx_Ccore_Domain_Model_Matchdata $newMatchdata = NULL) {
        if($newMatchdata == NULL) {
            $newMatchdata = new Tx_Ccore_Domain_Model_Matchdata();
            $newMatchdata->setMatchdate(time());
        }
        
        // silly checkbox bug geez fix your stuff man!
        $newMatchdata->setDisableComments((bool) $newMatchdata->getDisableComments());
        
        $this->view->assign('games', $this->gameRepository->findAll());
        $this->view->assign('clans', $this->clanRepository->findAll());
        $this->view->assign('leagues', $this->leagueRepository->findAll());
        $this->view->assign('newMatchdata', $newMatchdata);
    }
    
    /**
     * action create
     *
     * @param Tx_Ccore_Domain_Model_Matchdata $newMatchdata
     * @return void
     */
    public function createAction(Tx_Ccore_Domain_Model_Matchdata $newMatchdata) {
        $this->matchdataRepository->add($newMatchdata);
        $this->redirect('list');
    }
	 
}
?>