<div class="container container-mobile">
	<h1 class="title col-xs-12 mainTitle">Formations à venir</h1>
		<?php 

use Core\Paginate;
			foreach($formations as $formation)
			{
				?>
					<div class="col-xs-12 col-sm-6 col-lg-4 margin-bot-50">
						<div class="annonce clear">
							<div class="pull-right annonce-type"><?= $formation->type->titre ?></div>
							<div class="col-xs-12 no-padding">
								<div class="annonce-details">
									<span>
										Débute le: <?= affDate($formation->debut) ?>
									</span>
									<br/>
									<span>
										Durée: <?= $formation->duree ?> jours.
									</span>
									<br/>
<!-- 									<span>
										Délivrée par: <?= $formation->prestataire->raison_sociale ?>	
									</span>
									<br/>
 -->									<span>
										Coût: <?= $formation->cout ?> crédits.
									</span>
								</div>
								<img class="center-block" src="<?= baseUrl() ?>image/<?= isset($formation->image) ? $formation->image : 'curling.png'?>" />
								<div class="annonce-details-overlay"></div>
							</div>
							<div class="col-xs-12 col-md-12 annonce-bottom">
								<p>
									<div class="formtitre"><?= $formation->titre ?></div>
									<div class="btn-container">
										<a href="formations/<?= $formation->id ?>" class="btn btn-primary annonce-button"><span class="glyphicon glyphicon-align-left"></span> Plus d'infos</a>
										<a href="inscription/<?= $formation->id ?>" class="btn btn-success annonce-button"><span class="glyphicon glyphicon-align-left"></span> S'inscrire</a>
									</div>
								</p>
							</div>
						</div>
					</div>
				<?php
			}
		?>
		<div class="center">
			<?= Paginate::make($formations->page, $formations->lastPage, baseUrl().'home/') ?>
		</div>
</div>