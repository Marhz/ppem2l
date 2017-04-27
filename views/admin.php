<div class="container container-mobile">		
    <?php 
    if(isset($messages))
    { 
        foreach($messages as $message)
        {
            ?>
            <message ><?= $message ?></message>
            <?php
        }
    }
    if(isset($csvErrors))
    { 
        foreach($csvErrors as $error)
        {
            ?>
            <message type="danger"><?= $error ?></message>
            <?php
        }
    }
    ?>
	<div class="col-xs-12 container-mobile">
		<tabs v-cloak>
			<tab name="Utilisateurs" selected="true">
				<div class="margin-bot-15 clear">
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
							<td class="hide-small-screen">Crédits</td>
							<td class="hide-small-screen">Jours restants</td>
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
									<td class="hide-small-screen"><?= $user->credit ?></td>
									<td class="hide-small-screen"><?= $user->nbr_jour ?></td>
									<td class="align-right">
										<a href="<?= baseUrl() ?>adminUsers/<?= $user->id ?>/edit">
											<button class="btn btn-success box">
												<span class="fa fa-edit"></span>
											</button>
										</a><a href="<?= baseUrl() ?>adminUsers/<?= $user->id ?>/delete">
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
				<div class="margin-bot-15 clear">
					<a href="<?= baseUrl() ?>ajouterFormation">
						<button class="btn btn-success pull-right">Ajouter une formation</button>
					</a>
				</div>
				<table class="table table-striped margin datatable" v-cloak>
					<thead>
						<tr>
							<td>Nom</td>
							<td>Cout</td>
							<td class="hide-small-screen">Places</td>
							<td>Durée</td>
							<td class="hide-small-screen">Début</td>
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
									<td class="hide-small-screen"><?= $formation->participantsCount() ?>/<?= $formation->nb_places ?></td>
									<td><?= $formation->duree ?>j</td>
									<td class="hide-small-screen"><?= affDate($formation->debut) ?></td>
									<td class="align-right">
										<a href="<?= baseUrl() ?>ajouterFormation/<?= $formation->id ?>/edit">
											<button class="btn btn-success box"><span class="fa fa-edit"></span></button>
										</a><a href="<?= baseUrl() ?>adminUsers/<?= $user->id ?>/delete">
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
				<div class="margin-bot-15 clear">
					<a href="<?= baseUrl() ?>ajouterPrestataire">
						<button class="btn btn-success pull-right">Ajouter un prestataire</button>
					</a>
				</div>
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
									<td class="align-right">
									<a href="<?= baseUrl() ?>ajouterPrestataire/<?= $prestataire->id ?>/edit">
										<button class="btn btn-success box"><span class="fa fa-edit"></span></button>
									</a><a href="<?= baseUrl() ?>ajouterPrestataire/<?= $prestataire->id ?>/delete">
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