<?php
namespace mvcCore\Models;

class UserModel extends Model{
    public const DEBUG = false;

    public static $_model_name = 'user';

    public static $_model_table = 'users';


    protected $email = null;

    protected $password = null;

    protected $name = null;

    protected $surname = null;

    protected $avatar = null;

    protected $birthdate = null;

    protected $address = null;

    protected $phonenum = null;

    protected $status = null;

    protected $valid = null;
	
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
		return UserModel::$_model_name;
	}

	/**
	 * @param string $_model_name
	 */
	public static function setModelName( $_model_name) {
		UserModel::$_model_name = $_model_name;
	}

	/**
	 * @return string
	 */
	public static function getModelTable() {
		return UserModel::$_model_table;
	}

	/**
	 * @param string $_model_table
	 */
	public static function setModelTable( $_model_table) {
		UserModel::$_model_table = $_model_table;
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
   
    /**
	 * @return mixed
	 */
	public function getBirthdate() {
		return $this->birthdate;
	}
	
	/**
	 * @param mixed $birthdate
	 */
	public function setBirthdate( $birthdate) {
		$this->birthdate = $birthdate;
	}

    /**
	 * @return mixed
	 */
	public function getAddress() {
		return $this->address;
	}
	
	/**
	 * @param mixed $address
	 */
	public function setAddress( $address) {
		$this->address = $address;
	}
   
    /**
	 * @return mixed
	 */
	public function getPhonenum() {
		return $this->phonenum;
	}
	
	/**
	 * @param mixed $phonenum
	 */
	public function setPhonenum( $phonenum) {
		$this->phonenum = $phonenum;
	}

    /**
	 * @return mixed
	 */
	public function getStatus() {
		return $this->status;
	}
	
	/**
	 * @param mixed $status
	 */
	public function setStatus( $status) {
		$this->status = $status;
	}
   
    /**
	 * @return mixed
	 */
	public function getValid() {
		return $this->valid;
	}
	
	/**
	 * @param mixed $valid
	 */
	public function setValid( $valid) {
		$this->valid = $valid;
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