<div class="col-lg-9">
	<h1 class="title">Formations à venir</h1>
	<?php 
		foreach($formations as $formation)
		{
			?>
				<div class="annonce col-xs-12 <?= $formation->id % 2 == 0 ? 'annonceleft' : 'annonceright'?>">
					<div class="col-xs-4 center-block <?= $formation->id % 2 == 0 ? 'pull-left' : 'pull-right' ?>">
						<img class="center-block" src="image/<?= isset($formation->image) ? $formation->image : 'logoformation.png'?>" />
					</div>
					<div class="col-xs-8"?>										
						<p>
							<div class="formtitre"><?= $formation->titre ?></div>
							<div class="formLieu">
								<p>
									Débute le: <?= affDate($formation->debut) ?>
								</p>
								<p>
									Durée: <?= $formation->duree ?> jours.
								</p>
								<p>
									Délivrée par: <?= $formation->prestataire->raison_sociale ?>	
								</p>
								<p>
									Coût: <?= $formation->cout ?> crédits.
								</p>
							</div>
						</p>
					</div>
					<div class="col-xs-12">
						<div class="col-xs-12 annonce-body">
							<p class="description"><?= substr($formation->description,0,250) ?>...</p>
							<a href="#" class="btn btn-success pull-right annonce-button"><span class="glyphicon glyphicon-align-left"></span>Read More</a>
						</div>
					</div>
				</div>
			<?php
		}
	?>
</div>

<?php
    include('views/plugins/sidebar.php');
?>