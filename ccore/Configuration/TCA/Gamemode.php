<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_ccore_domain_model_gamemode'] = array(
	'ctrl' => $TCA['tx_ccore_domain_model_gamemode']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'hidden, name',
	),
	'types' => array(
		'1' => array('showitem' => 'hidden;;1, name'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'name' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_gamemode.name',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
	),
);
?>