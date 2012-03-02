<?php
if(!defined('TYPO3_MODE')) die ('Access denied.');

Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Matchlist',
	'Match List'
);

Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Ucp',
	'User Control Panel'
);

if (TYPO3_MODE === 'BE') {

	$extPath = t3lib_extMgm::extPath($_EXTKEY);
	
	if(!isset($TBE_MODULES['txccoremainmenu'])) {
		$temp_TBE_MODULES = array();
		foreach($TBE_MODULES as $key => $val) {
			if($key == 'web') {
				$temp_TBE_MODULES[$key] = $val;
				$temp_TBE_MODULES['txccoremainmenu'] = '';
			} else {
				$temp_TBE_MODULES[$key] = $val;
			}
		}
		
		$TBE_MODULES = $temp_TBE_MODULES;
	}
	
	t3lib_extMgm::addModule('txccoremainmenu', '', '', t3lib_extMgm::extPath($_EXTKEY).'Configuration/BackendModule/');

	/**
	 * Registers a Backend Module
	 */
	Tx_Extbase_Utility_Extension::registerModule(
		$_EXTKEY,
		'txccoremainmenu',	 // Make module a submodule of 'tools'
		'clanmgmt',	// Submodule key
		'',				// Position
		array(
			'BEClan' => 'list, showSquad, delete, deleteSquad'
		),
		array(
			'access' => 'user,group',
			'icon'   => 'EXT:' . $_EXTKEY . '/ext_icon.gif',
			'labels' => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_clanmgmt.xml',
		)
	);

	/**
	 * Registers a Backend Module
	 */
	Tx_Extbase_Utility_Extension::registerModule(
		$_EXTKEY,
		'txccoremainmenu',	 // Make module a submodule of 'tools'
		'gamemgmt',	// Submodule key
		'',						// Position
		array(
			'BEGame' => 'list, show, delete'
		),
		array(
			'access' => 'user,group',
			'icon'   => 'EXT:' . $_EXTKEY . '/ext_icon.gif',
			'labels' => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_gamemgmt.xml',
		)
	);

	/**
	 * Registers a Backend Module
	 */
	Tx_Extbase_Utility_Extension::registerModule(
		$_EXTKEY,
		'txccoremainmenu',	 // Make module a submodule of 'tools'
		'usermgmt',	// Submodule key
		'',						// Position
		array(
			'BEUser' => 'list, search, delete'
		),
		array(
			'access' => 'user,group',
			'icon'   => 'EXT:' . $_EXTKEY . '/ext_icon.gif',
			'labels' => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_usermgmt.xml',
		)
	);

	/**
	 * Registers a Backend Module
	 */
	Tx_Extbase_Utility_Extension::registerModule(
		$_EXTKEY,
		'txccoremainmenu',	 // Make module a submodule of 'tools'
		'matchmgmt',	// Submodule key
		'',						// Position
		array(
			'BEMatch' => 'list, show, delete'
		),
		array(
			'access' => 'user,group',
			'icon'   => 'EXT:' . $_EXTKEY . '/ext_icon.gif',
			'labels' => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_matchmgmt.xml',
		)
	);

}


t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Clan Core');

$feuserColumns = array(
	'txccorepoints' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:fe_users.tx_ccore_points',
		'config' => array(
			'type' => 'inline',
			'foreign_table' => 'tx_ccore_domain_model_point',
			'foreign_field' => 'feuser',
			'appearance' => array(
				'collapseAll' => 1,
				'expandSingle' => 1
			)
		)
	)
);

t3lib_div::loadTCA('fe_users');
t3lib_extMgm::addTCAcolumns('fe_users', $feuserColumns, 1);
t3lib_extMgm::addToAllTCAtypes('fe_users', '--div--;LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:fe_users.tx_ccore_points, txccorepoints');

$tempColumns = array (
	'txccorelogo' => array (
		'exclude' => 1,		
		'label' => 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:fe_groups.tx_ccore_logo',		
		'config' => array (
			'type' => 'group',
			'internal_type' => 'file',
			'allowed' => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
			'max_size' => $GLOBALS['TYPO3_CONF_VARS']['BE']['maxFileSize'],	
			'uploadfolder' => 'uploads/tx_ccore/squad',
			'show_thumbs' => 1,
			'size' => 1,
			'minitems' => 0,
			'maxitems' => 1,
		)
	),
	'txccoregameid' => array (
		'exclude' => 1,
		'label' => 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:fe_groups.tx_ccore_gameid',
		'config' => array (
			'type' => 'select',
			'items' => array(
				array('---', 0)
			),
			'foreign_table' => 'tx_ccore_domain_model_game',
			'foreign_table_where' => 'AND tx_ccore_domain_model_game.pid=###CURRENT_PID### ORDER BY tx_ccore_domain_model_game.uid',	
			'size' => 1,	
			'minitems' => 0,
			'maxitems' => 1,
		)
	)
);

