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
	public function loadViewLikes()
	{
		$img_like = new ImageLike();
		$image_id =$_POST['id'];
		$user_id = $_POST['user_id'];
		//error_log(User::getLoggedUsername());
		if($user_id!=0)
		{

				$img_like->setUserId($user_id);
				$img_like->setImageId($image_id);
				$img_like->save();
			
		}else
		{
				$img_like->setUserId(0);
				$img_like->setImageId($image_id);
				$img_like->save();
		}
		

		return false;
	}
/*
################### Admin Ajax endpoints ###########################
****/
	public function loadSaveUserInfo()
	{
		$user = new User();
		$username =$_POST['username'];
		$firstname =$_POST['firstname'];
		$lastname =$_POST['lastname'];
		$title =$_POST['title'];
	  //error_log($title);
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
		public function loadSaveImage()
	{
		$img = new Image();
		$hash =$_POST['hash'];
		$title =$_POST['title'];
		$img->setHash($hash);
		$img->setTitle($title);
		$img->setCreatedAt(date("Y-m-d H:i:s"));
		$img->setUpdatedAt(date("Y-m-d H:i:s"));
		$img->save();
		return false;
	}
	public function loadDeleteImage()
	{
		$img = new Image();
		$hash =$_POST['hash'];
		$file_path =$_POST['file_path'];
		$file_path_resize=$_POST['file_path_resize'];
	 if(is_file($file_path))
 		{
			unlink($file_path);
		}
	 if(is_file($file_path_resize))
 		{
			unlink($file_path_resize);
		}
		$img->initWithHash($hash);
		$img->delete();
		return false;
	}
	public function loadDeleteComment()
	{
		$comment = new ImageComment();
		$comment->init($_POST['id']);
		$comment->delete();
		return false;
	}
	public function loadDeleteLike()
	{
		$comment = new ImageLike();
		$comment->init($_POST['id']);
		$comment->delete();
		return false;
	}
	public function loadSignUpUser()
	{
		$user = new User();
		$username =$_POST['username'];
		$email =$_POST['email'];
		$firstname =$_POST['firstname'];
		$lastname =$_POST['lastname'];
		$title =$_POST['title'];
		$password=$_POST['password'];
	  //error_log($password);
		$user->setPassword($password);
		$user->setUsername($username);
		$user->setEmail($email);
		$user->setFirstName($firstname);
		$user->setHash(hash("md5",$email));
		$user->setIsLocked(1);
		$user->setLastName($lastname);
		$user->setTitle($title);
		$user->save();

		// $url_verify =

		$postmark = new Postmark("7ce7bdcd-4689-45dd-86d9-4bf155873185","scottconnor@bluehousegroup.com","scottconnor@bluehousegroup.com");

		$result = $postmark->to("scottconnor@bluehousegroup.com")
			->subject("User Verification")
			->plain_message("This is a plain text message.");
			// ->attachment('File.pdf', $file_as_string, 'application/pdf')
			// ->send();
		
		// if($result === true)
		// 	error_log("message sent");
		// else
		// 	error_log("message not sent");
		return true;
	}
}







/**
* This is a simple library for sending emails with Postmark.
* Created by Matthew Loberg (http://mloberg.com), extended and modified by Drew Johnston (http://drewjoh.com).
*/
 
class Postmark {
 
	private $api_key;
	private $attachment_count = 0;
	private $data = array();
 
	function __construct($key, $from, $reply = '')
	{
		$this->api_key = $key;
		$this->data['From'] = $from;
		$this->data['ReplyTo'] = $reply;
	}
 
	function send()
	{
		$headers = array(
			'Accept: application/json',
			'Content-Type: application/json',
			'X-Postmark-Server-Token: '.$this->api_key
		);
		
		$ch = curl_init('http://api.postmarkapp.com/email');
		
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($this->data));
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	
		$return = curl_exec($ch);
		$curl_error = curl_error($ch);
		$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		
		curl_close($ch);
		
		// do some checking to make sure it sent
		if($http_code !== 200)
			return false;
		else
			return true;
	}
 
	function to($to)
	{
		$this->data['To'] = $to;
		return $this;
	}
	
	function cc($cc)
	{
		$this->data["Cc"] = $cc;
		return $this;
	}
	
	function bcc($bcc)
	{
		$this->data["Bcc"] = $bcc;
		return $this;
	}
		
	function subject($subject)
	{
		$this->data['Subject'] = $subject;
		return $this;
	}
 
	function html_message($html)
	{
		$this->data['HtmlBody'] = $html;
		return $this;
	}
 
	function plain_message($msg)
	{
		$this->data['TextBody'] = $msg;
		return $this;
	}
 
	function tag($tag)
	{
		$this->data['Tag'] = $tag;
		return $this;
	}
	
	function attachment($name, $content, $content_type)
	{
		$this->data['Attachments'][$this->attachment_count]['Name']		= $name;
		$this->data['Attachments'][$this->attachment_count]['ContentType']	= $content_type;
		
		// Check if our content is already base64 encoded or not
		if( ! base64_decode($content, true))
			$this->data['Attachments'][$this->attachment_count]['Content']	= base64_encode($content);
		else
			$this->data['Attachments'][$this->attachment_count]['Content']	= $content;
		
		// Up our attachment counter
		$this->attachment_count++;
		
		return $this;
	}
 
}

