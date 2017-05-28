<div class="container container-mobile">
	<div class="col-xs-12 bgwhite container-mobile">
		<tabs v-cloak>
			<tab name="Profil" selected="true">
				<div class="panel panel-info">
		            <div class="panel-heading">
		              <h3 class="panel-title"><?= $user->fullName() ?></h3>
		            </div>
		            <div class="panel-body">
		              <div class="row">
		                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="<?= baseUrl().auth('user')->avatar ?>" class="img-circle img-responsive"> </div>
		                <div class=" col-md-9 col-lg-9 "> 
		                  <table class="table table-user-information">
		                    <tbody>
		                      <tr>
		                        <td>Email :</td>
		                        <td><?= $user->email ?></td>
		                      </tr>
		                      <tr>
		                        <td>Crédit restant :</td>
		                        <td><?= $user->credit ?></td>
		                      </tr>
		                      <tr>
		                        <td>Nombre de jour restant :</td>
		                        <td><?= $user->nbr_jour ?></td>
		                      </tr>
		                      <tr>
		                        <td>Votre responsable :</td>
		                        <td>
		                        <?= ($user->chef_id != null) ? $user->chef->fullName() : "L' Administrateur"; 
		                       	?>
		                       	<div class="clear"></div>
		                       	<span class="pull-right">
		                       		<a href="contact" class="btn btn-primary"><i class="glyphicon glyphicon-envelope"></i> Contact</a>
		                       	</span>
		                        </td>
		                      </tr>
		             		</tbody>
		                  </table>
		              	<?php if(auth('user')->id === $user->id) { ?>
		              		<form method="POST" action="<?= baseUrl()."updateAvatar" ?>" enctype="multipart/form-data">
		              			<div class="form-group">
		              				<label for="avatar">Changer de photo de profil</label>
		              				<input type="file" name="avatar" id="avatar" class="form-control">
		              			</div>
		              			<button type="submit" name="submit" class="btn btn-primary pull-right">Envoyer</button>
		              		</form>
		              	<?php } ?>

		                </div>
		              </div>
		            </div>
	                <div class="panel-footer">
	                    <div>
	                    	<a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i> Contact</a>
	                		<?php if(auth('user')->isAdmin()){ ?>
		                        <a href=<?= baseUrl() ?>ajouterUser/<?= $user->id ?>   data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i> Editer</a>
		                        <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i> Supprimer</a>
	                		<?php } ?>
	                    </div>
	                </div>
	            </div>
			</tab>
		<?php if(isset($formations)) 
		{
			?>
				<tab name="Mes formations">
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
			<?php
		}
		?>
		</tabs>
		
	</div>
</div>