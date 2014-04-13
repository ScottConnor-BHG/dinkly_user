<?php

/* A ready-to-go Restful API, useful for interaction with JS MVC frameworks */

class ApiController extends Dinkly 
{
	public function handleError($message)
	{
	    header('HTTP/1.1 500 Internal Server Error');
	    header('Content-Type: application/json');
	    die($message);
	}

	public function handleResponse($json)
	{
		header('Cache-Control: no-cache, must-revalidate');
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
		header('Content-type: application/json');
		echo $json;
	}

	public function loadDefault()
	{	
		$request = json_decode(file_get_contents('php://input'));

		$response = null;
		
		switch($_SERVER['REQUEST_METHOD'])
		{
			case 'GET':
				$response = 'GET received!';
				break;

			case 'POST':
				$response = 'POST received!';
				break;

			case 'PUT':
				$response = 'PUT received!';
				break;

			case 'DELETE':
				$response = 'DELETE received!';
				break;
		}

		$this->handleResponse($response);

		return false;
	}
/*
################### User Ajax endpoints ###########################
****/
	public function loadSaveUserInfo()
	{
		$user = new User();
		$username =$_POST['username'];
		$firstname =$_POST['firstname'];
		$lastname =$_POST['lastname'];
		$title =$_POST['title'];
		//error_log($username);
		$user->initWithUsername($username);
		$id =$user->getId();
		$user= new User();
		$user->init($id);
		//error_log($id);

		$user->setUsername($username);
		$user->setFirstName($firstname);
		$user->setLastName($lastname);
		$user->setTitle($title);
		$user->save();

		return false;
	}
}

