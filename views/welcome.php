		<div class="col-lg-9">
			<h1 class="title">Formations à venir</h1>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Formation</th>
						<th>Prestataire</th>
						<th>Cout</th>
						<th>Durée</th>
						<th>Date de début</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						foreach($formations as $formation)
						{
							echo "</tr>
								<td>".$formation->titre."</td>
								<td>ITIC</td>
								<td>".$formation->cout."</td>
								<td>".$formation->duree."</td>
								<td>".$formation->debut."</td>
							</tr>";
						}
					?>
					
				</tbody>
			</table>
		</div>

		<?php
			$_SESSION['scripts'][] = "<script>$('#yolo');</script>";
            include('views/plugins/sidebar.php');

        ?>