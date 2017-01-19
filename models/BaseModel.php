<?php

Namespace Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model {
	
	public function safe($item)
	{
		echo htmlspecialchars($this->$item);
	}
}