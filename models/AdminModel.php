<?php
namespace mvcCore\Models;

class AdminModel extends Model{
    public const DEBUG = true;

    public static $_model_name = 'admin';

    public static $_model_table = 'admins';


    protected $email = null;

    protected $password = null;

	protected $name = null;

	protected $surname = null;

	protected $avatar = null;


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
        // if ( isset( $data['password']))
		// 	$data['password'] =  self::$__crypt->encrypt( $data['password']);
		
		if ( self::DEBUG) var_dump( $data);
		return $data;
	}

    public function decrypt() {
		// $this->password = self::$__crypt->decrypt( $this->password);
		// if ( self::DEBUG) var_dump($this->password);
	}

    
	/**
	 * @return string
	 */
	public static function getModelName() {
		return AdminModel::$_model_name;
	}

	/**
	 * @param string $_model_name
	 */
	public static function setModelName( $_model_name) {
		AdminModel::$_model_name = $_model_name;
	}

	/**
	 * @return string
	 */
	public static function getModelTable() {
		return AdminModel::$_model_table;
	}

	/**
	 * @param string $_model_table
	 */
	public static function setModelTable( $_model_table) {
		AdminModel::$_model_table = $_model_table;
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
	public function getPassword() {
		return $this->password;
	}
	
	/**
	 * @param mixed $password
	 */
	public function setPassword( $password) {
		$this->password = $password;
	}

	/**
	 * @return mixed
	 */
	public function getName() {
		return $this->name;
	}
	
	/**
	 * @param mixed $name
	 */
	public function setName( $name) {
		$this->name = $name;
	}
   
    /**
	 * @return mixed
	 */
	public function getSurname() {
		return $this->surname;
	}
	
	/**
	 * @param mixed $surname
	 */
	public function setSurname( $surname) {
		$this->surname = $surname;
	}

    /**
	 * @return mixed
	 */
	public function getAvatar() {
		return $this->avatar;
	}
	
	/**
	 * @param mixed $avatar
	 */
	public function setAvatar( $avatar) {
		$this->avatar = $avatar;
	}
}