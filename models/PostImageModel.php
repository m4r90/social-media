<?php
namespace mvcCore\Models;

class PostImageModel extends Model{
    public const DEBUG = false;

    public static $_model_name = 'postimage';

    public static $_model_table = 'postsimages';


    protected $postid = null;

    protected $path = null;



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
		
		if ( self::DEBUG) var_dump( $this->postid, $this->path);
	}

    
	/**
	 * @return string
	 */
	public static function getModelName() {
		return PostImageModel::$_model_name;
	}

	/**
	 * @param string $_model_name
	 */
	public static function setModelName( $_model_name) {
		PostModel::$_model_name = $_model_name;
	}

	/**
	 * @return string
	 */
	public static function getModelTable() {
		return PostModel::$_model_table;
	}

	/**
	 * @param string $_model_table
	 */
	public static function setModelTable( $_model_table) {
		PostModel::$_model_table = $_model_table;
	}
    
    /**
	 * @return mixed
	 */
	public function getPostid() {
		return $this->postid;
	}
	
	/**
	 * @param mixed $postid
	 */
	public function setPostid( $postid) {
		$this->postid = $postid;
	}
   
    /**
	 * @return mixed
	 */
	public function getPath() {
		return $this->path;
	}
	
	/**
	 * @param mixed $path
	 */
	public function setPath( $path) {
		$this->path = $path;
	}


}