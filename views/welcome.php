<h1 class="title col-xs-12 mainTitle">Formations à venir</h1>
<div class="col-xs-12">
	<?php 
		foreach($formations as $formation)
		{
			?>
				<div class="col-xs-12 col-md-6 col-lg-4">
					<div class="clear">
					<div class="annonce clear">
						<div class="pull-right annonce-type"><?= $formation->type->titre ?></div>
						<div class="col-xs-12 col-md-12 center-block">
							<img class="center-block" src="image/<?= isset($formation->image) ? $formation->image : 'logoformation.png'?>" />
						</div>
						<div class="col-xs-12 col-md-12">
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
								<div class="btn-container">
									<a href="formations/<?= $formation->id ?>" class="btn btn-primary annonce-button"><span class="glyphicon glyphicon-align-left"></span> Plus d'infos</a>
									<a href="inscription/<?= $formation->id ?>" class="btn btn-success annonce-button"><span class="glyphicon glyphicon-align-left"></span> S'inscrire</a>
								</div>
							</p>
						</div>
<!-- 						<div class="col-xs-12">
							<div class="col-xs-12 annonce-body">
								<p class="description"><?= substr($formation->description,0,250) ?>...</p>
							</div>
						</div>
 -->					</div>
					</div>
				</div>
			<?php
		}
	?>
</div>
