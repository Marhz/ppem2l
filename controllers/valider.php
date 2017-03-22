<?php

use Models\User;
use Core\MyMailer;
use Models\Formation;
use Dompdf\Dompdf;

extract($_POST);
// Core\MyMailer::sendMail('gderemusat@gmail.com','hello','there');
// validerFormation($bdd, $id_u, $id_f,$valide);
/*$user = User::findOrFail($id_u);
*/

$user = User::find(3);
if(auth('user')->employes->contains($user))
{
	$user->formations()->updateExistingPivot($id_f, ['valide' => $valide]);
/*	$formation = Formation::find($id_f);
*/
	$formation = Formation::find(1);
	//Création du pdf pour l'envoie d'email
	ob_start();
		require("views/createPDF.php");
		$content = ob_get_contents();
	ob_end_clean();


	$dompdf = new dompdf();
	/*$dompdf->set_option('isHtml5ParserEnabled', true);*/
	$dompdf->loadHtml($content);

	$dompdf->setPaper('A4','portrait');

	$dompdf->render();

	$name = "valide".rand(1,1000).".pdf";

	file_put_contents("pdf/${name}", $dompdf->output());
/*	$dompdf->stream();
*/

	MyMailer::sendMail($user->email, 'M2L - Acceptation de votre demande de formation', '<p>Votre demande de participation à la formation </p>',"pdf/${name}");
}

redirect("validerFormations");