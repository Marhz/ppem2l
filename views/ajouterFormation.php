<?php use Core\Form; ?>
<div id="addrForm">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-primary">
			<div class="panel-heading">
				Ajouter une formation
			</div>
			<div class="panel-body">
			<form action="ajouterFormation" method="post">
				<div class="form-group col-md-12">
					<?= Form::text('titre', 'Nom de la formation :', ['class' => 'form-control']) ?>
				</div>
				<div class="form-group col-md-12">
					<?= Form::textarea('description', 'Description :', ['class' => 'form-control']) ?>
				</div>
				<div class="form-group col-md-6">
					<?= Form::input('date', 'debut', 'Date de début: ', ['class' => 'form-control']) ?>
				</div>
				<div class="form-group col-md-6">
					<?= Form::number('duree', 'Durée(en jours) :', ['class' => 'form-control']) ?>
				</div>
				<div class="form-group col-md-6">
					<?= Form::number('cout', 'Cout :', ['class' => 'form-control']) ?>
				</div>
				<div class="form-group col-md-6">
					<?= Form::number('nb_places', 'Nombre de places:', ['class' => 'form-control']) ?>
				</div>
				<select-or-disable :elements='<?= $types ?>' name="type">
					<transition name="fade" mode="out-in">
						<div v-cloak class="col-md-12 adresse_form slideUp">
							<div class="form-group col-md-12">
								<?= Form::text('type_titre', 'Titre : ', ['class' => 'form-control']) ?>
							</div>
						</div>
					</transition>
				</select-or-disable>
				<select-or-disable :elements='<?= htmlspecialchars($prestataires) ?>' name="prestataire">
					<transition name="fade" mode="out-in">
						<div v-cloak class="col-md-12 adresse_form slideUp">
							<div class="form-group col-md-12">
								<?= Form::text('raison_sociale', 'Raison sociale : ', ['class' => 'form-control']) ?>
								<select-or-disable :elements='<?=htmlspecialchars($adresses) ?>' name='prestataire_adresse' bsclass="false">
									<div v-cloak class="col-md-12 adresse_form slideUp">
										<div class="form-group col-md-12">
											<?= Form::text('presta_ville', 'Ville : ', ['class' => 'form-control']) ?>
										</div>
										<div class="form-group col-md-6">
											<?= Form::number('presta_cp', 'Code postal :', ['class' => 'form-control']) ?>
										</div>
										<div class="form-group col-md-6">
											<?= Form::text('presta_voirie', 'Voirie :', ['class' => 'form-control']) ?>
										</div>
										<div class="form-group col-md-6">
											<?= Form::number('presta_numero', 'Numero :',['class' => 'form-control']) ?>
										</div>
										<div class="form-group col-md-6">
											<?= Form::text('presta_nom_voirie', 'Nom de la voirie :', ['class' => 'form-control']) ?>
										</div>
									</div>
								</select-or-disable>
							</div>
						</div>
					</transition>
				</select-or-disable>
				<select-or-disable :elements='<?= $adresses ?>' name="adresse">
					<transition name="fade" mode="out-in">
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