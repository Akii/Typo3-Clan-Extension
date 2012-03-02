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
class Tx_Ccore_ViewHelpers_IconViewHelper extends Tx_Fluid_Core_ViewHelper_TagBasedViewHelper {

	/**
	 * @var string
	 */
	protected $tagName = 'img';

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
	 * @param string $file Path/Filename to the icon/image
	 * @param int $width Width of the icon
	 * @param int $height Height of the icon
	 */
	public function render($file, $width=16, $height=16) {
		$file = t3lib_extMgm::extRelPath('ccore').'Resources/Public/Icons/'.$file;
		
		$this->tag->addAttribute('src', $file);
		$this->tag->addAttribute('width', $width);
		$this->tag->addAttribute('height', $height);
		
		$this->tag->setContent($this->renderChildren());
		
		return $this->tag->render();
	}
}


?>