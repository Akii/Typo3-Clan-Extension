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
 * @package mm_forum_extb
 * @license http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public License, version 3 or later
 *
 */
class Tx_MmForumExtb_Controller_ForumController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * @var Tx_MmForumExtb_Domain_Repository_TopicRepository
	 */
	protected $topicRepository;
	
	public function initializeAction() {
		parent::initializeAction();
		
		$this->injectTopicRepository(t3lib_div::makeInstance('Tx_MmForumExtb_Domain_Repository_TopicRepository'));
	}
	
	public function injectTopicRepository(Tx_MmForumExtb_Domain_Repository_TopicRepository $obj) {
		$this->topicRepository = $obj;
	}
	
	public function listAction() {
		$this->view->assign('topics', $this->topicRepository->findAll());
	}
	
}
?>