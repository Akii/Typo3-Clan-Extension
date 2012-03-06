<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_ccore_domain_model_matchplayer'] = array(
	'ctrl' => $TCA['tx_ccore_domain_model_matchplayer']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'hidden, name, race, languagetag, feuser, matchid',
	),
	'types' => array(
		'1' => array('showitem' => 'hidden;;1, name, race, languagetag, feuser, matchid'),
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
			'label' => 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_matchplayer.name',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'languagetag' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_matchplayer.languagetag',
			'config' => array(
				'type' => 'input',
				'size' => 2,
				'max' => 2,
				'eval' => 'trim,required'
			),
		),
		'race' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_matchplayer.race',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('---', 0)
				),
				'foreign_table' => 'tx_ccore_domain_model_race',
				'minitems' => 0,
				'maxitems' => 1,
				'wizards' => array(
					'_PADDING' => 1,
					'_VERTICAL' => 1,
					'add' => Array(
						'type' => 'script',
						'title' => 'Create new',
						'icon' => 'add.gif',
						'params' => array(
							'table' => 'tx_ccore_domain_model_race',
							'pid' => '###CURRENT_PID###',
							'setValue' => 'prepend'
						),
						'script' => 'wizard_add.php',
					)
				)
			),
		),
		'feuser' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_matchplayer.feuser',
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
		'matchid' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_matchplayer.matchid',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_ccore_domain_model_match',
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
	),
);
?>