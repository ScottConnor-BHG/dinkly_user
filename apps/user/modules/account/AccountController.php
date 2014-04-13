<?php

class AccountController extends UserController
{
	public function loadDefault()
	{
		$this->username=User::getLoggedUsername();
		$user= new User();
		$user->initWithUsername($this->username);
		$this->user=$user;
		return true;
	}
}
