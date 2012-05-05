<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_ccore_domain_model_match'] = array(
	'ctrl' => $TCA['tx_ccore_domain_model_match']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'hidden, matchdataid, gamemodeid, playerproid, playerconid, rounds, tx_extbase_type',
	),
	'types' => array(
		'0' => array('showitem' => 'hidden, matchdataid, gamemodeid, playerproid, playerconid, --div--;LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_match.rounds, rounds, --div--;LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_match.div_internal, tx_extbase_type'),
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
		'matchdataid' => array(
		    'exclude' => 0,
		    'label' => 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_match.matchdataid',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_ccore_domain_model_matchdata',
			),
		),
		'gamemodeid' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_match.gamemodeid',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_ccore_domain_model_gamemode',
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
							'table' => 'tx_ccore_domain_model_gamemode',
							'pid' => '###CURRENT_PID###',
							'setValue' => 'prepend'
							),
						'script' => 'wizard_add.php',
					)
				)
			)
		),
		'playerproid' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_match.playerproid',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_ccore_domain_model_matchplayer',
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
		'playerconid' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_match.playerconid',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_ccore_domain_model_matchplayer',
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
		'rounds' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_match.rounds',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_ccore_domain_model_matchresult',
				'foreign_field' => 'matchid',
		        'foreign_sortby' => 'sorting',
				'appearance' => array(
					'collapseAll' => 1,
					'expandSingle' => 1
				)
			)
		),
		# TODO: make a select out of this and insert the static values
		'tx_extbase_type' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_match.tx_extbase_type',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim',
			)
		),
	)
);
?>