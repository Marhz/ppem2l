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
					<div class="form-group">
						<label for="raison_sociale">Raison sociale :</label>
							<input type="text" name="raison_sociale" id="raison_sociale" class="form-control " placeholder="" value="" required />
					</div>
					
				</div>
				<div class="form-group col-md-12">
					<label for="adresse_id">Adresse :</label>
					<!-- <?= Form::select('adresse_id', 'Adresse :', $adresses, ['class' => 'form-control', 'v-bind:showAddrForm']) ?> -->
						<div class="input-group">
						<select name="adresse_id" id="adresse_id" class="form-control" :disabled="showAddrForm">
							<?php
								$i = 0;
								foreach($adresses as $key => $value)
								{
									?>
									<option value="<?= $key ?>" <?= ($i == 0) ? "selected" : null ?>><?= $value ?></option>
									<?php
									$i++;
								}
							?>
						</select>
						<span @click="switchAddrForm" class="plus-icon input-group-addon fa fa-plus-square fa-icons"></span>
					</div>
				</div>

				<div v-if="showAddrForm" v-cloak class="col-md-12 adresse_form">
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
</div>

<?php Core\Session::js('addrForm.js') ?>