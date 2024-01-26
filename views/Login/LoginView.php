<?php
namespace mvcCore\Views;

use mvcCore\Etc\Config;

trait LoginView {
	
	// View specifics fields
	
	protected $heading = "Login View Heading";
	//
	// Set Properties
	// @Override

	
	//
	public function setProperties() {
		
		if ( ! $this->_array) { // Just one object
			
			
		} else { // An array of object
			
		}
		// Verbose mode
		if ( Config::VERBOSE) var_dump( $this);
	}
	

    
}