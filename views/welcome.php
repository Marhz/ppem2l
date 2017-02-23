		<div class="col-lg-9">
			<h1 class="title">Formations à venir</h1>
					

					<?php 
						foreach($formations as $formation)
						{
							?>
								<div class="annonce col-md-12">
									<div class="col-md-12">										
										<p><nav class="formtitre"><?= $formation->titre ?></nav>
											<nav class="formLieu">
											Elle aura lieu le <?= affDate($formation->debut) ?>
											et dure <?= $formation->duree ?> jours.
											</nav>
										</p>
									</div>
							<?php
							if($formation->id % 2 == 0)
							{
								?>
								<div class="row">
									<div class="col-md-4">
										<img class="img-thumbnail" src="image/<?= isset($formation->image) ? $formation->image : 'logoformation.png'?>" />
									</div>
									<div class="col-md-8">
										<p class="description"><?= $formation->description ?></p>
										<p>Formation délivré par <?= $formation->prestataire->raison_sociale ?></p>
										<p>
											Elle coûte <?= $formation->cout ?> crédits.
										</p>
										<a href="#" class="btn btn-success pull-right"><span class="glyphicon glyphicon-align-left"></span>Read More</a>
									</div>
								</div>
								<?php
							}
							else
							{
								?>
								<div class="row">
									<div class="col-md-8">
										<p class="description"><?= $formation->description ?></p>
										<p>Formation délivré par <?= $formation->prestataire->raison_sociale ?></p>
										<p>
											Elle coûte <?= $formation->cout ?> crédits.
										</p>
										<a href="#" class="btn btn-success pull-right"><span class="glyphicon glyphicon-align-left"></span>Read More</a>
									</div>
									<div class="col-md-4">
										<img class="img-thumbnail"  src="image/<?= isset($formation->image) ? $formation->image : 'logoformation.png'?>" />
									</div>
								</div>
								<?php
							}
							?>
								</div>
							<?php
						}
					?>
		</div>

		<?php
			$_SESSION['scripts'][] = "<script>$('#yolo');</script>";
            include('views/plugins/sidebar.php');

        ?>