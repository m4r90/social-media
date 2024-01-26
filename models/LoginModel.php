<?php
namespace mvcCore\Models;

class LoginModel extends Model{
    public const DEBUG = false;

    public static $_model_name = 'login';

    public static $_model_table = 'users';


    protected $email = null;
	
    protected $admin = null;

	protected $username = null;



    public function getProperties($empty = true, $default = true){
        $properties = parent::getProperties($empty, $default);
        unset($properties['_model_name'], $properties['_model_table'],);
        if ( $default) { // Remove properties  with a default value
			unset( $properties['date']);
		}
		return $properties;
    }

    public function getPropertiesNames( $default = true) {
		// Get all properties names
		$properties_names = parent::getPropertiesNames( $default);
		if ( $default) { // Remove properties names with a default value
			unset( $properties_names['date']);
		}
		return $properties_names;
	}

    public function encrypt( $data = []) {
		
		if ( self::DEBUG) var_dump( $data);
		return $data;
	}

    public function decrypt() {
		
	}


	/**
	 * @return string
	 */
	public static function getModelName() {
		return LoginModel::$_model_name;
	}

	/**
	 * @param string $_model_name
	 */
	public static function setModelName( $_model_name) {
		LoginModel::$_model_name = $_model_name;
	}

	/**
	 * @return string
	 */
	public static function getModelTable() {
		return LoginModel::$_model_table;
	}

	/**
	 * @param string $_model_table
	 */
	public static function setModelTable( $_model_table) {
		LoginModel::$_model_table = $_model_table;
	}
    
    /**
	 * @return mixed
	 */
	public function getEmail() {
		return $this->email;
	}
	
	/**
	 * @param mixed $email
	 */
	public function setEmail( $email) {
		$this->email = $email;
	}
   
	/**
	 * @return mixed
	 */
	public function getAdmin() {
		return $this->admin;
	}
	
	/**
	 * @param mixed $admin
	 */
	public function setAdmin( $admin) {
		$this->admin = $admin;
	}

	
	/**
	 * @return mixed
	 */
	public function getUsername() {
		return $this->username;
	}
	
	/**
	 * @param mixed $username
	 */
	public function setUsername( $username) {
		$this->username = $username;
	}

}