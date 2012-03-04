<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_ccore_domain_model_match'] = array(
	'ctrl' => $TCA['tx_ccore_domain_model_match']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'hidden, clanwar, matchdate, game, gamemode, clan_pro, clan_con, lname, llink, report, screenshots, matchresults',
	),
	'types' => array(
		'1' => array('showitem' => 'hidden, clanwar, matchdate, game, gamemode, clan_pro, clan_con, lname, llink, report, screenshots, matchresults'),
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
		'clanwar' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_match.clanwar',
			'config' => array(
				'type' => 'check',
			),
		),
		'matchdate' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_match.matchdate',
			'config' => array(
				'type' => 'input',
				'size' => 12,
				'max' => 20,
				'eval' => 'datetime,required',
				'checkbox' => 1,
				'default' => time()
			),
		),
		'game' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_match.game',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_ccore_domain_model_game',
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
		'gamemode' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_match.gamemode',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_ccore_domain_model_gamemode',
				'minitems' => 0,
				'maxitems' => 1,
				'wizards' => array(
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
		'clan_pro' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_match.clan_pro',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_ccore_domain_model_clan',
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
		'clan_con' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_match.clan_con',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_ccore_domain_model_clan',
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
		'lname' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_match.lname',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'llink' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_match.llink',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim',
				'wizards'	=> array(
					'_PADDING'	=> 2,
					'link'		=> array(
						'type'			=> 'popup',
						'title'			=> 'Link',
						'icon'			=> 'link_popup.gif',
						'script'		=> 'browse_links.php?mode=wizard',
						'JSopenParams'	=> 'height=300,width=500,status=0,menubar=0,scrollbars=1'
					)
				)
			)
		),
		'report' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_match.report',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim',
				'wizards' => array(
	      			'_PADDING' => 4,
	      			'RTE' => array(
	      				'notNewRecords' => 1,
	      				'RTEonly' => 1,
	      				'type' => 'script',
	      				'title' => 'LLL:EXT:cms/locallang_ttc.php:bodytext.W.RTE',
	      				'icon' => 'wizard_rte2.gif',
	      				'script' => 'wizard_rte.php',
	      			),
	      		),
			),
			'defaultExtras' => 'richtext[]:rte_transform[mode=ts_css]'
		),
		'screenshots' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_match.screenshots',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_ccore_domain_model_matchscreenshot',
				'foreign_field' => 'matchid',
				'appearance' => array(
					'collapseAll' => 1,
					'expandSingle' => 1
				)
			)
		),
		'matchresults' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_match.matchresults',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_ccore_domain_model_matchresult',
				'foreign_field' => 'matchid',
				'appearance' => array(
					'collapseAll' => 1,
					'expandSingle' => 1
				)
			)
		)
	)
);
?>