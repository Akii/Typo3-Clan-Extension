<?php
if(!defined('TYPO3_MODE')) die ('Access denied.');

Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Latesttopics',
	'mm_forum :: Latest Threads'
);

t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'mm_forum Extbase');

//t3lib_div::loadTCA('tx_mmforum_topics');
?>