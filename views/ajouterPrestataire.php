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
<!-- 				<div class="form-group col-md-12">
					<label for="adresse_id">Adresse :</label>
						<div class="input-group">
						<select name="adresse_id" id="adresse_id" class="form-control" :disabled="showAddrForm" placeholder="Selectionnez ou ajoutez une formation" required>
							<option value="" disabled selected hidden>Selectionnez ou ajoutez une addresse</option>
						</select>
						<span @click="switchAddrForm" class="plus-icon input-group-addon fa fa-icons" :class="[showAddrForm ? 'fa-minus-square red' : 'fa-plus-square green']"></span>
					</div>
				</div> -->
				<select-or-disable :elements='<?= $adresses ?>' name="adresse">
					<transition name="fade" mode="out-in">
						<div  v-cloak class="col-md-12 adresse_form slideUp">
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
					</transition>
				</select-or-disable>
				<div class="form-group col-md-12">
					<?= Form::submit('submit',' Ajouter', ['class' => 'form-control btn btn-primary']) ?>
				</div>
			</form>
			</div>
		</div>
	</div>
</div>

<?php Core\Session::js('addrForm.js') ?>