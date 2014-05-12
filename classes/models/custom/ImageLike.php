<?php

class ImageLike extends BaseImageLike
{
public function initByImageIdUserId($image_id,$user_id)
	{
		
		$Select = "SELECT * FROM image_like WHERE image_id = :image_id AND user_id= :user_id";
		$stmt = $this->db->prepare($Select);
		$stmt->bindParam(':image_id', $image_id);
		$stmt->bindParam(':user_id', $user_id);
		$stmt->execute();
		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$likes = array();
		foreach($results as $result)
		{
			$like = new ImageLike();
			$like->hydrate($result, true);
			$likes[] = $like;
		}
		return $likes;
	}
	public function hasLiked($user_id,$image_id)
	{
		$Select = $this->getSelectQuery() . " where user_id =" . $this->db->quote($user_id). " AND image_id =" . $this->db->quote($image_id);
		$result = $this->db->query($Select)->fetchAll();

		if(count($result)>0)
		{
			return true;
		}else{
			return false;
		}
	}

}

