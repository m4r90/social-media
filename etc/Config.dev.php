<?php
namespace mvcCore\Etc;

/**
 * @author jmbruneau
 *
 */
class Config
{

	// Debug mode
	const DEBUG = false;

	// Verbose mode
	const VERBOSE = false;

	// Session Name
	const SESSION_NAME = 'SOCIAL-MEDIA';

	// XHTML flag
	const XHTML = true;

	// Default model
	const MODEL = 'post';
	// Default action
	const ACTION = 'read';

	// Database parameters
	const DBTYPE = 'mysql';
	const DBHOST = 'localhost';
	//	const DBPORT = 5432; // sur linserv-info-03
	const DBPORT = 3306; // localhost

	//	const DBNAME = 'jmbruneau'; // sur linserv-info-03
	const DBNAME = 'social_media'; // localhost
	const DBUSER = 'smapp';
	//	const DBPASSWD = '<jmb!25164>'; // sur linserv-info-03
	const DBPASSWD = 'password'; // localhost


	// Form data defintion
	static $REQUIRED = 'required=“required”';
	static $SELECTED = 'selected="selected"';
	static $CHECKED = 'checked=“checked”';

	static function init()
	{
		if (!self::XHTML)
			self::$REQUIRED = 'required';
		if (!self::XHTML)
			self::$SELECTED = 'selected';
		if (!self::XHTML)
			self::$CHECKED = 'checked';
	}

}

// Init call
Config::init();