#
# Table structure for table 'fe_groups'
#
CREATE TABLE fe_groups (
	tx_ccore_logo text,
	tx_ccore_gameid int(11) DEFAULT '0' NOT NULL
);

#
# Table structure for table 'fe_users'
#
CREATE TABLE fe_users (
	tx_ccore_points tinytext
);

#
# Table structure for table 'tx_ccore_domain_model_clan'
#
CREATE TABLE tx_ccore_domain_model_clan (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,


	name varchar(255) DEFAULT '' NOT NULL,
	tag varchar(255) DEFAULT '' NOT NULL,
	lang varchar(2) DEFAULT '' NOT NULL,
	slogan varchar(255) DEFAULT '' NOT NULL,
	homepage tinytext,
	about text NOT NULL,
	picture text NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid)
);

#
# Table structure for table 'tx_ccore_domain_model_game'
#
CREATE TABLE tx_ccore_domain_model_game (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,


	title varchar(255) DEFAULT '' NOT NULL,
	tag varchar(255) DEFAULT '' NOT NULL,
	description text NOT NULL,
	picture text NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid)
);

#
# Table structure for table 'tx_ccore_domain_model_gamemode'
#
CREATE TABLE tx_ccore_domain_model_gamemode (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	name varchar(255) DEFAULT '' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid)
);

#
# Table structure for table 'tx_ccore_domain_model_point'
#
CREATE TABLE tx_ccore_domain_model_point (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	feuserid varchar(255) DEFAULT '' NOT NULL,
	note varchar(255) DEFAULT '' NOT NULL,
	value int(11) DEFAULT '0' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid)
);

#
# Table structure for table 'tx_ccore_domain_model_league'
#
CREATE TABLE tx_ccore_domain_model_league (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	
	lname varchar(255) DEFAULT '' NOT NULL,
	
	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	
	PRIMARY KEY (uid),
	KEY parent (pid)
);

#
# Table structure for table 'tx_ccore_domain_model_map'
#
CREATE TABLE tx_ccore_domain_model_map (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,


	title varchar(255) DEFAULT '' NOT NULL,
	description text NOT NULL,
	picture text NOT NULL,
	picture_big text NOT NULL,
	download varchar(255) DEFAULT '' NOT NULL,
	gameid int(11) unsigned DEFAULT '0',
	modes int(11) unsigned DEFAULT '0' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid)
);

#
# Table structure for table 'tx_ccore_domain_model_matchdata'
#
CREATE TABLE tx_ccore_domain_model_matchdata (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	disable_comments tinyint(4) unsigned DEFAULT '0' NOT NULL,
	matchdate int(11) DEFAULT '0' NOT NULL,
	matchtype int(11) DEFAULT '0' NOT NULL,
	gameid int(11) unsigned DEFAULT '0',
	
	clanproid int(11) unsigned DEFAULT '0',
	clanconid int(11) unsigned DEFAULT '0',
	
	rankingpro int(11) unsigned DEFAULT '0',
	rankingcon int(11) unsigned DEFAULT '0',
	
	leagueid int(11) unsigned DEFAULT '0',
	llink varchar(255) DEFAULT '' NOT NULL,
	comments tinytext NOT NULL,
	
	matches tinytext NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid)
);

#
# Table structure for table 'tx_ccore_domain_model_match'
#
CREATE TABLE tx_ccore_domain_model_match (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	
	matchdataid int(11) unsigned DEFAULT '0',
	gamemodeid int(11) unsigned DEFAULT '0',
	
	playerproid int(11) unsigned DEFAULT '0',
	playerconid int(11) unsigned DEFAULT '0',
	
	rounds tinytext NOT NULL,
	
	tx_extbase_type varchar(255) DEFAULT '' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid)
);

#
# Table structure for table 'tx_ccore_domain_model_matchresult'
#
CREATE TABLE tx_ccore_domain_model_matchresult (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	matchid int(11) unsigned DEFAULT '0',
	resultpro int(11) DEFAULT '0' NOT NULL,
	resultcon int(11) DEFAULT '0' NOT NULL,
	mapid int(11) unsigned DEFAULT '0',
	banspro tinytext,
	banscon tinytext,
	matchplayers tinytext,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid)
);

#
# Table structure for table 'tx_ccore_domain_model_matchplayer'
#
CREATE TABLE tx_ccore_domain_model_matchplayer (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	resultid int(11) unsigned DEFAULT '0',
	playerid int(11) unsigned DEFAULT '0',
	race int(11) unsigned DEFAULT '0',
	team tinyint(4) unsigned DEFAULT '0' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid)
);

#
# Table structure for table 'tx_ccore_domain_model_player'
#
CREATE TABLE tx_ccore_domain_model_player (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,


	name varchar(255) DEFAULT '' NOT NULL,
	languagetag varchar(255) DEFAULT '' NOT NULL,
	feuserid varchar(255) DEFAULT '' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid)
);

#
# Table structure for table 'tx_ccore_domain_model_matchcomment'
#
CREATE TABLE tx_ccore_domain_model_matchcomment (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	
	matchid int(11) unsigned DEFAULT '0',
	feuserid varchar(255) DEFAULT '' NOT NULL,
	changedon int(11) DEFAULT '0' NOT NULL,
	comment text NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid)
);

#
# Table structure for table 'tx_ccore_domain_model_race'
#
CREATE TABLE tx_ccore_domain_model_race (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,


	picture text NOT NULL,
	picture_big text NOT NULL,
	caption varchar(255) DEFAULT '' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid)
);

#
# Table structure for table 'tx_ccore_map_gamemode_mm'
#
CREATE TABLE tx_ccore_map_gamemode_mm (
	uid_local int(11) unsigned DEFAULT '0' NOT NULL,
	uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);