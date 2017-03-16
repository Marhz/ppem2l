	<nav class="navbar navbar-default navbar-account">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="#">Mon compte</a>
	    </div>
	    <ul class="nav navbar-nav">
	      <li <?php if($page=="formation"){echo "class='active'";}?> ><a href="<?= baseUrl() ?>compte">Formation</a></li>
	      <li <?php if($page=="changeMdp"){echo "class='active'";}?> ><a href="<?= baseUrl() ?>changeMdp">Changement de mot de passe</a></li>
	      <?php
	      	if(auth('user')->isChef())
	      	{
	      		?>
	      		<li <?php if($page=="gestion"){echo "class='active'";}?> ><a href="<?= baseUrl() ?>validerFormations">Gestion des employés</a></li>
	      		<?php
	      	} 
	      	if(auth('user')->isAdmin())
	      	{
	      		?>
	      		<li <?php if($page=="admin"){echo "class='active'";}?> ><a href="<?= baseUrl() ?>admin">Administration</a></li>
	      		<?php
	      	}
	       ?>
	    </ul>
	  </div>
	</nav>