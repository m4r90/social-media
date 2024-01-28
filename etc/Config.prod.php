<?php
namespace mvcCore\Etc;

/**
 * @author jmbruneau
 *
 */
class Config {
	
	// Debug mode
	const  DEBUG = false;
	
	// Verbose mode
	const  VERBOSE = false;
	
	// Session Name
	const SESSION_NAME = 'SOCIAL-MEDIA';

	// XHTML flag
	const XHTML = true;
	
	// Default model
	const MODEL = 'login';
	// Default action
	const ACTION = 'welcome';
	
	// Database parameters
	const DBTYPE = 'mysql';
	const DBHOST = 'linserv-info-01.campus.unice.fr';
	const DBPORT = 3306; // sur linserv-info-01
//	const DBPORT = 5433; // localhost

	const DBNAME = 'rm200523_social_media'; // sur linserv-info-01

	const DBUSER = 'rm200523';
	const DBPASSWD = 'rm200523'; // sur linserv-info-01
//	
	
	// Form data defintion
	static $REQUIRED = 'required=“required”';
	static $SELECTED = 'selected="selected"';
	static $CHECKED = 'checked=“checked”';
	
	static function init() {
		if ( ! self::XHTML) self::$REQUIRED = 'required';
		if ( ! self::XHTML) self::$SELECTED = 'selected';
		if ( ! self::XHTML) self::$CHECKED = 'checked';
	}

}

// Init call
Config::init();