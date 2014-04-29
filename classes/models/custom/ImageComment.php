<?php

class ImageComment extends BaseImageComment
{
	public function getAllByID($id)
	{
		$dbo = self::fetchDB();

		$sql = "select * from image_comment where image_id=".$dbo->quote($id);
		$result = $dbo->query($sql)->fetchAll();
		if($result != array())
		{
			$this->hydrate($result, true);
		}
	}

}

