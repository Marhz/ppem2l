<?php
use Dompdf\Dompdf;

include('models/get_formations.php');

$user = auth('user');
$formations = $user->formations->load('adresse')->each(function($formation) 
{
	$formation->valide = $formation->pivot->valide;		
});
ob_start();
	require("views/createPDF.php");
	$content = ob_get_contents();
ob_end_clean();


$dompdf = new dompdf();
$dompdf->set_option('isHtml5ParserEnabled', true);
$dompdf->loadHtml($content);

$dompdf->setPaper('A4','portrait');

$dompdf->render();

$dompdf->stream();