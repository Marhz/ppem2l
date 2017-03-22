<?php

use Models\User;
use Core\MyMailer;
use Dompdf\Dompdf;
use Models\Formation;

extract($_POST);
// Core\MyMailer::sendMail('gderemusat@gmail.com','hello','there');
// validerFormation($bdd, $id_u, $id_f,$valide);
$user = User::findOrFail($id_u);

$formation = Formation::find($id_f);

if(auth('user')->employes->contains($user))
{
	$user->formations()->updateExistingPivot($id_f, ['valide' => $valide]);
	$formation->checkIfFull();

	ob_start();
		require("views/createPDF.php");
		$content = ob_get_contents();
	ob_end_clean();
	$dompdf = new dompdf();
	$dompdf->loadHtml($content);
	$dompdf->setPaper('A4','portrait');
	$dompdf->render();
	$name = "valide".rand(1,1000).".pdf";
	file_put_contents("pdf/${name}", $dompdf->output());
	MyMailer::sendMail($user->email, 'M2L - Acceptation de votre demande de formation', '<p>Votre demande de participation à la formation </p>',"pdf/${name}");
}

if($valide == 2)
{
	$formation->chefIfFullBefore();
	MyMailer::sendMail($user->email, 'M2L - Acceptation de votre demande de formation', '<p>Votre demande de participation à la formation a été refusée</p>');
}

redirect("validerFormations");