<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="<?= baseUrl() ?>css/style.css">
	<style>
		body
		{
			background: white;
		}

		.pdf
		{
			font-family: Arial, Helvetica, sans-serif;
		}
		
		.top-pdf
		{
			padding: 15px 10px 20px;
			border: 1px solid black;
		}
		
		.top-pdf p 
		{
			font-weight: bold;
		}

		.intitule-pdf
		{
			border:1px solid black;
		}
		.top-row
		{
			padding-bottom: 50px;
		}
		.text-pdf
		{
			padding: 50px 0px;
		}
		.text-pdf h3
		{
			font-size: 25px;
			border-bottom: 1px solid black;
			padding-bottom: 3px;
		}
		.pdf-info
		{
			border: 1px solid black;
			padding-top: 8px;
			padding: 20px 30px;
		}
		.pdf-info p
		{
			padding-left: 5px;
			font-size: 18px;
			font-weight: bold;	
		}
		.pdf-info p:last-child
		{
			margin-bottom: 0;
		}
		.footer
		{
			margin-top: 170px;
		}
	</style>
</head>
<body>
	<div class="row top-row">
		<div class="pull-right col-md-3 top-pdf">	
			<p class="">Maison des ligues de Lorraine </p>
			<p class="">34 boulevard Chasseigne </p>	
			<p class="">Lorraine, Metz, 57000</p>	
		</div>
		<div class="pull-left col-md-3 top-pdf">
			<p><?= $user->fullName() ?></p>
			<p>Votre solde : <?= $user->credit ?> crédit</p>
		</div>
	</div>
	<div class="row well intitule-pdf">
		<h1 class="center">Validation de votre demande de formation</h1>
		<h2 class="center">Intitulé de la formation : <?= $formation->titre ?></h2>
		<h3 class="center">Cout : <?= $formation->cout ?> crédit</h3>
	</div>
	<div class="row text-pdf">
		<h3 class="text-left">Votre participation à la formation <?= $formation->titre ?> à été accepté par <?= $user->chef->fullName() ?>.</h3><br/>
	</div>
	<div class="row">
		<div class="pdf-info">
			<p>Nom de la formation : <?= $formation->titre ?><p>
			<p>Lieu : <?= $formation->getAdresse() ?></p>
			<p>Date : </p>
			<p>Du <?= affDate($formation->debut) ?> au <?= affDate((new Carbon\Carbon($formation->debut))->addDays($formation->duree)) ?></p>
		</div>
	</div>
	<div class="footer">
		<p>La section des formations sportives de la Maison des Ligues de Lorraine vous remercie de votre participation.</p>
		<p>En cas de problème veuillez nous contactez à l'adresse suivante : M2Lformation@gmail.com</p>
		<p class="pull-right">&copy; M2L</p>
	</div>
</body>
</html>