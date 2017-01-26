<?php require 'views/plugins/profilMenu.php' ?>
<div class="col-lg-9 col-xs-12">
<h2>Demande de formations en attente de validation</h2>
<table class="table table-striped" id="datatable">
	<thead>
		<tr>
			<th>Nom de l'employé</th>
			<th>Nom de la formation</th>
			<th class="hide-small-screen">Adresse</th>
			<th>Cout</th>
			<th>Durée</th>
			<th>Début</th>
			<th>Actions</th>
		</tr>			
	</thead>
	<tbody>
<?php
	foreach($employes as $employe)
	{
		if(!$employe->formations->isEmpty())
		{
		?>
<!-- 			<tr>
				<td colspan="12" class="table-breaker"><h5>Employé : <?= $employe->fullName(); ?></h5></td>
			</tr>
 -->		<?php
		}	
		foreach($employe->formations as $formation)
		{
			?>
			<tr>
				<td><a href="utilisateur/<?= $employe->id ?>"><?= $employe->fullName(); ?></a></td>
				<td><a href="formation/<?= $formation->id ?>"><?= $formation->titre ?></a></td>
				<td class="hide-small-screen"><?= $formation->getAdresse() ?></td>
				<td><?= $formation->cout ?>/<?= $employe->credit ?></td>
				<td><?= $formation->duree ?>j/<?= $employe->nbr_jour ?></td>
				<td><span class="hidden"><?= strtotime($formation->debut) ?></span><?= affDate($formation->debut) ?></td>
				<td>
					<form action="valider" method="post" class="inline">
						<input type="hidden" value="<?= $formation->id ?>" name="id_f">
						<input type="hidden" value="<?= $employe->id ?>" name="id_u">
						<input type="hidden" value="1" name="valide">
						<input type="submit" value="valider" class="btn btn-success box">
					</form>
					<form action="valider" method="post" class="inline">
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
	<div class="">
		<h1>Mes employés</h1>
		<?php
			foreach($employes as $employe)
			{
				?>
				<p><a href="utilisateur/<?= $employe->id ?>"><?= $employe->fullName() ?></a></p>
				<?php	
			}
			?>
	</div>
</div>
<?php
	include('views/plugins/sidebar.php');
?>
