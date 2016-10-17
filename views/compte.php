
<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-3 navbar-default navbar">
		<h2>Bonjour $username</h2>
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
		<th>Nombre de jours restants</th>
	</thead>
	<tbody>
		<tr>
			<td>$nom_formation</td>
			<td>$adresse_formation</td>
			<td>$nb_jours_restants</td>
		</tr>
	</tbody>
</table>