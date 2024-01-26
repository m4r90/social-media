<?php
namespace mvcCore\Models;

class FriendModel extends Model{
    public const DEBUG = false;

    public static $_model_name = 'friend';

    public static $_model_table = 'friends';


    protected $uid = null;

    protected $fid = null;

    protected $status = null;

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
		if ( isset( $data['uid']))
			$data['uid'] =  self::$__crypt->encrypt( $data['uid']);

        if ( isset( $data['fid']))
			$data['fid'] =  self::$__crypt->encrypt( $data['fid']);

        if ( isset( $data['status']))
			$data['status'] =  self::$__crypt->encrypt( $data['status']);


		if ( self::DEBUG) var_dump( $data);
		return $data;
	}

    public function decrypt() {
		$this->useruidid = self::$__crypt->decrypt( $this->uid);
		$this->fid = self::$__crypt->decrypt( $this->fid);
        $this->status = self::$__crypt->decrypt( $this->status);

		if ( self::DEBUG) var_dump( $this->uid, $this->fid, $this->status);
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
	public function getUid() {
		return $this->uid;
	}
	
	/**
	 * @param mixed $uid
	 */
	public function setUid($uid) {
		$this->uid = $uid;
	}

    /**
	 * @return mixed
	 */
	public function getFid() {
		return $this->fid;
	}
	
	/**
	 * @param mixed $fid
	 */
	public function setFid( $fid) {
		$this->fid = $fid;
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
	public function setStatus($status) {
		$this->status = $status;
	}	

}