<?php

class HomeController extends UserController
{
	public function loadDefault()
	{
		$this->images = ImageCollection::getAll();
		if(User::isLoggedIn())
		{
			$this->images_likes = ImageLikeCollection::getAllByUserId(User::getLoggedId());
			$this->like_array = array();
			foreach($this->images_likes as $like)
			{
				$this->like_array[]=$like->getImageId();
			}
		}else
		{
			$this->like_array=array();
		}
		
		return true;
	}
	public function loadSignUp()
	{

		return true;
	}
	public function loadUserValidate($parameters)
	{
		$this->id=$parameters['id'];
		// error_log($this->id);
		$this->user = new User();
		$this->user->initWithHash($this->id);
		$this->user->setIsLocked(0);
    $this->user->save();

		return true;
	}

}
