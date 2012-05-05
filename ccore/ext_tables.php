<?php
if(!defined('TYPO3_MODE')) die ('Access denied.');

Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Matchlist',
	'ccore :: Match List'
);

Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Latestmatch',
	'ccore :: Last Matches'
);

if (TYPO3_MODE === 'BE') {

	$extPath = t3lib_extMgm::extPath($_EXTKEY);
	$TBE_STYLES['inDocStyles_TBEstyle'] .= '@import "/typo3conf/ext/ccore/Resources/Public/CSS/backend.css";';
	
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
			'BEClan' => 'list, showSquad'
		),
		array(
			'access' => 'user,group',
			'icon'   => 'EXT:' . $_EXTKEY . '/Resources/Public/Icons/silk/house.png',
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
			'BEGame' => 'list, gameList, mapList'
		),
		array(
			'access' => 'user,group',
			'icon'   => 'EXT:' . $_EXTKEY . '/Resources/Public/Icons/silk/controller_add.png',
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
			'BEUser' => 'list, search'
		),
		array(
			'access' => 'user,group',
			'icon'   => 'EXT:' . $_EXTKEY . '/Resources/Public/Icons/silk/user_edit.png',
			'labels' => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_usermgmt.xml',
		)
	);
	
	/**
	 * Registers a Backend Module
	 */
	Tx_Extbase_Utility_Extension::registerModule(
		$_EXTKEY,
		'txccoremainmenu',	 // Make module a submodule of 'tools'
		'playermgmt',	// Submodule key
		'',						// Position
		array(
			'BEPlayer' => 'list, search'
		),
		array(
			'access' => 'user,group',
			'icon'   => 'EXT:' . $_EXTKEY . '/Resources/Public/Icons/silk/user_edit.png',
			'labels' => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_playermgmt.xml',
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
			'BEMatchdata' => 'list, show, showComments'
		),
		array(
			'access' => 'user,group',
			'icon'   => 'EXT:' . $_EXTKEY . '/Resources/Public/Icons/silk/medal_gold_2.png',
			'labels' => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_matchmgmt.xml',
		)
	);

}


t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Clan Core');
t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/CSS', 'Clan Core (CSS)');

$feuserColumns = array(
	'tx_ccore_points' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:fe_users.tx_ccore_points',
		'config' => array(
			'type' => 'inline',
			'foreign_table' => 'tx_ccore_domain_model_point',
			'foreign_field' => 'feuserid',
			'appearance' => array(
				'collapseAll' => 1,
				'expandSingle' => 1
			)
		)
	)
);

t3lib_div::loadTCA('fe_users');
t3lib_extMgm::addTCAcolumns('fe_users', $feuserColumns, 1);
t3lib_extMgm::addToAllTCAtypes('fe_users', '--div--;LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:fe_users.tx_ccore_points, tx_ccore_points');

$tempColumns = array (
	'tx_ccore_logo' => array (
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
	'tx_ccore_gameid' => array (
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
t3lib_extMgm::addToAllTCAtypes('fe_groups','--div--;LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:fe_groups.squad, tx_ccore_logo;;;;1-1-1, tx_ccore_gameid');

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
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/silk/group.png'
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
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/silk/controller.png'
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
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/silk/bell.png'
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
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/silk/bullet_purple.png'
	),
);

t3lib_extMgm::addLLrefForTCAdescr('tx_ccore_domain_model_league', 'EXT:ccore/Resources/Private/Language/locallang_csh_tx_ccore_domain_model_league.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_ccore_domain_model_league');
$TCA['tx_ccore_domain_model_league'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_league',
		'label' => 'lname',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden'
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/League.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/silk/bell.png'
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
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/silk/map.png'
	),
);

t3lib_extMgm::addLLrefForTCAdescr('tx_ccore_domain_model_matchdata', 'EXT:ccore/Resources/Private/Language/locallang_csh_tx_ccore_domain_model_matchdata.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_ccore_domain_model_matchdata');
$TCA['tx_ccore_domain_model_matchdata'] = array(
	'ctrl' => array(
		'title' => 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_matchdata',
		'label' => 'uid',
		'label_alt' => 'matchdate, clanconid',
		'label_alt_force' => 1,
		'default_sortby' => 'ORDER BY matchdate DESC',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden'
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Matchdata.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/silk/medal_gold_2.png'
	)
);

t3lib_extMgm::addLLrefForTCAdescr('tx_ccore_domain_model_match', 'EXT:ccore/Resources/Private/Language/locallang_csh_tx_ccore_domain_model_match.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_ccore_domain_model_match');
$TCA['tx_ccore_domain_model_match'] = array(
	'ctrl' => array(
		'title' => 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_match',
		'label' => 'matchdataid',
		'label_alt' => 'uid',
		'label_alt_force' => 1,
		'mainpalette' => '1',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden'
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Match.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/silk/medal_gold_2.png'
	)
);

t3lib_extMgm::addLLrefForTCAdescr('tx_ccore_domain_model_matchresult', 'EXT:ccore/Resources/Private/Language/locallang_csh_tx_ccore_domain_model_matchresult.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_ccore_domain_model_matchresult');
$TCA['tx_ccore_domain_model_matchresult'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_matchresult',
		'label' => 'mapid',
		'label_alt' => 'resultpro, resultcon',
		'label_alt_force' => 1,
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'sortby' => 'sorting',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden'
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Matchresult.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/silk/report.png'
	),
);

t3lib_extMgm::addLLrefForTCAdescr('tx_ccore_domain_model_matchplayer', 'EXT:ccore/Resources/Private/Language/locallang_csh_tx_ccore_domain_model_matchplayer.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_ccore_domain_model_matchplayer');
$TCA['tx_ccore_domain_model_matchplayer'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_matchplayer',
		'label' => 'team',
		'label_alt' => 'playerid',
		'label_alt_force' => 1,
		'default_sortby' => 'ORDER BY team',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden'
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Matchplayer.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/silk/user_add.png'
	),
);

t3lib_extMgm::addLLrefForTCAdescr('tx_ccore_domain_model_player', 'EXT:ccore/Resources/Private/Language/locallang_csh_tx_ccore_domain_model_player.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_ccore_domain_model_player');
$TCA['tx_ccore_domain_model_player'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_player',
		'label' => 'name',
		'label_alt' => 'feuserid',
		'label_alt_force' => 1,
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden'
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Player.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/silk/user_add.png'
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
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/silk/user_comment.png'
	)
);

t3lib_extMgm::addLLrefForTCAdescr('tx_ccore_domain_model_race', 'EXT:ccore/Resources/Private/Language/locallang_csh_tx_ccore_domain_model_race.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_ccore_domain_model_race');
$TCA['tx_ccore_domain_model_race'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:ccore/Resources/Private/Language/locallang_db.xml:tx_ccore_domain_model_race',
		'label' => 'caption',
		'default_sortby' => 'ORDER BY crdate DESC',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden'
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Race.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/silk/flag_blue.png'
	),
);

?>