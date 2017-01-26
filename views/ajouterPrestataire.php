<?php use Core\Form; ?>
<div class="col-md-8 col-md-offset-2">
	<div class="panel panel-primary">
		<div class="panel-heading">
			Ajouter un prestataire
		</div>
		<div class="panel-body">
		<form action="ajouterPrestataire" method="post">
			<div class="form-group col-md-12">
				<?= Form::text('raison_sociale', 'Raison sociale :', ['class' => 'form-control']) ?>
			</div>
			<div class="form-group col-md-12">
				<?= Form::select('adresse_id', 'Adresse :', $adresses, ['class' => 'form-control']) ?>
			</div>
			<div class="col-md-12 adresse_form">
				<div class="form-group col-md-12">
					<?= Form::text('ville', 'Ville : ', ['class' => 'form-control']) ?>
				</div>
				<div class="form-group col-md-6">
					<?= Form::number('cp', 'Code postal :', ['class' => 'form-control']) ?>
				</div>
				<div class="form-group col-md-6">
					<?= Form::text('voirie', 'Voirie :', ['class' => 'form-control']) ?>
				</div>
				<div class="form-group col-md-6">
					<?= Form::number('numero', 'Numero :',['class' => 'form-control']) ?>
				</div>
				<div class="form-group col-md-6">
					<?= Form::text('nom_voirie', 'Nom de la voirie :', ['class' => 'form-control']) ?>
				</div>
			</div>

			<div class="form-group col-md-12">
				<?= Form::submit('submit',' Ajouter', ['class' => 'form-control btn btn-primary']) ?>
			</div>
		</form>
		</div>
	</div>
</div>