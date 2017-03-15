<?php

use Core\CSV;
use Core\Session;
use Models\User; 

if(isset($_FILES['csv']))
{
	(new CSV($_FILES['csv'],$_POST['chef_id']))->importFile();
}

$users = User::where('level','>=',1)->pluck('email','id');
$employes = User::where('level',0)->pluck('email','id');
$errors = Session::getValidationErrors();
require 'views/ajouterUser.php';