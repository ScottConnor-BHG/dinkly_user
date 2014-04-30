<?php

class ImageLikeCollection extends DinklyDataCollection
{
	public static function getAllByImageId($id)
	{
		$db = self::fetchDB(); 
		$Select = "SELECT * FROM image_like WHERE image_id = :id";
		$stmt = $db->prepare($Select);
		$stmt->bindParam(':id', $id);
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
}

