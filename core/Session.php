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

	public static function setMessages($message, $type = 'success')
	{
		$_SESSION['flashArray']['messages'][] = $message;
		$_SESSION['flashArray']['type'] = $type;
	}

	public static function getMessages()
	{
		if(isset($_SESSION['flashArray']['messages'])){
			$tmp = $_SESSION['flashArray']['messages'];
			unset($_SESSION['flashArray']['messages']);
			return $tmp;			
		}
	}

	public static function setValidationErrors($errors)
	{
		$_SESSION['validationErrors'] = $errors;
	}

	public static function getValidationErrors()
	{
		if(isset($_SESSION['validationErrors'])){
			$tmp = $_SESSION['validationErrors'];
			unset($_SESSION['validationErrors']);
			return $tmp;
		}
	}


	public static function setCsvErrors($errors)
	{
		$_SESSION['csvErrors'] = $errors;
	}

	public static function getCsvErrors()
	{
		if(isset($_SESSION['csvErrors'])){
			$tmp = $_SESSION['csvErrors'];
			unset($_SESSION['csvErrors']);
			return $tmp;
		}
	}

	public static function js($file)
	{
		$_SESSION['js'] = $file;
	}

	public static function has($item)
	{
		return isset($_SESSION[$item]);
	}

	public static function get($item)
	{
		$tmp = $_SESSION[$item];
		unset($_SESSION[$item]);
		return $tmp;
	}
}