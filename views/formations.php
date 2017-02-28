<div class="col-xs-12 formation">									
	<div class="formtitre col-xs-12">
		<h1><?= $formation->titre ?></h1>	
	</div>
	<div class="col-xs-4 margin-top">
		<img class="center-block" src="<?= baseUrl()?>image/<?= isset($formation->image) ? $formation->image : 'logoformation.png'?>" />
	</div>
	<div class="col-xs-8 annonce-body margin-top">
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
	<div class="col-xs-12 annonce-body margin-top">
		<p class="description"><?= $formation->description ?></p>
	</div>
	<div class="col-xs-12">
		<a href="formation/<?= $formation->id ?>" class="btn btn-success pull-right annonce-button"><span class="glyphicon glyphicon-align-left"></span> S'inscrire</a>
	</div>
</div>
<div class="col-xs-12">
	<div class="col-xs-8 col-xs-offset-2">
		<form class="form-vertical" role="form" method="POST" action="ajouterCommentaire">
	        <div class="form-group">
	            <label for="commentaire" class="col-md-2 control-label">Commentaire</label>
	            <div class="col-md-4">
	                <textarea name="commentaire"></textarea>
	            </div>
	        </div>
	        <input type="hidden" name="id_formation" value="<?= $formation->id ?>">
	        <div class="form-group">
	            <div class="col-md-4 col">
	                <button type="submit" class="btn btn-primary">
	                    Envoyer
	                </button>
	            </div>
	        </div>
	    </form>
	</div>
	<div class="col-xs-8 col-xs-offset-2 commentaires">
		<div class="col-xs-2">
			<img src="image/curling.png">
		</div>
		<div class="col-xs-10">
			<span>Posté par :</span> ... <span>Le </span> ... .
			<p>Je suis un commentaire !</p>
			<div class="col-xs-8 col-xs-offset-1">
				<p>Je suis la réponse au commentaire</p>
			</div>
		</div>
	</div>
	<div class="col-xs-8 col-xs-offset-2">
		<p>Je suis le commentaire n°2 :) !</p>
	</div>
</div>


