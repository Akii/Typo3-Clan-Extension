<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2011 Alex Kellner <alexander.kellner@in2code.de>
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
 * View helper for RTE
 *
 * @package TYPO3
 * @subpackage Fluid
 */
class Tx_Ccore_ViewHelpers_RteViewHelper extends Tx_Fluid_ViewHelpers_Form_AbstractFormFieldViewHelper {

	public $RTEcounter = 0;
	public $strEntryField;
	public $thePidValue;
	public $preJsRTE;
	public $postJsRTE;
	public $submitJsRTE;
	public $PA = array();

	/**
	 * Return RTE
	 *
	 * @param	string	$name		Field name
	 * @param	string	$namePrefix	Name prefix (tx_ext_pi1[object])
	 * @param	boolean	$isLast		Is last flag (generate JavaScript only for the last RTE)
	 * @param	string	$value		Any value
	 * @return 	string	Generated RTE content
	 */
	public function render($name, $namePrefix, $isLast = 1, $value = '') {
		// config
		require_once(t3lib_extMgm::extPath('rtehtmlarea') . 'pi2/class.tx_rtehtmlarea_pi2.php');
		if (!$this->RTEobj) {
			$this->RTEObj = t3lib_div::makeInstance('tx_rtehtmlarea_pi2');
		}
		$this->RTEcounter++;
		$this->strEntryField = $name;
		$this->PA['itemFormElName'] = $namePrefix . '[rte]';
		$this->PA['itemFormElValue'] = $value;
		$this->thePidValue = $GLOBALS['TSFE']->id;
		$this->registerFieldNameForFormTokenGeneration($namePrefix . '[_TRANSFORM_rte]');
		$this->registerFieldNameForFormTokenGeneration($namePrefix . '[rte]');

		// let's go
		$RTEItem = $this->RTEObj->drawRTE(
			$this,
			'',
			$this->strEntryField,
			$row = array(),
			$this->PA,
			$this->specConf,
			$this->thisConfig,
			$this->RTEtypeVal,
			'',
			$this->thePidValue
		);

		$this->preJsRTE = $this->additionalJS_initial . '<script type="text/javascript">' . implode(chr(10), $this->additionalJS_pre) . '</script>';
		$this->postJsRTE = '<script type="text/javascript">' . implode(chr(10), $this->additionalJS_post) . '</script>';
		$this->submitJsRTE = '<script type="text/javascript">function rteMove(){' . implode(';', $this->additionalJS_submit) . '}</script>';
		if (!$isLast) {
			$this->preJsRT = $this->postJsRTE = $this->submitJsRTE = '';
		}

		return $this->preJsRTE . $RTEItem . $this->postJsRTE . $this->submitJsRTE;
	}

	/**
	 * Initialize the arguments.
	 */
	public function initializeArguments() {
	}
}
?>