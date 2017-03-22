	<div class="container container-mobile">
	<!-- <?php require 'views/plugins/profilMenu.php' ?> -->
		<div class="col-xs-12 container-mobile">
			<table class="table table-striped datatable" id="">
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
							<td>{$formation->duree} jours</td>
							</tr>";
						}
					?>
				</tbody>
			</table>
			<a href="createPDF"><button type="button" class="btn btn-danger"><i class="fa fa-file-pdf-o" aria-hidden="false"></i>Générer pdf</button>
		</div>
	</div>