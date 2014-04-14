<?php

class AccountController extends UserController
{
	public function loadDefault()
	{
		if(!User::isLoggedIn()){
			$this->loadModule('user','home','default',true);
		}
		$this->username=User::getLoggedUsername();
		$user= new User();
		$user->initWithUsername($this->username);
		$id= $user->getId();
		$this->user= new User();
		$this->user->init($id);
		return true;
	}
}
