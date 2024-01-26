<?php
namespace mvcCore\Models;

class ReactionModel extends Model{
    public const DEBUG = false;

    public static $_model_name = 'reaction';

    public static $_model_table = 'reactions';


    protected $userid = null;

    protected $postid = null;

    protected $like_dislike = null;

    protected $comment = null;


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
	public function getUserid() {
		return $this->userid;
	}
	
	/**
	 * @param mixed $userid
	 */
	public function setUserid($userid) {
		$this->userid = $userid;
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
	public function getLikeDislike() {
		return $this->like_dislike;
	}
	
	/**
	 * @param mixed $like_dislike
	 */
	public function setLikeDislike($like_dislike) {
		$this->like_dislike = $like_dislike;
	}
    
    /**
	 * @return mixed
	 */
	public function getComment() {
		return $this->comment;
	}
	
	/**
	 * @param mixed $comment
	 */
	public function setComment($comment) {
		$this->comment = $comment;
	}


}