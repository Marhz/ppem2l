<?php

Namespace Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model {
	
	public function safe($item)
	{
		return htmlspecialchars($this->$item);
	}
}