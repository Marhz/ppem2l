		<div class="col-lg-9">
			<?php
		if(!empty($formations))
		{
			foreach($formations as $formation)
			{
				echo "<h2>".$formation['titre']."</h2>";
				echo "<p>La formation durera ".$formation['duree']." jours</p>";
				echo "<p>Elle vous coûtera ".$formation['cout']." crédit.</p>";
				echo "<p>Elle débute le ".affDate($formation['debut'])." .</p>";
			}
		}
		else
		{
			echo "La formation que vous avez demander n'existe pas.";
		}
		?>
	</div>
    <?php include('views/plugins/sidebar.php'); ?>
