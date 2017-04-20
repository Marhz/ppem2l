<div class="container container-mobile">
	<div class="col-xs-12 bgwhite container-mobile">
		<tabs v-cloak>
			<tab name="Mes formations" selected="true">
				<table class="table table-striped datatable" id="">
					<thead>
						<th>Status</th>
						<th>Formation</th>
						<th class="hide-small-screen">Adresse</th>
						<th>Cout</th>
						<th class="hide-small-screen">Début</th>
						<th class="hide-small-screen">Duree</th>
					</thead>
					<tbody>		
						<?php
							foreach($user->formations as $formation)
							{
								?>
								<tr>
								<td ><i class="<?= 
									(($formation->valide == 1 ? 'fa fa-check green' : ($formation->valide == 0 ? 'fa fa-check grey' : 'fa fa-close red')));
								 ?>"></i></td>
								<?=
								"<td >{$formation->titre}</td>
								<td class='hide-small-screen'>{$formation->getAdresse()}</td>
								<td>{$formation->cout}</td>
								<td class='hide-small-screen'><span class='hidden'>{$formation->debut}</span>".affDate($formation->debut)."</td>
								<td class='hide-small-screen'>{$formation->duree} jours</td>
								</tr>";
							}
						?>
					</tbody>
				</table>
			</tab>
			<tab name="Profil">
				<div class="panel panel-info">
		            <div class="panel-heading">
		              <h3 class="panel-title"><?= auth('user')->fullName() ?></h3>
		            </div>
		            <div class="panel-body">
		              <div class="row">
		                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="<?= baseUrl()?>image/<?= auth('user')->avatar ?>" class="img-circle img-responsive"> </div>
		                <div class=" col-md-9 col-lg-9 "> 
		                  <table class="table table-user-information">
		                    <tbody>
		                      <tr>
		                        <td>Email :</td>
		                        <td><?= auth('user')->email ?></td>
		                      </tr>
		                      <tr>
		                        <td>Crédit restant :</td>
		                        <td><?= auth('user')->credit ?></td>
		                      </tr>
		                      <tr>
		                        <td>Nombre de jour restant :</td>
		                        <td><?= auth('user')->nbr_jour ?></td>
		                      </tr>
		                      <tr>
		                        <td>Votre responsable :</td>
		                        <td>
		                        <?= (auth('user')->chef_id != null) ? auth('user')->chef->fullName() : "L' Administrateur"; 
		                       	?>
		                       	<span class="pull-right">
		                       		<a href="#" class="btn btn-primary"><i class="glyphicon glyphicon-envelope"></i> Contact</a>
		                       	</span>
		                        </td>
		                      </tr>
		             		</tbody>
		                  </table>
		                </div>
		              </div>
		            </div>
	                <div class="panel-footer">
	                <?php if(!auth('user')->isAdmin()){ ?>
	                    <span>
	                    	<a href="#"><button type="button" class="btn btn-danger"><i class="glyphicon glyphicon-edit" aria-hidden="false"></i> Editer son profil</button></a>
	                    </span>
					<?php }else{ ?>
	                    <div>
	                    	<a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i>   Contact</a>
	                        <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i> Editer</a>
	                        <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i> Supprimer</a>
	                    </div>
	                <?php } ?>
	                </div>
	            </div>
    
			</tab>
		</tabs>
		
	</div>
</div>