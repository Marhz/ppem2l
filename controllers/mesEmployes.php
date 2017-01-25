<?php

	$employes = auth('user')->employes()->get();
	foreach($employes as $employe)
	{
		echo $employe->login;
	}