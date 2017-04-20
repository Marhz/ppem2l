<?php use Core\Paginate; ?>
<div class="container">
	<div class="row no-margin">
		<h1 class="title col-xs-12 mainTitle">Formations à venir</h1>
	</div>
	<div class="row no-margin">
		<formations :data="<?= htmlspecialchars($formations, ENT_QUOTES, 'UTF-8') ?>"></formations>
<!-- 			<?php 
			foreach($formations as $formation)
			{
			?>
				<div class="col-xs-12 col-sm-6 col-lg-4 margin-bot-50">
					<div class="annonce clear">
						<?php
						if(isset($formation->status)) { ?>
							<div class="annonce-status-box <?= $formation->status ?>"></div>
							<div class="fa fa-check-circle annonce-status"></div>
						<?php } ?>
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
								<span>
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
									<?php
									if($formation->canDo && !$formation->alreadyIn){ ?>
										<a href="inscription/<?= $formation->id ?>" class="btn btn-success annonce-button"><span class="glyphicon glyphicon-align-left"></span> S'inscrire</a>
									<?php
									}
									else if ($formation->alreadyIn) { ?>
										<a href="cancelFormation/<?= $formation->id ?>" class="btn btn-warning annonce-button"><span class="glyphicon glyphicon-align-left"></span> Se désinscrire</a>
										<?php
									}
									else {
										?>
										<div class="clear"></div>
										<small class="error annonce-error"><?= $formation->cantDoBecause ?></small>
										<?php
									}
									?>
								</div>
							</p>
						</div>
					</div>
				</div>
				<?php
			}
			?>
 -->			
<!-- 			<div class="center">
				<?= Paginate::make($formations->page, $formations->lastPage, baseUrl().'home/') ?>
			</div>
 -->		</div>
</div>