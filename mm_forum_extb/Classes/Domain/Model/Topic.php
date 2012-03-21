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
class Tx_MmForumExtb_Domain_Model_Topic extends Tx_Extbase_DomainObject_AbstractValueObject {
	
	/**
	 * @var string
	 */
	protected $topicTitle;
	
	/**
	 * @var Tx_Extbase_Domain_Model_FrontendUser
	 */
	protected $topicPoster;
	
	/**
	 * @var int
	 */
	protected $topicTime;
	
	/**
	 * @var int
	 */
	protected $topicViews;
	
	/**
	 * @var int
	 */
	protected $topicReplies;
	
	/**
	 * @var int
	 */
	protected $topicLastPostId;
	
	/**
	 * @var Tx_MmForumExtb_Domain_Model_Forum
	 */
	protected $forumId;
	
	/**
	 * @var int
	 */
	protected $topicFirstPostId;
	
	/**
	 * @var string
	 */
	protected $topicIs;
	
	/**
	 * @var boolean
	 */
	protected $solved;
	
	/**
	 * @var boolean
	 */
	protected $readFlag;
	
	/**
	 * @var boolean
	 */
	protected $atTopFlag;
	
	/**
	 * @var boolean
	 */
	protected $closedFlag;
	
	/**
	 * @return string
	 */
	public function getTopicTitle() { return $this->topicTitle; }
	
	/**
	 * @param string $title
	 * @return void
	 */
	public function setTopicTitle($title) {
		$this->topicTitle = $title;
	}
	
	/**
	 * @return int
	 */
	public function getTopicReplies() { return $this->topicReplies; }
	
	/**
	 * @param int $replies
	 * @return void
	 */
	public function setTopicReplies($replies) {
		$this->topicReplies = $replies;
	}
	
	/**
	 * @return Tx_MmForumExtb_Domain_Model_Forum
	 */
	public function getForumId() { return $this->forumId; }
	
	/**
	 * @param Tx_MmForumExtb_Domain_Model_Forum $forum
	 * @return void
	 */
	public function setForumId(Tx_MmForumExtb_Domain_Model_Forum $forum) {
		$this->forumId = $forum;
	}
}
?>