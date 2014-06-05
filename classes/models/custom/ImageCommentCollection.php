<?php

class ImageCommentCollection extends DinklyDataCollection
{
	public static function getAllById($id)
	{
		$db = self::fetchDB(); 
		$Select = "SELECT
									*
								FROM
									image_comment ic
								INNER JOIN `user` u ON ic.user_id = u.id
								WHERE
									image_id = :id";
		$stmt = $db->prepare($Select);
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$comments = array();
		foreach($results as $result)
		{
			$comment = new ImageComment();
			$comment->hydrate($result, true);
			$comments[] = array($comment,$result['username']);
		}
		return $comments;
	}
		public static function getAllCommentsByImage($id)
	{
		$db = self::fetchDB(); 
		$Select = "SELECT
									*
								FROM
									image_comment ic
								INNER JOIN `user` u ON ic.user_id = u.id
								WHERE
									image_id = :id";
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

