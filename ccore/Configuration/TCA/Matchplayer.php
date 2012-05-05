<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_ccore_domain_model_matchplayer'] = array(
	'ctrl' => $TCA['tx_ccore_domain_model_matchplayer']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'hidden, playerid, race, team',
	),
	'types' => array(
		'1' => array('showitem' => 'hidden;;1, playerid, race, team'),
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
		'resultid' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
		'playerid' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_matchplayer.playerid',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_ccore_domain_model_player',
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
							'table' => 'tx_ccore_domain_model_player',
							'pid' => '###CURRENT_PID###',
							'setValue' => 'prepend'
						),
						'script' => 'wizard_add.php',
					)
				)
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
		'team' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_matchplayer.team',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('Team A', 0),
					array('Team B', 1)
				),
			),
		),
	),
);
?>