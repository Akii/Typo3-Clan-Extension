<?php
if(!defined('TYPO3_MODE')) die('Access denied.');

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Matchlist',
	array('Match' => 'matchList, showMatch'),
	array('Match' => 'matchList, showMatch')
);

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Latestmatch',
	array('Match' => 'lastMatches'),
	array('Match' => 'lastMatches')
);
?>