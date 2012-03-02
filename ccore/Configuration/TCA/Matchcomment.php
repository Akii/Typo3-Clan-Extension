<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_ccore_domain_model_matchcomment'] = array(
	'ctrl' => $TCA['tx_ccore_domain_model_matchcomment']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'hidden, createdon, changedon, comment, feuser, matchid',
	),
	'types' => array(
		'1' => array('showitem' => 'hidden;;1, createdon, changedon, comment, feuser, matchid'),
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
		'createdon' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_matchcomment.createdon',
			'config' => array(
				'type' => 'input',
				'size' => 12,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 1,
				'default' => time()
			),
		),
		'changedon' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_matchcomment.changedon',
			'config' => array(
				'type' => 'input',
				'size' => 12,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 1,
				'default' => time()
			),
		),
		'comment' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_matchcomment.comment',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim,required',
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
		'feuser' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_matchcomment.feuser',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'fe_users',
				'foreign_table_where' => 'AND fe_users.pid=###CURRENT_PID### ORDER BY fe_users.uid',
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
		'matchid' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_matchcomment.matchid',
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