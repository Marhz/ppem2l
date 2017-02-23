		<div class="col-lg-9">
			<h1 class="title">Formations à venir</h1>
					

					<?php 
						foreach($formations as $formation)
						{
							?>
								<div class="annonce col-md-12 <?= $formation->id % 2 == 0 ? 'annonceleft' : 'annonceright'?>">
									<?php 
									if(($formation->id % 2) == 0)
								    {?>
										<div class="col-md-4 center-block">
											<img class="center-block" src="image/<?= isset($formation->image) ? $formation->image : 'logoformation.png'?>" />
										</div>
										<div class="col-md-8">										
											<p><nav class="formtitre"><?= $formation->titre ?></nav>
												<nav class="formLieu">		
													<p>
														Le <?= affDate($formation->debut) ?>
													</p>
													<p>
														Durée <?= $formation->duree ?> jours.
													</p>
													<p>
														Formation délivré par <?= $formation->prestataire->raison_sociale ?>	
													</p>
													<p>
														Elle coûte <?= $formation->cout ?> crédits.
													</p>
												</nav>
											</p>
										</div>
									<?php
									}
									else
									{
									?>
										<div class="col-md-8">										
											<p><nav class="formtitre"><?= $formation->titre ?></nav>
												<nav class="formLieu">		
													<p>
														Le <?= affDate($formation->debut) ?>
													</p>
													<p>
														Durée <?= $formation->duree ?> jours.
													</p>
													<p>
														Formation délivré par <?= $formation->prestataire->raison_sociale ?>	
													</p>
													<p>
														Elle coûte <?= $formation->cout ?> crédits.
													</p>
												</nav>
											</p>
										</div>
										<div class="col-md-4 center-block">
											<img class="center-block" src="image/<?= isset($formation->image) ? $formation->image : 'logoformation.png'?>" />
										</div>

									<?php } ?>
									<div class="col-md-12">
										<div class="col-md-12 annonce">
											<p class="description"><?= substr($formation->description,0,250) ?>...</p>
											<a href="#" class="btn btn-success pull-right"><span class="glyphicon glyphicon-align-left"></span>Read More</a>
										</div>
									</div>
								</div>
							<?php
						}
					?>
		</div>

		<?php
			$_SESSION['scripts'][] = "<script>$('#yolo');</script>";
            include('views/plugins/sidebar.php');

        ?>