<?php

class AccountController extends AdminController
{
	public function loadDefault()
	{


		return true;
	}
		public function loadEdit($parameters)
	{
		$this->username=User::getLoggedUsername();
		$user= new User();
		$user->initWithUsername($this->username);
		$id= $user->getId();
		$this->user= new User();
		$this->user->init($parameters['id']);


		return true;
	}
}
