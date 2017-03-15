<template>
	<small class="error" v-if="addressNotFound">Google maps n'a pas pu trouver l'addresse de cette formation</small>
	<div id="map" v-else></div>
</template>

<script>
	export default {
		props: ['address'],
		data: function () {
			return {
				addressNotFound: false
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
			}
		}
	}
</script>