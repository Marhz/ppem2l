<?php use Core\Form; ?>
<div id="addrForm">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-primary">
			<div class="panel-heading">
				Ajouter un prestataire
			</div>
			<div class="panel-body">
			<form action="ajouterPrestataire" method="post">
				<div class="form-group col-md-12">
					<label for="raison_sociale">Raison sociale :</label>
					<input type="text" name="raison_sociale" id="raison_sociale" class="form-control " placeholder="" value="<?= $prestataire->raison_sociale ?>" required />
				</div>
				<select-or-disable :elements='<?= $adresses ?>' name="adresse" 
				old="<?= $prestataire->adresse_id?>">
					<div v-cloak class="col-md-12 adresse_form slideUp">
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
				</select-or-disable>
				<?php 
				if(isset($_GET['id']))
                { ?>
                    <input type="hidden" name="id" value="<?= $_GET['id'] ?>" />
                <?php 
                }
                ?>
				<div class="form-group col-md-12">
					<?= Form::submit('submit',' Ajouter', ['class' => 'form-control btn btn-primary']) ?>
				</div>
			</form>
			</div>
		</div>
	</div>
</div>

<!--  -->