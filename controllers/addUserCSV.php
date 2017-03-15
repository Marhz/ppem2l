<?php

use Core\CSV;
use Core\Session;
use Models\User; 

if(isset($_FILES['csv']))
{
	(new CSV($_FILES['csv'],$_POST['chef_id']))->importFile();
}

$chiefs = User::where('level','>=',1)->get();
$employes = User::where('level',0)->whereNull('chef_id')->pluck('email','id');
$csvErrors = Session::getCsvErrors();

require 'views/ajouterUser.php';