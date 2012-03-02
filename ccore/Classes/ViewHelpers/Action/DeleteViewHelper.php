<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2011 Akii
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Creates links to backend edit/new forms
 */
class Tx_Ccore_ViewHelpers_Action_DeleteViewHelper extends Tx_Fluid_Core_ViewHelper_TagBasedViewHelper {

	/**
	 * @var string
	 */
	protected $tagName = 'a';

	/**
	 * Initialize arguments
	 *
	 * @return void
	 */
	public function initializeArguments() {
		parent::initializeArguments();

		$this->registerUniversalTagAttributes();
	}

	/**
	 * Does things…
	 * @param string $tablename Name of the table
	 * @param int $uid ID of the record
	 */
	public function render($tablename, $uid) {
		global $GLOBALS;
		
		$params = '&cmd['.$tablename.']['.intval($uid).'][delete]=1';
		$js = 'if(confirm('.$GLOBALS['LANG']->JScharCode('Are you sure you want to delete this record?'.t3lib_BEfunc::referenceCount($tablename,$uid,' (There are %s reference(s) to this record!)')).')) {jumpToUrl(\''.$GLOBALS['SOBE']->doc->issueCommand($params).'\');} return false;';
		
		// localization
		$label = Tx_Extbase_Utility_Localization::translate(
			'LLL:EXT:ccore/Resources/Private/Language/locallang.xml:' .$tablename. '.delete_label',
			'Ccore'
		);
		
		
		$this->tag->addAttribute('href', '#');
		$this->tag->addAttribute('onClick', $js);
		$this->tag->addAttribute('title', $label);
		$this->tag->setContent($this->renderChildren());
		$this->tag->forceClosingTag(TRUE);
		
		return $this->tag->render();
	}
}


?>