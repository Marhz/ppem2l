<template>
	<div class="annonce clear">
		<div v-if="formation.status">		
			<div class="annonce-status-box" :class="formation.status"></div>
			<div class="fa fa-check-circle annonce-status"></div>
		</div>
		<div class="pull-right annonce-type">{{ formation.type.titre }}</div>
		<div class="col-xs-12 no-padding">
			<div class="annonce-details">
				<span>
					Débute le: {{ formation.debut }}
				</span>
				<br/>
				<span>
					Durée: {{ formation.duree }} jours.
				</span>
				<br/>
				<span>
					Coût: {{ formation.cout }} crédits.
				</span>
			</div>
			<img class="center-block" :src="baseUrl+'image/'+'curling.png'" />
			<div class="annonce-details-overlay"></div>
		</div>
		<div class="col-xs-12 col-md-12 annonce-bottom">
			<p>
				<div class="formtitre">{{ formation.titre }}</div>
				<div class="btn-container">
					<a :href="baseUrl+'formations/'+formation.id" class="btn btn-primary annonce-button">
						<span class="glyphicon glyphicon-align-left"></span> Plus d'infos
					</a>
					<a :href="baseUrl+'inscription/'+formation.id" class="btn btn-success annonce-button" v-if="formation.canDo && !formation.alreadyIn">
						<span class="glyphicon glyphicon-align-left"></span> S'inscrire
					</a>
					<a v-else-if="formation.alreadyIn" :href="baseUrl+'cancelFormation/'+formation.id" class="btn btn-warning annonce-button">
						<span class="glyphicon glyphicon-align-left"></span> Se désinscrire
					</a>
					<div v-else>
						<div class="clear"></div>
						<small class="error annonce-error">{{ formation.cantDoBecause }}</small>
					</div>
				</div>
			</p>
		</div>
	</div>	
</template>

<script>
	export default {
		props: ['data'],
		data() {
			return {
				formation: this.data,
				baseUrl
			}
		},
	}
</script>