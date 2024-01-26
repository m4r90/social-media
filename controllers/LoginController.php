<?php
namespace mvcCore\Controllers;

//use mvcCore\Data\Cars;
use mvcCore\Views\View;



class LoginController extends Controller {
	
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
			#$this->__model->setAdmin( filter_input( $method, 'admin', FILTER_SANITIZE_NUMBER_INT));
			$this->__model->setUsername(filter_input($method, 'username', FILTER_SANITIZE_NUMBER_INT));
		}
	}


	public function login($method = INPUT_POST)
	{
		
		$email = filter_input($method, 'email', FILTER_SANITIZE_EMAIL);
		$password = filter_input($method, 'password', FILTER_SANITIZE_STRING);
	
		// Check if both email and password are provided
		if ($email && $password) {
			// SQL query to retrieve user by email
			$sql = "SELECT * FROM users WHERE email = ?";
			
			// Run the query with a prepared statement
			$result = $this->__dao->runSelect($sql, [$email]);
	
			// Check if a user was found
			if ($result && count($result) > 0) {
				$user = $result[0];
	
				// Compare the input password with the retrieved one
				// if (password_verify($password, $user['password'])) {
					// Passwords match, user is authenticated
					// You can implement the login logic here
				if ($user['password'] == $password) {

					echo "Login successful!";
					session_start();
					$_SESSION['connected'] = true;
					$_SESSION['email'] = $user['email'];
					$_SESSION['username'] = $user['username'];
					$_SESSION['id'] = $user['id'];
					$_SESSION['avatar'] = $user['avatar'];

					$this->redirect(['model' => 'post', 'action' => 'read']);

				} else {
					// Passwords do not match
					echo "Invalid password!";
					session_start();
					$_SESSION['connected'] = false;
					$_SESSION['error_message'] = "Wrong email or password";
					$this->redirect(['model' => 'login', 'action' => 'welcome']);

				}
			} else {
				// User not found
				echo "User not found!";
			}
		} else {
			// Email or password not provided
			echo "Email or password not provided!";
		}
	}

	public function welcome($method = INPUT_POST)
	{
		// View instance ( model object, "create")
		$view = View::factory($this->__model, __FUNCTION__);
		// Display the view
		$view->display();
	}

	public function logout()
	{

		session_start();
		$_SESSION['connected'] = false;
		$this->redirect(['model' => 'login', 'action' => 'welcome']);
	}

	public function create($method = INPUT_POST, $redirect = 'read'){}
	public function read($method = INPUT_POST, $redirect = 'update'){}
	public function update($method = INPUT_POST, $redirect = 'read'){}
	public function delete($method = INPUT_POST, $redirect = 'create'){}
		
}