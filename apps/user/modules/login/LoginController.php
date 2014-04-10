<?php

class LoginController extends UserController
{
	public function loadDefault()
	{
		if(isset($_POST['forgot']))
		{
			error_log("email_sent");
		}
		if(isset($_POST['username']) && isset($_POST['password']))
		{
			if(!User::authenticate($_POST['username'], $_POST['password']))
			{
				//error_log("invalid_login");
				$_SESSION['dinkly']['badlogin'] = true;
				
			}else 
			{
				if(isset($_SESSION['dinkly']['badlogin']))
				{ 
					unset($_SESSION['dinkly']['badlogin']);
				}
				$this->loadModule('user', 'home', 'default', true);
				//error_log("valid_login");

			}
			
		}


		return true;
	}
	public function loadLogout()
	{
		User::logout();
		//error_log("valid_logout");

		$this->loadModule('user', 'home', 'default', true);

		return false;
	}
}
