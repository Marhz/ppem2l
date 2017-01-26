<?php

namespace Core;

class Session {

	public static function flash()
	{
		if(isset($_SESSION['flash']))
		{
			extract($_SESSION['flash']);
			unset($_SESSION['flash']);
			$message = htmlspecialchars_decode($message);
			return "<div class='alert alert-{$type} alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>{$message}</strong></div>";
		}
	}
	public static function setFlash($message, $type = 'success')
	{
		$_SESSION['flash']['message'] = htmlspecialchars($message);
		$_SESSION['flash']['type'] = $type;
	}
}