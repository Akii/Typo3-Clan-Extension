<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2011 Armin Ruediger Vieweg <info@professorweb.de>
*
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
 * This widget is a copy of the fluid paginate widget. Now it's possible to
 * use arrays with paginate, not only query results.
 *
 * @author     Armin Rüdiger Vieweg <info@professorweb.de>
 * @copyright  2011 Copyright belongs to the respective authors
 * @license    http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class Tx_Ccore_ViewHelpers_Widget_PaginateViewHelper extends Tx_Fluid_Core_Widget_AbstractWidgetViewHelper {

	/**
	 * @var Tx_Ccore_ViewHelpers_Widget_Controller_PaginateController
	 */
	protected $controller;

	/**
	 * Injection of widget controller
	 * 
	 * @param Tx_Ccore_ViewHelpers_Widget_Controller_PaginateController $controller
	 * @return void
	 */
	public function injectController(Tx_Ccore_ViewHelpers_Widget_Controller_PaginateController $controller) {
		$this->controller = $controller;
	}

	/**
	 * The render method of widget
	 *
	 * @param mixed $objects Tx_Extbase_Persistence_QueryResultInterface,
	 *        Tx_Extbase_Persistence_ObjectStorage object or array
	 * @param string $as
	 * @param array $configuration
	 * @return string
	 */
	public function render($objects, $as, array $configuration = array('itemsPerPage' => 10, 'insertAbove' => FALSE, 'insertBelow' => TRUE)) {
		return $this->initiateSubRequest();
	}
}
?>