<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_ccore_domain_model_matchresult'] = array(
	'ctrl' => $TCA['tx_ccore_domain_model_matchresult']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'hidden, roundnum, mapid, resultpro, resultcon, matchid, players',
	),
	'types' => array(
		'1' => array('showitem' => 'hidden;;1, roundnum, mapid, resultpro, resultcon, matchid, players'),
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
		'roundnum' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_matchresult.roundnum',
			'config' => array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'int,required'
			),
		),
		'resultpro' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_matchresult.resultpro',
			'config' => array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'int'
			),
		),
		'resultcon' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_matchresult.resultcon',
			'config' => array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'int'
			),
		),
		'matchid' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_matchresult.matchid',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_ccore_domain_model_match',
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
		'mapid' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_matchresult.mapid',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_ccore_domain_model_map',
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
							'table' => 'tx_ccore_domain_model_map',
							'pid' => '###CURRENT_PID###',
							'setValue' => 'prepend'
						),
						'script' => 'wizard_add.php',
					)
				)
			),
		),
		'players' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_matchresult.players',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_ccore_domain_model_matchplayer',
				'foreign_field' => 'resultid'
			)
		),
	),
);
?>