<template>
	<div class="">
		<pagination 
			:current="pages[0].current" 
			:last="pages[0].lastPage" 
			url="home/" 
			@home="updateFormations" 
			@loading="loading = true"
		></pagination>
		<div class="full">
			<transition :name="transition" mode="out-in">
				<div :key="formations[0].id">
					<div class="col-xs-12 col-sm-6 col-lg-4 margin-bot-50" v-for="formation in formations">
						<formation :data="formation" ></formation>
					</div>
				</div>
				</transition>
			</transition>
			<div class="clear"></div>
		</div>
		<pagination 
			:current="pages[0].current" 
			:last="pages[0].lastPage" 
			url="home/" 
			@home="updateFormations" 
			@loading="loading = true"
		></pagination>
	</div>
</template>

<script>
	import formation from './formation.vue'
	import pagination from '../pagination.vue'

	export default {
		components: { formation, pagination },
		props: ['data'],
		data() {
			return {
				formations: this.data.filter(item => !item.hasOwnProperty('current')),
				pages: this.data.filter(item => item.hasOwnProperty('lastPage')),
				direction: '',
				loading: false
			}
		},
		methods: {
			updateFormations(data) {
				this.formations = data.filter(item => !item.hasOwnProperty('current'))
				let newPages = data.filter(item => item.hasOwnProperty('current'))
				console.log(this.pages.current, newPages.current)
				if(this.pages[0].current > newPages[0].current)
					this.direction = 'right'
				else
					this.direction = 'left'
				this.pages = newPages 
			}
		},
		computed: {
			transition() {
				return "slide-"+this.direction
			}
		}
	}
</script>

<style>
	.full {
	}
	.slide-left-enter-active {
		overflow: hidden;
		animation: slide-left-in .5s;
		animation-timing-function: ease-out;
	}
	.slide-left-leave-active {
		overflow: hidden;
		animation: slide-left-out .3s;
		animation-timing-function: linear;
	}
	@keyframes slide-left-in {
		0% {
			transform: translateX(100%);
		}
		50% {
			transform: translateX(-40%);
		}
		100% {
			transform: translateX(0%);
		}
	}
	@keyframes slide-left-out {
		0% {
			transform: translateX(0%);
		}
		100% {
			transform: translateX(-100%);
		}
	}

	.slide-right-enter-active {
		overflow: hidden;
		animation: slide-right-in .5s;
		animation-timing-function: ease-out;
	}
	.slide-right-leave-active {
		overflow: hidden;
		animation: slide-right-out .3s;
		animation-timing-function: linear;
	}
	@keyframes slide-right-in {
		0% {
			transform: translateX(-100%);
		}
		50% {
			transform: translateX(40%);
		}
		100% {
			transform: translateX(0%);
		}
	}
	@keyframes slide-right-out {
		0% {
			transform: translateX(0%);
		}
		100% {
			transform: translateX(100%);
		}
	}
</style>