<div class="row">
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="#">Mon compte</a>
	    </div>
	    <ul class="nav navbar-nav">
	      <li class="active"><a href="#">Formation</a></li>
	      <li><a href="#">Changement de mot de passe</a></li>
	    </ul>
	  </div>
	</nav>

	<div class="container">
		<div class="col-md-8">
			<?php
		if(!empty($formations))
		{
			foreach($formations as $formation)
			{
				echo "<h2>".$formation['titre']."</h2>";
				echo "<p>La formation durera".$formation['duree']." heure</p>";
				echo "<p>Elle vous coûtera ".$formation['cout']." crédit (rappelez vous que vous disposer de 5000 crédit au départ).</p>";
				echo "<p>Elle débute le".$formation['debut']." .</p>";
			}
		}
		else
		{
			echo "La formation que vous avez demandez n'existe pas.";
			
		}?>
				
		</div> <!-- Formation -->
		<div class="col-md-4">
			
		</div> <!-- Menu à droite -->
	</div>
</div>