<?php

class UserController extends AdminController
{
	public function __construct()
	{
		if(!AdminUser::isLoggedIn())
		{
			$this->loadModule('admin', 'home', 'default', true);
			return false;
		}
	}

	public function loadDefault()
	{
		// $this->loadModule('admin', 'user', 'user_list', true);
		return false;
	}

	public function loadUserList()
	{
		$this->admin_users = AdminUserCollection::getAll();
		$this->users = UserCollection::getAll();
		return true;
	}
		public function loadUploadFile()
	{
		$this->images = ImageCollection::getAll();

	
		return true;
	}
	public function loadImageComments($parameters)
	{
		$this->image_comments= ImageCommentCollection::getAll();

	
		return true;
	}
		public function loadUpload()
	{

		return true;
	}
}