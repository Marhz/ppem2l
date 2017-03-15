<template>
	<div class='alert alert-dismissible' :class="'alert-'+type" role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>{{message}}</strong></div>	
</template>

<script>
	export default {
		props: {
			type: {default: 'success'},
			message: ''
		}
	}
</script>