<template>
	<div class="relative">
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
			<div class="clear"></div>
		</div>
		<pagination 
			:current="pages[0].current" 
			:last="pages[0].lastPage" 
			url="home/" 
			@home="updateFormations" 
			@loading="loading = true"
		></pagination>
		<div class="loading" v-if="loading">
			<span class="fa fa-spin fa-refresh"></span>
			<p>Chargement</p>
		</div>
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
				this.loading = false
				this.formations = data.filter(item => !item.hasOwnProperty('current'))
				let newPages = data.filter(item => item.hasOwnProperty('current'))
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
		overflow-x:hidden;
	}
	.slide-left-enter-active {
		filter: blur(0px);
		animation: slide-left-in .8s;
		animation-timing-function: ease-out;
	}
	.slide-left-leave-active {
		filter: blur(0px);
		animation: slide-left-out .3s;
		animation-timing-function: linear;
	}
	.slide-left-enter-active .annonce{
		animation: slide-skew-left .8s;
	}
	@keyframes slide-skew-left {
		0% {
			transform: skewX(7deg);
		}
		50% {
			transform: skewX(0deg);
		}
		60% {
			transform: skewX(-5deg);
		}
		80% {
			transform: skewX(-2deg);
		}
		100% {
			transform: skewX(0deg);
		}
	}
	.slide-left-leave-active .annonce{
		transform: skewX(10deg);
	}
	.slide-right-enter-active .annonce{
		animation: slide-skew-right .8s;
	}
	.slide-right-leave-active .annonce{
		transform: skewX(10deg);
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
	@keyframes slide-skew-right {
		0% {
			transform: skewX(7deg);
		}
		50% {
			transform: skewX(0deg);
		}
		60% {
			transform: skewX(-5deg);
		}
		80% {
			transform: skewX(-2deg);
		}
		100% {
			transform: skewX(0deg);
		}
	}
	.slide-right-enter-active {
		filter: blur(0px);
		animation: slide-right-in .8s;
		animation-timing-function: ease-out;
	}
	.slide-right-leave-active {
		filter: blur(0px);
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
	.loading {
		position: absolute;
		top: 0;
		bottom: 0;
		left: 0;
		right: 0;
		z-index:1000;
		background: rgba(255,255,255,.8);
		font-size: 30px;
		text-align: center;
		display: flex;
		align-items: center;
		justify-content: center;
		flex-direction: column;
	}
</style>