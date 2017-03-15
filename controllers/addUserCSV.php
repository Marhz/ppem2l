<?php

use Core\CSV; 

if(isset($_POST['csv']))
{
	(new CSV($_FILES['csv'],$_POST['chef_id']))->importFile();
}

$users = User::where('level','>=',1)->pluck('email','id');
$employes = User::where('level',0)->pluck('email','id');
$errors = Session::getValidationErrors();
require 'views/ajouterUser.php';