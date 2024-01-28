<?php
namespace mvcCore\Controllers;

//use mvcCore\Data\Cars;
use mvcCore\Views\View;


class PostController extends Controller {



	public function __construct( $model) {
		$this->__model = $model;
		$this->__post_images_table = "post_images";

		parent::__construct();

	}
		
	//
	// Get inputs and set model properties
	// @Override
	public function input( $method = INPUT_POST) {
		// Only from POST data
		if ( count( $_POST) > 0) {
			$this->__model->setUserid($_SESSION['id']);
			$this->__model->setTitle( filter_input( $method, 'title', FILTER_SANITIZE_STRING));
			$this->__model->setText( filter_input( $method, 'text', FILTER_SANITIZE_STRING));
			$this->__model->setPublic( filter_input( $method, 'public', FILTER_SANITIZE_STRING));
			$this->__model->setBlocked( filter_input( $method, 'blocked', FILTER_SANITIZE_STRING));


		}
	}
	
	private function readPostImages($id) {
		$images = [];

		$sql = <<< _EOS_
SELECT *
FROM post_images
WHERE postid = :postid;
_EOS_;

		$data = ["postid" => $id];
		$result = $this->__dao->runSelect($sql, $data);
		foreach ($result as $row) 
			$images[] = $row["path"];
		
		return $images;
	}

	private function readPostReactions($id){
		$reactions = [];
		$countTotal = 0;
		$countLikes = 0;
		$countDislikes = 0;
 
		$sql = <<<_EOS_
SELECT reactions.*, users.avatar, users.username
FROM reactions
JOIN posts ON posts.id = reactions.postid
JOIN users ON users.id = reactions.userid
WHERE posts.id = :postid
ORDER BY reactions.id DESC;
_EOS_;
		
		$data = ["postid" => $id];
		$result = $this->__dao->runSelect($sql, $data);
		foreach ($result as $row) {
			$reactions[] = $row;
			$countTotal++;
			if ($row["like_dislike"] == 1) {
				$countLikes++;
			} else {
				$countDislikes++;
			}
		}
			
		
		return array("items" => $reactions, "countTotal" => $countTotal, "countLikes" => $countLikes, "countDislikes" => $countDislikes);
	}

	/**
	 * =============================================
	 * Move all the following methods to the abstract Controler class
	 * =============================================
	 */
	
