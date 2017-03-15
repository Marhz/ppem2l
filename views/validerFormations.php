<div class="container">
	<?php require 'views/plugins/profilMenu.php' ?>
	<div class="col-xs-12 bgwhite">
		<tabs v-cloak>
			<tab name="Formations à valider" selected="true">
				<table class="table table-striped margin datatable" id="">
					<thead>
						<tr>
							<th>Nom de l'employé</th>
							<th>Nom de la formation</th>
							<th class="hide-small-screen">Adresse</th>	
							<th>Durée</th>
							<th>Début</th>
							<th>Actions</th>
						</tr>			
					</thead>
					<tbody>
					<?php
						foreach($employes as $employe)
						{
							foreach($employe->formations as $formation)
							{
								?>
								<tr>
									<td><a href="utilisateur/<?= $employe->id ?>"><?= $employe->fullName(); ?></a></td>
									<td><a href="formation/<?= $formation->id ?>"><?= $formation->titre ?></a></td>
									<td class="hide-small-screen"><?= $formation->getAdresse() ?></td>
									<td><?= $formation->duree ?>j/<?= $employe->nbr_jour ?></td>
									<td><span class="hidden"><?= strtotime($formation->debut) ?></span><?= affDate($formation->debut) ?></td>
									<td class="center">
										<form action="valider" method="post" class="inline">
											<input type="hidden" value="<?= $formation->id ?>" name="id_f">
											<input type="hidden" value="<?= $employe->id ?>" name="id_u">
											<input type="hidden" value="1" name="valide">
											<input type="submit" value="valider" class="btn btn-success box">
										</form><form action="valider" method="post" class="inline">
											<input type="hidden" value="<?= $formation->id ?>" name="id_f">
											<input type="hidden" value="<?= $employe->id ?>" name="id_u">
											<input type="hidden" value="2" name="valide">
											<input type="submit" value="refuser" class="btn btn-danger box">
										</form>
									</td>
								</tr>
								<?php
							}
						}
						?>
					</tbody>
				</table>
			</tab>
			<tab name="Mes employés">
				<?php
					if(!$employes->isEmpty())
					{		
						foreach($employes as $employe)
						{
							?>
							<p><a href="utilisateur/<?= $employe->id ?>"><?= $employe->fullName() ?></a></p>
							<?php	
						}
					}
					else
					{
						echo "Vous n'avez pas d'employé(s).";
					}
				?>
			</tab>
		</tabs>
	</div>
</div>