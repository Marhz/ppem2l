
<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-3 navbar-default navbar">
		<h2><?= "Bonjour {$_SESSION['prenom']} {$_SESSION['nom']}";?></h2>
	</div>
</div>
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
</div>

<table class="table table-striped">
	<thead>
		<th>Formation</th>
		<th>Adresse</th>
		<th>Cout</th>
		<th>Duree</th>
	</thead>
	<tbody>
		<?php 
			foreach($user_formations_history as $history)
			{
				echo "
				<tr>
				<td>{$history['titre']}</td>
				<td>{$history['numero']}{$history['rue']}{$history['ville']}</td>
				<td>{$history['cout']}</td>
				<td>{$history['duree']}</td>
				</tr>";
			}
		?>
	</tbody>
</table>

