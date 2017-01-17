
<div class="row">
	<div class="col-md-12 navbar-default navbar">
		<h2><?= "Bonjour ".auth('prenom')." ".auth('nom');?></h2>
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
		<th>Status</th>
		<th>Formation</th>
		<th>Adresse</th>
		<th>Cout</th>
		<th>Duree</th>
	</thead>
	<tbody>
		<?php 
			foreach($formations as $formation)
			{
				?>
				<tr>
				<td ><i class="<?= 
					(($formation['valide'] == 1 ? 'fa fa-check green' : ($formation['valide'] == 0 ? 'fa fa-check grey' : 'fa fa-close red')));
				 ?>"></td>
				<?=
				"<td >{$formation['titre']}</td>
				<td>".formatAdresse($formation)." {$formation['ville']}</td>
				<td>{$formation['cout']}</td>
				<td>{$formation['duree']}</td>
				</tr>";
			}
		?>
	</tbody>
</table>