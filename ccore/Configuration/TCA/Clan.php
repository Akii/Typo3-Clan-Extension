<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_ccore_domain_model_clan'] = array(
	'ctrl' => $TCA['tx_ccore_domain_model_clan']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'name, tag, lang, slogan, homepage, about, picture',
	),
	'types' => array(
		'1' => array('showitem' => 'name, tag, lang, slogan, homepage, about, picture'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
		'name' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_clan.name',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'tag' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_clan.tag',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'lang' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_clan.lang',
			'config' => array(
				'type' => 'input',
				'size' => 2,
				'max' => 2,
				'eval' => 'trim,required'
			),
		),
		'slogan' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_clan.slogan',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'homepage' => array(
			'exclude' 	=> 0,
			'label' 	=> 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_clan.homepage',
			'config'	=> array(
				'type'		=> 'input',
				'size'		=> '15',
				'max'		=> '255',
				'checkbox'	=> '',
				'eval'		=> 'trim',
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
		'about' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_clan.about',
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
			'label' => 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_clan.picture',
			'config' => array(
				'type' => 'group',
				'internal_type' => 'file',
				'uploadfolder' => 'uploads/tx_ccore/clan',
				'show_thumbs' => 1,
				'size' => 5,
				'allowed' => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
				'disallowed' => '',
			),
		),
	),
);
?>