<?php

Namespace Core;

class Validator {

	public static function fileImage($file)
	{
		$extensions_valides = ['jpg', 'jpeg', 'gif', 'png']; //Liste des extensions valides
        
		if($file['error'] > 0)
		{
			Session::setFlash("Erreur lors du transfert de l'avatar.", "danger");
		}
		if($file['size'] > 500000)
		{
            Session::setFlash("L'image est trop grosse (Max : 500ko).", "danger");
		}
    
		$extension_upload = pathinfo($file['name'],PATHINFO_EXTENSION);

		if(!in_array($extension_upload,$extensions_valides) )
		{
			Session::setFlash("Extension de l'image incorrecte.", "danger");
		}
		return !Session::has('flash');
	}
}