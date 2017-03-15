<message>yolo</message>

<h1 class="title col-xs-12 mainTitle">Formations à venir</h1>
<div class="col-lg-9">
	<?php 
		foreach($formations as $formation)
		{
			?>
				<div class="annonce col-xs-12 <?= $formation->side ?>">
					<div class="col-xs-12 col-md-4 center-block <?= $formation->side == 'left' ? 'pull-left' : 'pull-right' ?>">
						<img class="center-block" src="image/<?= isset($formation->image) ? $formation->image : 'logoformation.png'?>" />
					</div>
					<div class="col-xs-12 col-md-8">										
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
							<a href="formations/<?= $formation->id ?>" class="btn btn-primary pull-right annonce-button"><span class="glyphicon glyphicon-align-left"></span> Plus d'infos</a>
							<a href="inscription/<?= $formation->id ?>" class="btn btn-success pull-right annonce-button"><span class="glyphicon glyphicon-align-left"></span> S'inscrire</a>
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