	//
	// Create new order
	// @Override
	public function create( $method = INPUT_POST, $redirect = 'read') {
		// Put Input POST form data into the model
		$this->input( $method);

		// Checl for a persist submit
		$persit = filter_input( $method, 'persist', FILTER_SANITIZE_STRING);

		if ( is_null( $persit)) {
			// View instance ( model object, "create")
			$view = View::factory( $this->__model, __FUNCTION__);
	
			// Display the view
			$view->display();
		} else {

			var_dump("FILES", $_FILES);

			$target_dir = "media/" . $_SESSION['id'] . "/" . uniqid() . "/";

			if (!file_exists($target_dir)) {
				mkdir($target_dir, 0777, true);
			}

			$target_file = $target_dir . basename($_FILES["upload"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
			if (isset($_POST["submit"])) {
				$check = getimagesize($_FILES["upload"]["tmp_name"]);
				if ($check !== false) {
					echo "File is an image - " . $check["mime"] . ".";
					$uploadOk = 1;
				} else {
					echo "File is not an image.";
					$uploadOk = 0;
				}
			}
			// Check file size
			if ($_FILES["upload"]["size"] > 5000000) {
				echo "Sorry, your file is too large.";
				$uploadOk = 0;
			}

			// Allow certain file formats
			if (
				$imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			) {
				echo "Sorry, only JPG, JPEG, PNG files are allowed.";
				$uploadOk = 0;
			}

			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
				echo "Sorry, your file was not uploaded.";
				// if everything is ok, try to upload file
			} else {
				if (move_uploaded_file($_FILES["upload"]["tmp_name"], $target_file)) {
					echo "The file " . htmlspecialchars(basename($_FILES["upload"]["name"])) . " has been uploaded.";
				} else {
					echo "Sorry, there was an error uploading your file.";
				}
			}
			// die($target_file);
			$this->__model->setImagePath($target_file);
			// Persist action
			$this->persist( $redirect);
		}
	}

	
	// Read an object
	// @Override
	public function read( $method = INPUT_POST, $redirect = 'update') {

		$sql_list = <<<_EOS_
		SELECT * 
		FROM posts 
		WHERE (userid = ? OR public = true) AND blocked = false
		ORDER BY datecreate DESC
		LIMIT 10;
	_EOS_;

		$sql = <<<_EOS_
		SELECT * 
		FROM posts
		WHERE (userid = ? OR public = true) AND blocked = false AND id = ?;
	_EOS_;


		// Get input id from $GLOBALS['request']
		$id = $GLOBALS['request']['id'];
		// Model Class
		$class = get_class(  $this->__model);

		if (empty($id)) {
			$models = $this->__dao->runSelect($sql_list, [$_SESSION['id']], $class);
		} else {
			$models = $this->__dao->runSelect($sql, [$_SESSION['id'], $id], $class);
		}

		// View instance ( model object, "read")
		if ( count( $models) == 1) { // Just one object
			$this->__model = $models[0];
			// Decrypt some fields
			$this->__model->decrypt();
			$this->__model->setImages($this->readPostImages($this->__model->getId()));
			$this->__model->setReactions($this->readPostReactions($this->__model->getId()));
		} elseif ( count( $models) > 1) { // More than one object ( i.e. use a template with a list layout)
			$this->__model = $models;
			// Decrypt some fields
			for ($n = 0; $n < count( $models); $n++) {
				$this->__model[$n]->decrypt();
				$this->__model[$n]->setImages($this->readPostImages($this->__model[$n]->getId()));
				$this->__model[$n]->setReactions($this->readPostReactions($this->__model[$n]->getId()));
			}
		}
		// Check for a update submit
		$update = filter_input( $method, 'update', FILTER_SANITIZE_STRING);
		// Check for a delete submit
		$delete = filter_input( $method, 'delete', FILTER_SANITIZE_STRING);
		
		if ( is_null( $update) && is_null( $delete)) {
			// View instance ( model object, "create")
			$view = View::factory( $this->__model, __FUNCTION__);
			// Display the view
			$view->display();
		} else {
			if ( is_null( $delete)) {
				// Update action (default redirection)
				$this->redirect( [ 'action' => $redirect]);
			} else {
				// Delete action
				$this->redirect( [ 'action' => 'delete']);
			}
		}
	}
	
	// Update an object
	// @Override
	public function update( $method = INPUT_POST, $redirect = 'read') {
		// Get input id from $GLOBALS['request']
		$id = $GLOBALS['request']['id'];
		if ( ! empty( $id)) {
			// Model Class
			$class = get_class(  $this->__model);
			// Get the object from the database
			$models = $this->__dao->read( $class::$_model_table, $class, $id);
			if ( count( $models) == 1) { // Just one object
				$this->__model = $models[0];
				// Decrypt some fields
				$this->__model->decrypt();
				
				// Put POST data into the model
				$this->input( $method);
				
				// Get data (not the null and the default ones)
				$data = $this->__model->getProperties();
				// Encrypt data
				$data = $this->__model->encrypt( $data);
				// Update the database object
				$result = $this->__dao->update( $class::$_model_table, $data, $id);
				// TODO / JMB : $result error processing
				// View instance ( model object, "update")

				// Check for a update submit
				$update = filter_input( $method, 'update', FILTER_SANITIZE_STRING);
				
				if ( is_null( $update)) {
					// View instance ( model object, "update")
					$view = View::factory( $this->__model, __FUNCTION__);
					// Display the view
					$view->display();
				} else {
					// Update action
					$this->redirect( [ 'action' => $redirect]);
				}
			} else { // More than one object ( i.e. use a template with a list layout)
				throw new \UnexpectedValueException( "No Order object to update with id : $id !");
			}
		} else {
			throw new \UnexpectedValueException( "No Order object to update with an empty id !");
		}
	}
	
	// Delete an object
	// @Override
	public function delete( $method = INPUT_POST, $redirect = 'create') {
		// Get input id from $GLOBALS['request']
		$id = $GLOBALS['request']['id'];
		// Model Class
		$class = get_class(  $this->__model);
		// Get the model(s)
		$models = $this->__dao->read( $class::$_model_table, $class, $id);
		// View instance ( model object, "read")
		if ( count( $models) == 1) { // Just one object
			$this->__model = $models[0];
			// Decrypt some fields
			$this->__model->decrypt();
		} elseif ( count( $models) > 1) { // More than one object ( i.e. use a template with a list layout)
			throw new \UnexpectedValueException( "You can't delete more than one object !");
		}
		
		// Check for a delete submit
		$delete = filter_input( $method, 'delete', FILTER_SANITIZE_STRING);

		// Check for a read submit
		$create = filter_input( $method, 'create', FILTER_SANITIZE_STRING);
		
		if ( is_null( $create) && is_null( $delete)) {
			// View instance ( model object, "create")
			$view = View::factory( $this->__model, __FUNCTION__);
			// Display the view
			$view->display();
		} else {
			if ( is_null( $delete)) {
				// Create action (default redirection)
				$this->redirect( [ 'action' => $redirect, 'id' => '']);
			} else {
				try {
				// Delete action
				$this->remove( $redirect);
				} catch ( \PDOException $e) {
					throw new \UnexpectedValueException( $e->getMessage());
				}
			}
		}
		
	}
	
}