<?php

class AccountController extends AdminController
{
	public function loadDefault()
	{


		return true;
	}
	public function loadEdit($parameters)
	{
		
		$this->user= new User();
		$this->user->init($parameters['id']);


		return true;
	}
}
