<?php
namespace Core;
class Error {
	public static function set($error,$showView = true)
	{
		http_response_code($error);
		if($showView){
			require "views/errors/{$error}.php";
			die();
		}
	}
}