t3lib_div::loadTCA('fe_groups');
t3lib_extMgm::addTCAcolumns('fe_groups',$tempColumns,1);
t3lib_extMgm::addToAllTCAtypes('fe_groups','--div--;LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:fe_groups.squad, txccorelogo;;;;1-1-1, txccoregameid');

t3lib_extMgm::addLLrefForTCAdescr('tx_ccore_domain_model_clan', 'EXT:ccore/Resources/Private/Language/locallang_csh_tx_ccore_domain_model_clan.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_ccore_domain_model_clan');
$TCA['tx_ccore_domain_model_clan'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_clan',
		'label' => 'name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'delete' => 'deleted',
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Clan.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_ccore_domain_model_clan.gif'
	),
);

t3lib_extMgm::addLLrefForTCAdescr('tx_ccore_domain_model_game', 'EXT:ccore/Resources/Private/Language/locallang_csh_tx_ccore_domain_model_game.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_ccore_domain_model_game');
$TCA['tx_ccore_domain_model_game'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_game',
		'label' => 'title',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'delete' => 'deleted',
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Game.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_ccore_domain_model_game.gif'
	),
);

t3lib_extMgm::addLLrefForTCAdescr('tx_ccore_domain_model_points', 'EXT:ccore/Resources/Private/Language/locallang_csh_tx_ccore_domain_model_points.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_ccore_domain_model_points');
$TCA['tx_ccore_domain_model_point'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_points',
		'label' => 'note',
		'label_alt' => 'value',
		'label_alt_force' => 1,
		'default_sortby' => 'ORDER BY crdate DESC',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden'
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Point.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_ccore_domain_model_points.gif'
	),
);

t3lib_extMgm::addLLrefForTCAdescr('tx_ccore_domain_model_gamemode', 'EXT:ccore/Resources/Private/Language/locallang_csh_tx_ccore_domain_model_gamemode.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_ccore_domain_model_gamemode');
$TCA['tx_ccore_domain_model_gamemode'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_gamemode',
		'label' => 'name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden'
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Gamemode.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_ccore_domain_model_gamemode.gif'
	),
);

t3lib_extMgm::addLLrefForTCAdescr('tx_ccore_domain_model_map', 'EXT:ccore/Resources/Private/Language/locallang_csh_tx_ccore_domain_model_map.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_ccore_domain_model_map');
$TCA['tx_ccore_domain_model_map'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_map',
		'label' => 'title',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden'
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Map.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_ccore_domain_model_map.gif'
	),
);

t3lib_extMgm::addLLrefForTCAdescr('tx_ccore_domain_model_server', 'EXT:ccore/Resources/Private/Language/locallang_csh_tx_ccore_domain_model_server.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_ccore_domain_model_server');
$TCA['tx_ccore_domain_model_server'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_server',
		'label' => 'name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Server.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_ccore_domain_model_server.gif'
	),
);

t3lib_extMgm::addLLrefForTCAdescr('tx_ccore_domain_model_match', 'EXT:ccore/Resources/Private/Language/locallang_csh_tx_ccore_domain_model_match.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_ccore_domain_model_match');
$TCA['tx_ccore_domain_model_match'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_match',
		'label' => 'matchdate',
		'label_alt' => 'lname, lname',
		'label_alt_force' => 1,
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden'
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Match.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_ccore_domain_model_match.gif'
	),
);

t3lib_extMgm::addLLrefForTCAdescr('tx_ccore_domain_model_matchresult', 'EXT:ccore/Resources/Private/Language/locallang_csh_tx_ccore_domain_model_matchresult.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_ccore_domain_model_matchresult');
$TCA['tx_ccore_domain_model_matchresult'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_matchresult',
		'label' => 'round',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Matchresult.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_ccore_domain_model_matchresult.gif'
	),
);

t3lib_extMgm::addLLrefForTCAdescr('tx_ccore_domain_model_matchplayer', 'EXT:ccore/Resources/Private/Language/locallang_csh_tx_ccore_domain_model_matchplayer.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_ccore_domain_model_matchplayer');
$TCA['tx_ccore_domain_model_matchplayer'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_matchplayer',
		'label' => 'name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Matchplayer.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_ccore_domain_model_matchplayer.gif'
	),
);

t3lib_extMgm::addLLrefForTCAdescr('tx_ccore_domain_model_matchcomment', 'EXT:ccore/Resources/Private/Language/locallang_csh_tx_ccore_domain_model_matchcomment.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_ccore_domain_model_matchcomment');
$TCA['tx_ccore_domain_model_matchcomment'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_matchcomment',
		'label' => 'changedon',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden'
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Matchcomment.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_ccore_domain_model_matchcomment.gif'
	)
);

?>