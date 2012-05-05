<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_ccore_domain_model_matchdata'] = array(
	'ctrl' => $TCA['tx_ccore_domain_model_matchdata']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'hidden, disable_comments, matchdate, matchtype, gameid, clanproid, clanconid, leagueid, llink, matches, comments',
	),
	'types' => array(
		'1' => array('showitem' => 'hidden, disable_comments, matchdate, matchtype, gameid, clanproid, clanconid, leagueid, llink, --div--;LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_matchdata.div_matches, matches, --div--;LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_matchdata.comments, comments'),
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
		'disable_comments' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_matchdata.disable_comments',
			'config' => array(
				'type' => 'check',
			),
		),
		'matchdate' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_matchdata.matchdate',
			'config' => array(
				'type' => 'input',
				'size' => 12,
				'max' => 20,
				'eval' => 'datetime,required',
				'checkbox' => 1,
				'default' => time()
			),
		),
		'matchtype' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_matchdata.matchtype',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('1vs1', 0),
					array('Clanwar', 1),
				),
			),
		),
		'gameid' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_matchdata.gameid',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_ccore_domain_model_game',
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
							'table' => 'tx_ccore_domain_model_game',
							'pid' => '###CURRENT_PID###',
							'setValue' => 'prepend'
							),
						'script' => 'wizard_add.php',
					)
				)
			),
		),
		'clanproid' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_matchdata.clanproid',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_ccore_domain_model_clan',
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
							'table' => 'tx_ccore_domain_model_clan',
							'pid' => '###CURRENT_PID###',
							'setValue' => 'prepend'
							),
						'script' => 'wizard_add.php',
					)
				)
			),
		),
		'clanconid' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_matchdata.clanconid',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_ccore_domain_model_clan',
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
		'leagueid' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_matchdata.leagueid',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_ccore_domain_model_league',
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
							'table' => 'tx_ccore_domain_model_league',
							'pid' => '###CURRENT_PID###',
							'setValue' => 'prepend'
							),
						'script' => 'wizard_add.php',
					)
				)
			),
		),
		'llink' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_matchdata.llink',
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
		'comments' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_matchdata.comments',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_ccore_domain_model_matchcomment',
				'foreign_field' => 'matchid'
			),
		),
		'matches' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_matchdata.matches',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_ccore_domain_model_match',
				'foreign_field' => 'matchdataid'
			)
		),
	)
);
?>