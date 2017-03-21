<div class="container container-mobile">
	<div class="col-xs-12 container-mobile">
		<tabs>
			<tab name="Utilisateurs" selected="true">
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
									<td><?= $user->fullName() ?></td>
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
										<button class="btn btn-success box"><span class="fa fa-edit"></span></button>
										<button class="btn btn-danger box"><span class="fa fa-trash"></span></button>
									</td>
								</tr>
								<?php
							}
						?>
					</tbody>
				</table>
			</tab>
			<tab name="Prestataires">

			</tab>		
		</tabs>
	</div>
</div>