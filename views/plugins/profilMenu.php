	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="#">Mon compte</a>
	    </div>
	    <ul class="nav navbar-nav">
	      <li class="active"><a href="#">Formation</a></li>
	      <li><a href="changeMdp">Changement de mot de passe</a></li>
	      <?php
	      	if(auth('user')->isChef())
	      	{
	      		?>
	      		<li><a href="validerFormations">Gestion des employés</a></li>
	      		<?php
	      	} 
	       ?>
	    </ul>
	  </div>
	</nav>