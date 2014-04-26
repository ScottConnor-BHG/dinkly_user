<?php

class Image extends BaseImage
{
	public function initWithHash($hash)
	{
		$Select = $this->getSelectQuery() . " where hash =" . $this->db->quote($hash);
		$result = $this->db->query($Select)->fetchAll();

		if($result != array())
		{
			$this->hydrate($result, true);
		}
	}
}

