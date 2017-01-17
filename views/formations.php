		<div class="col-lg-9">
			<?php
		if(!empty($formations))
		{
			foreach($formations as $formation)
			{
				echo "<h2>".$formation['titre']."</h2>";
				echo "<p>Catégorie: ".$formation['type_titre']."</p>";
				echo "<p>La formation durera ".$formation['duree']." jours</p>";
				echo "<p>Elle vous coûtera ".$formation['cout']." crédit.</p>";
				echo "<p>Elle débute le ".affDate($formation['debut'])." .</p>";
				echo "<p>Elle se situe à ".$formation['ville'].".</p>";
				echo "<p>Adresse: ".formatAdresse($formation)." .</p>";

			}
		}
		else
		{
			echo "La formation que vous avez demander n'existe pas.";
		}
		?>
	</div>
    <?php include('views/plugins/sidebar.php'); ?>
