<template>
	<div>
		<div class="tabs">
			<ul class="nav nav-tabs">
				<li v-for="tab in tabs" :class="[{'active' : tab.isActive }, col]" >
					<a :href="tab.href" @click="selectTab(tab.href)" >{{tab.name}}</a>
				</li>
			</ul>
		</div>

		<div class="tabs-details">
			<slot></slot>
		</div>
	</div>
</template>

<script>
	// import tab from './tab.vue';
	export default {
		// components: {tab},
		data() {
			return { 
				tabs: [],
				tabsNb: 0
			}
		},
		created() {
			this.tabs = this.$children;
		},
		mounted() {
			var href = window.location.hash;
			if(href) {
				this.selectTab(href);
			}
			this.tabsNb = 12/this.$children.length
		},
		methods: {
			selectTab(href) {
				this.tabs.forEach(tab => {
					tab.isActive = (tab.href == href);
				});
			}
		},
		computed: {
			col() {
				return "col-xs-"+this.tabsNb
			}
		}
	}
</script>

<style>
	.tabs {
		padding: 0;
	}
	.tabs li {
		display: inline-block;
		padding: 0;
		height: 50%;
	}
	.tabs a {
		display: inline-block;
		height: 100%;
		padding: 0;
	}
	.tabs-details {
		border: 2px solid #ececec;
		padding: 10px 20px;
		border-top:none;
	}
</style>