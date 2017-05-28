<template>
	<vue-datepicker 
		:bootstrapStyling="true"
		:calendar-button="true" 
		calendar-button-icon="fa fa-calendar" 
		language="fr"
		name="debut"
		v-model="date"
		format="yyyy-MM-dd"
		:id="inputId"
	></vue-datepicker>
</template>

<script>
	import vueDatepicker from 'vuejs-datepicker'
	export default {
		props: ['default', 'inputId'],
		components: { vueDatepicker },
		data() {
			return {
				date: new Date()
			}
		},
		computed : {
			now() {
				return window.moment()
			}
		},
		created() {
			if(this.default !== "") {
				this.date = this.default
			}
		}
	}
</script>

<style>
	.vdp-datepicker .fa {
		font-size: 1rem !important;
	}
</style>