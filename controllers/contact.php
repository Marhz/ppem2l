<?php

$user = auth('user');

$optionsS[0] = "Administrateur";
if(isset($user->chef))
{
	$optionsS[1] = "Votre chef : "+$user->chef->fullName();	
}

$paramsT["placeholder"] = "Veuillez écrire votre message ici...";

include("views/contact.php");