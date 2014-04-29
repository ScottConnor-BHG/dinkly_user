<?php

class ImageCommentCollection extends DinklyDataCollection
{
	public static function getAllById($id)
	{
		$db = self::fetchDB(); 
		$Select = "SELECT * FROM image_comment WHERE image_id = :id";
		$stmt = $db->prepare($Select);
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$comments = array();
		foreach($results as $result)
		{
			$comment = new ImageComment();
			$comment->hydrate($result, true);
			$comments[] = $comment;
		}
		return $comments;
	}

}

