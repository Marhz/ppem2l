<template>
	<div>
		<small class="error" v-if="addressNotFound">Google maps n'a pas pu trouver l'addresse de cette formation</small>
		<div v-else class="relative">
			<input type="text" class="map-directions" v-model="destinationAddress" @keyup="drawDirections">
			<div id="map"></div>
		</div>
	</div>
</template>

<script>
	export default {
		props: ['address'],
		data: function () {
			return {
				addressNotFound: false,
				destinationAddress: '',
				map: '',
				direction: false,
				instantDirections : false
			}
		},
		methods: {
			initMap: function() {
				new google.maps.Geocoder().geocode({address: this.address}, (results, status) => {
					if(status === google.maps.GeocoderStatus.OK)
						this.drawMap(results[0].geometry.location)
					else
						this.addressNotFound = true
				})
			},
			drawMap: function (location) {
				let map = new google.maps.Map(document.querySelector('#map'), {
				center: location,
				zoom: 12
				})
				new google.maps.Marker({
					map: map,
					position: map.center
				})
				this.map = map
				if(this.instantDirections)
					this.drawDirections()
			},
			drawDirections: function () {
				if(!this.direction)
					this.direction = new google.maps.DirectionsRenderer()
				this.direction.setMap(null)
				this.direction.setMap(this.map)
				let request = {
					origin: this.address,
					destination: this.destinationAddress,
					travelMode: google.maps.DirectionsTravelMode.DRIVING
				}
				let directionsService = new google.maps.DirectionsService()
				directionsService.route(request, (results, status) => {
					if(status === google.maps.DirectionsStatus.OK) {
						this.direction.setDirections(results)
					}
					// else
					// 	console.log('yolo')
					localStorage.setItem('destinationAddress', JSON.stringify(this.destinationAddress))
				})
			},
		},
		created() {
			console.log('yolo')
			console.log(localStorage.getItem('destinationAddress'))
			if(localStorage.getItem('destinationAddress')) {
				this.destinationAddress = JSON.parse(localStorage.getItem('destinationAddress'))
				this.instantDirections = true
			}
		}
	}
</script>

<style>
	.map-directions {
		position: absolute;
		z-index: 1000;
		right:15px;
		top: 15px;

	}
</style>