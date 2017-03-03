<div class="col-xs-12 formation">									
	<div class="formtitre col-xs-12">
		<h1><?= $formation->titre ?></h1>	
	</div>
	<div class="col-xs-4 margin-top">
		<img class="center-block" src="<?= baseUrl()?>image/<?= isset($formation->image) ? $formation->image : 'logoformation.png'?>" />
	</div>
	<div class="col-xs-8 annonce-body margin-top">
		<p>
			<b>Débute le:</b> <?= affDate($formation->debut) ?>
		</p>
		<p>
			<b>Durée:</b> <?= $formation->duree ?> jours.
		</p>
		<p>
			<b>Délivrée par:</b> <?= $formation->prestataire->raison_sociale ?>	
		</p>
		<p>
			<b>Coût:</b> <?= $formation->cout ?> crédits.
		</p>
	</div>	
	<div class="col-xs-12 annonce-body margin-top">
		<p class="description"><?= $formation->description ?></p>
	</div>
	<div class="col-xs-12">
		<a href="formation/<?= $formation->id ?>" class="btn btn-success pull-right annonce-button"><span class="glyphicon glyphicon-align-left"></span> S'inscrire</a>
	</div>
</div>
	<comments :data="<?= htmlspecialchars($comments) ?>" formation-id="<?= $formation->id ?>"></comments>


