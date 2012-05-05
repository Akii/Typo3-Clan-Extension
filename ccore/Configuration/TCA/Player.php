<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_ccore_domain_model_player'] = array(
	'ctrl' => $TCA['tx_ccore_domain_model_player']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'hidden, name, languagetag, feuserid',
	),
	'types' => array(
		'1' => array('showitem' => 'hidden;;1, name, languagetag, feuserid'),
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
			'label' => 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_player.name',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'languagetag' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_player.languagetag',
			'config' => array(
				'type' => 'input',
				'size' => 2,
				'max' => 2,
				'eval' => 'trim,required'
			),
		),
		'feuserid' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_player.feuserid',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('---', 0)
				),
				'foreign_table' => 'fe_users',
				'maxitems' => 1,
				'multiple' => 0,
			),
		),
	),
);
?>