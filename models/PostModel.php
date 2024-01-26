<?php
namespace mvcCore\Models;

class PostModel extends Model{
    public const DEBUG = false;

    public static $_model_name = 'post';

    public static $_model_table = 'posts';


    protected $userid = null;

    protected $datecreate = null;

    protected $dateupdate = null;

    protected $title = null;

    protected $text = null;

    protected $public = null;

    protected $blocked = null;

	protected $images = [];

	protected $reactions = [];


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
		return PostModel::$_model_name;
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
	public function getUserid() {
		return $this->userid;
	}
	
	/**
	 * @param mixed $userid
	 */
	public function setUserid( $userid) {
		$this->userid = $userid;
	}
   
    /**
	 * @return mixed
	 */
	public function getDateCreate() {
		return $this->datecreate;
	}
	
	/**
	 * @param mixed $datecreate
	 */
	public function setDateCreate( $datecreate) {
		$this->datecreate = $datecreate;
	}
    /**
	 * @return mixed
	 */
	public function getDateUpdate() {
		return $this->dateupdate;
	}
	
	/**
	 * @param mixed $dateupdate
	 */
	public function setDateUpdate( $dateupdate) {
		$this->dateupdate = $dateupdate;
	}

    /**
	 * @return mixed
	 */
	public function getTitle() {
		return $this->title;
	}
	
	/**
	 * @param mixed $title
	 */
	public function setTitle( $title) {
		$this->title = $title;
	}

    /**
	 * @return mixed
	 */
	public function getText() {
		return $this->datecreate;
	}
	
	/**
	 * @param mixed $datecreate
	 */
	public function setText( $datecreate) {
		$this->datecreate = $datecreate;
	}

    /**
	 * @return mixed
	 */
	public function getPublic() {
		return $this->public;
	}
	
	/**
	 * @param mixed $public
	 */
	public function setPublic( $public) {
		$this->public = $public;
	}

    /**
	 * @return mixed
	 */
	public function getBlocked() {
		return $this->blocked;
	}
	
	/**
	 * @param mixed $blocked
	 */
	public function setBlocked( $blocked) {
		$this->blocked = $blocked;
	}

	/**
	 * @return mixed
	 */
	public function getImages() {
		return $this->images;
	}
	
	/**
	 * @param mixed $images
	 */
	public function setImages( $images) {
		$this->images = $images;
	}

	
	/**
	 * @return mixed
	 */
	public function getReactions() {
		return $this->reactions;
	}
	
	/**
	 * @param mixed $reactions
	 */
	public function setReactions( $reactions) {
		$this->reactions = $reactions;
	}



}