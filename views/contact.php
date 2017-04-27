<div class="container">
	<form method="POST" action="contact">
		<div class="row">
			<div class="form-group col-md-push-3 col-md-6">
				<?= Core\Form::select("selectContact","Personne à contacter :",$optionsS) ?>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-push-3 col-md-6">
				<?= Core\Form::text("titreContact","Titre : ")?>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-push-3 col-md-6">
				<?= Core\Form::textarea("textContact","",$paramsT) ?> 
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-push-3 col-md-6">
				<?= Core\Form::submit("subContact","Envoyer",$paramsS) ?> 
			</div>
		</div>
	</form>
</div>