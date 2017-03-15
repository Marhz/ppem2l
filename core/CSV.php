<?php

namespace Core;

use Core\MyMailer;
use Core\Session;
use Models\User;

class CSV {
	private $csv;
	private $chef_id;


	public function __construct($csv, $chef_id)
	{

		$this->csv = $csv;
		$this->chef_id = $chef_id;
	}

	public function importFile()
	{
		$i = 0;
		if(!empty($this->csv['size']))
		{
			if($this->csv['error'] > 0)
			{
				$data['fileError'][$i] = "Erreur lors de la réception du fichier.";
				$i++;
			}
			if($this->csv['size'] > 314159265)
			{
				$data['fileError'][$i] = "Fichier trop lourd";
				$i++;
			}
			if(pathinfo($this->csv['name'],PATHINFO_EXTENSION) != 'csv')
			{
				$data['fileError'][$i] = "Le fichier n'est pas au format Csv.";
				$i++;
			}
			if(!($file = fopen($this->csv['tmp_name'],'r')))
			{
				$data['fileError'][$i] = "Le Serveur n'arrive pas à ouvrir le fichier en lecture.";
				$i++;
			}
			if($i === 0)
			{
				$errors = [];
				while($csv = fgetcsv($file,0,','))
				{
					if($i == 0){
						$i++;
						continue;
					}
				
					$i++;
					$mdp = randStr(8);
					
					$data = [
						'nom' => $csv[0],
						'prenom' => $csv[1],
						'email' => $csv[2],
						'login' => $csv[2],
						'password' => sha1($mdp),
						'chef_id' => isset($_POST['chef_id']) ? $_POST['chef_id'] : NULL
					];
					if(validateUserCsv($data))
					{
						$tmp_errors = Session::getValidationErrors();
						$tmp = "La ligne {$i} n'a pas pu être enregistrée à cause des erreurs suivantes : ";
						foreach($tmp_errors as $error)
						{
							$tmp .= $error.' ';
						}
						$errors[] = $tmp;
					}
					else
					{
						if(\Models\User::where('email', $csv[2])->first())
						{
							//TODO \Models\User::where('email',$email)->first()->update()
						}
						else
						{
							$user = \Models\User::create($data);
							MyMailer::sendMail($user->email,"M2L - Création de votre comptre M2L maison des ligues","Bonjour, <br/><br/> Votre compte sur l'intranet de la maison des ligues a été créer. <br/> Login : {$user->email} <br/> Mot de passe : {$mdp}");

						}
					}
				}
			}

		}
		Session::setCsvErrors($errors);	}


}