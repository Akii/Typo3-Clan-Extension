<?php
if(!defined('TYPO3_MODE')) die('Access denied.');

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Matchlist',
	array('Match' => 'list')
);

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Ucp',
	array('Ucp' => 'list')
);
?>