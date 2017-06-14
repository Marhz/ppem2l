<?php

use Core\Error;
use Models\User;
use Core\MyMailer;
use Dompdf\Dompdf;
use Models\Formation;
use Illuminate\Database\Eloquent\Relations\updateExistingPivot;

if(!auth('user')->isChef())
	Error::set(403);

extract($_POST);
$user = User::findOrFail($id_u);

$formation = Formation::find($id_f);

if(auth('user')->employes->contains($user))
{
	if($valide == 2)
	{
		// $formation->checkIfFullBefore();
		MyMailer::sendMail($user->email, "M2L - demande de formation", "<p>Votre demande de participation à la formation {$formation->titre} a été refusée par votre chef.</p>");
		$user->updateCurrencies($formation->cout, $formation->duree);
	}
	$user->formations()->updateExistingPivot($id_f, ['valide' => $valide]);
	if($valide == 1)
	{
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
		MyMailer::sendMail($user->email, 'M2L - Acceptation de votre demande de formation', "<p>Votre demande de participation à la formation {$formation->titre} a été acceptée</p>","pdf/${name}");
		unlink("pdf/{$name}");
	}
}


redirect("validerFormations");