<div class="container container-mobile">
	<div class="col-xs-12 container-mobile">
		<tabs v-cloak>
			<tab name="Utilisateurs" selected="true">
				<div class="">
					<a href="<?= baseUrl() ?>ajouterUser">
						<button class="btn btn-success pull-right">Ajouter un utilisateur</button>
					</a>
					<button class="btn btn-primary pull-right">Ajouter des utilisateurs via csv</button>
				</div>
				<table class="table table-striped margin datatable" v-cloak>
					<thead>
						<tr>
							<td>Nom</td>
							<td>E-mail</td>
							<td>Crédits</td>
							<td>Jours restants</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach($users as $user)
							{
								?>
								<tr>
									<td>
										<a href="<?= baseUrl() ?>compte/<?= $user->id ?>"><?= $user->fullName() ?></a>
									</td>
									<td><?= $user->email ?></td>
									<td><?= $user->credit ?></td>
									<td><?= $user->login ?></td>
									<td class="center">
										<a href="<?= baseUrl() ?>adminUsers/<?= $user->id ?>/edit">
											<button class="btn btn-success box">
												<span class="fa fa-edit"></span>
											</button>
										</a>
										<a href="<?= baseUrl() ?>adminUsers/<?= $user->id ?>/delete">
											<button class="btn btn-danger box">
												<span class="fa fa-trash"></span>
											</button>
										</a>
									</td>
								</tr>
								<?php
							}
						?>
					</tbody>
				</table>
			</tab>
			<tab name="Formations">
				<table class="table table-striped margin datatable" v-cloak>
					<thead>
						<tr>
							<td>Nom</td>
							<td>E-mail</td>
							<td>Crédits</td>
							<td>Jours restants</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach($formations as $formation)
							{
								?>
								<tr>
									<td><?= $formation->titre ?></td>
									<td><?= $formation->cout ?></td>
									<td><?= $formation->duree ?></td>
									<td><?= $formation->debut ?></td>
									<td class="center">
										<a href="<?= baseUrl() ?>ajouterFormation/<?= $formation->id ?>/edit">
											<button class="btn btn-success box"><span class="fa fa-edit"></span></button>
										</a>
										<a href="<?= baseUrl() ?>adminUsers/<?= $user->id ?>/delete">
											<button class="btn btn-danger box"><span class="fa fa-trash"></span></button>
										</a>
									</td>
								</tr>
								<?php
							}
						?>
					</tbody>
				</table>
			</tab>
			<tab name="Prestataires">
				<table class="table table-striped margin datatable" v-cloak>
					<thead>
						<tr>
							<td>Raison sociale</td>
							<td>Adresse</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach($prestataires as $prestataire)
							{
								?>
								<tr>
									<td><?= $prestataire->raison_sociale ?></td>
									<td><?= $prestataire->adresse->format() ?></td>
									<td class="center">
									<a href="<?= baseUrl() ?>ajouterPrestataire/<?= $prestataire->id ?>/edit">
										<button class="btn btn-success box"><span class="fa fa-edit"></span></button>
									</a>
									<a href="<?= baseUrl() ?>ajouterPrestataire/<?= $prestataire->id ?>/delete">
										<button class="btn btn-danger box"><span class="fa fa-trash"></span></button>
									</a>
									</td>
								</tr>
								<?php
							}
						?>
					</tbody>
				</table>
			</tab>		
		</tabs>
	</div>
</div>