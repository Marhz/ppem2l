<?php
namespace Core;
class Form {

	public static function textarea($name, $label, $params = [])
	{
		$result = "<label for='{$name}'>{$label}</label>";
		$result .= "<textarea name='{$name}' id='{$name}' ";
		foreach($params as $key => $value)
		{
			if($key != 'value')
				$result .= "{$key} = '{$value}'";
		}	
		$default = $params['value'] ? $params['value'] : null;
		return $result .= ">{$default}</textarea>";
	}

	public static function text($name, $label, $params = [])
	{
		$result = "<label for='{$name}'>{$label}</label>";
		$result .= "<input type='text' name='{$name}' id='{$name}' ";
		foreach($params as $key => $value)
		{
			$result .= "{$key} = '{$value}'";
		}		
		return $result .= "' />";
	}
	public static function email($name, $label, $params = [])
	{
		$result = "<label for='{$name}'>{$label}</label>";
		$result .= "<input type='email' name='{$name}' id='{$name}' ";
		foreach($params as $key => $value)
		{
			$result .= "{$key} = '{$value}'";
		}		
		return $result .= "' />";
	}
	public static function password($name, $label, $params = [])
	{
		$result = "<label for='{$name}'>{$label}</label>";
		$result .= "<input type='password' name='{$name}' id='{$name}' ";
		foreach($params as $key => $value)
		{
			$result .= "{$key} = '{$value}'";
		}		
		return $result .= "' />";
	}
	public static function hidden($name, $params = [])
	{
		$result = "<input type='hidden' name='{$name}' id='{$name}' ";
		foreach($params as $key => $value)
		{
			$result .= "{$key} = '{$value}'";
		}		
		return $result .= "' />";
	}
	public static function file($name, $label = null, $params = [])
	{
		$result = "<label for='{$name}'>{$label}</label>";
		$result .= "<input type='file' name='{$name}' id='{$name}' ";
		foreach($params as $key => $value)
		{
			$result .= "{$key} = '{$value}'";
		}		
		return $result .= "' />";
	}
	public static function select($name, $label, $options = [], $params = [])
	{
		$result = "<label for='{$name}'>{$label}</label>";
		$result .= "<select name='{$name}' id='{$name}' ";
		foreach($params as $key => $value)
		{
			$result .= "{$key} = '{$value}'";
		}
		$result .='>';
		foreach($options as $key => $value)
		{
			$result .= "<option value='{$key}'>{$value}</option>";
		}
		return $result .= "</select>";
	}
	public static function checkbox($name, $options = [], $params = [])
	{
		$result = '';
		$i = 1;

		foreach ($options as $key => $value)
		{
			$result .= "<label ";
			foreach($params as $pKey => $pValue)
			{
				$result .= "{$pKey} = '{$pValue}'";
			}
			$result .= "><input type='checkbox' name='{$name}{$i}' id='{$name}{$i}' value='{$key}'>{$value}</label> ";
		}
		return $result;
	}
	public static function radio($name, $options = [], $params = [])
	{
		$result = '';
		$i = 1;

		foreach ($options as $key => $value)
		{
			$result .= "<label ";
			foreach($params as $pKey => $pValue)
			{
				$result .= "{$pKey} = '{$pValue}'";
			}
			$result .= "><input type='radio' name='{$name}' id='{$name}{$i}' value='{$key}'>{$value}</label> ";
		}
		return $result;
	}
}					