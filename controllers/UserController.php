<?php
namespace mvcCore\Controllers;

//use mvcCore\Data\Cars;
use mvcCore\Views\View;



class UserController extends Controller {
	
	public function __construct( $model) {
		$this->__model = $model;
		parent::__construct();
	}
		
	//
	// Get inputs and set model properties
	// @Override
	public function input( $method = INPUT_POST) {
		// Only from POST data
		if ( count( $_POST) > 0) {
			// Get and set :
			// Lastname, Firstname and Email
			
			$this->__model->setEmail( filter_input( $method, 'email', FILTER_SANITIZE_EMAIL));
			$this->__model->setPassword( filter_input( $method, 'password', FILTER_SANITIZE_STRING));
			$this->__model->setName( filter_input( $method, 'name', FILTER_SANITIZE_STRING));
			$this->__model->setSurname( filter_input( $method, 'surname', FILTER_SANITIZE_STRING));
			$this->__model->setAvatar( filter_input( $method, 'avatar', FILTER_SANITIZE_STRING));
            $this->__model->setBirthdate( filter_input( $method, 'birthdate', FILTER_SANITIZE_STRING));
			$this->__model->setAddress( filter_input( $method, 'address', FILTER_SANITIZE_STRING));
			$this->__model->setPhonenum( filter_input( $method, 'phonenum', FILTER_SANITIZE_STRING));
			$this->__model->setStatus( filter_input( $method, 'status', FILTER_SANITIZE_NUMBER_INT));
			$this->__model->setValid( filter_input( $method, 'valid', FILTER_SANITIZE_NUMBER_INT));
			$this->__model->setAdmin( filter_input( $method, 'admin', FILTER_SANITIZE_NUMBER_INT));
			$this->__model->setUsername( filter_input( $method, 'username', FILTER_SANITIZE_NUMBER_INT));


			
		}
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
			// Persist action
			$this->persist( $redirect);
		}
	}

	
	// Read an object
	// @Override
	public function read( $method = INPUT_POST, $redirect = 'update') {
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
			$this->__model = $models;
			// Decrypt some fields
			for ($n = 0; $n < count( $models); $n++) {
				$this->__model[$n]->decrypt();
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