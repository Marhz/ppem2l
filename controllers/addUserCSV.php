<?php

use Core\CSV;
use Core\Error;
use Models\User;
use Core\Session; 

if(!auth('user')->isAdmin())
	Error::set(403);
if(methodIs('post')) {
	if(isset($_FILES['csv']))
	{
		(new CSV($_FILES['csv'],$_POST['chef_id']))->importFile();
	}
	$chiefs = User::where('level','>=',1)->get();
	$employes = User::where('level',0)->whereNull('chef_id')->pluck('email','id');
	redirect(baseUrl()."admin");
}
$chiefs = User::where('level','>=',1)->get();
require 'views/addUserCSV.php';