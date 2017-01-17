		<div class="col-lg-9">
			<?php
		if(!empty($formations))
		{
			foreach($formations as $formation)
			{
				echo "<p>".$formation['titre']."</p>";
				echo "<p>Catégorie: ".$formation['type_titre']."</p>";
				echo "<p>La formation durera ".$formation['duree']." jours</p>";
				echo "<p>Elle vous coûtera ".$formation['cout']." crédit.</p>";
				echo "<p>Elle débute le: ";
				if (isset($formation['bold_date']))
					echo boldify(affDate($formation['debut'])); 
				else
					echo affDate($formation['debut']);
				// .(isset($formation['bold_date'])) ? boldify(affDate($formation['debut'])) : affDate($formation['debut']).
				echo ".</p>";
				echo "<p>Elle se situe à ".$formation['ville'].".</p>";
				echo "<p>Adresse: ".formatAdresse($formation)."</p>";

			}
		}
		else
		{
			echo "La formation que vous avez demander n'existe pas.";
		}
		?>
	</div>
    <?php include('views/plugins/sidebar.php'); ?>
