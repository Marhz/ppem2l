<?php require 'views/plugins/profilMenu.php' ?>
	<div class="col-xs-12">
		<table class="table table-striped" id="datatable">
			<thead>
				<th>Status</th>
				<th>Formation</th>
				<th>Adresse</th>
				<th>Cout</th>
				<th>Début</th>
				<th>Duree</th>
			</thead>
			<tbody>		

				<?php
					foreach($user->formations as $formation)
					{
						?>
						<tr>
						<td ><i class="<?= 
							(($formation->valide == 1 ? 'fa fa-check green' : ($formation->valide == 0 ? 'fa fa-check grey' : 'fa fa-close red')));
						 ?>"></i></td>
						<?=
						"<td >{$formation->titre}</td>
						<td>{$formation->getAdresse()}</td>
						<td>{$formation->cout}</td>
						<td><span class='hidden'>{$formation->debut}</span>".affDate($formation->debut)."</td>
						<td>{$formation->duree}j</td>
						</tr>";
					}
				?>
			</tbody>
		</table>
	</div>
