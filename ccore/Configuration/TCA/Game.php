<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_ccore_domain_model_game'] = array(
	'ctrl' => $TCA['tx_ccore_domain_model_game']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'title, tag, description, picture',
	),
	'types' => array(
		'1' => array('showitem' => 'title, tag, description, picture'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
		'title' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_game.title',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'tag' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_game.tag',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'description' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_game.description',
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
		'picture' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_game.picture',
			'config' => array(
				'type' => 'group',
				'internal_type' => 'file',
				'uploadfolder' => 'uploads/tx_ccore/game',
				'show_thumbs' => 1,
				'size' => 5,
				'allowed' => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
				'disallowed' => '',
			)
		)
	)
);
?>