<template>
	<div>
		<div class="">
			<ul class="myTabs">
				<a v-for="tab in tabs" 
					:href="tab.href" 
					@click="selectTab(tab.href)"
					class="myTab"
					:class="{'tabActive' : tab.isActive }"
 				>
					<li>{{tab.name}}</li> 
				</a>
			</ul>
		</div>

		<div class="tabs-details">
			<slot></slot>
		</div>
	</div>
</template>

<script>
	export default {
		data() {
			return { 
				tabs: [],
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
		},
		methods: {
			selectTab(href) {
				this.tabs.forEach(tab => {
					tab.isActive = (tab.href == href);
				});
			}
		},
	}
</script>

<style>
	.myTabs {
		margin: 0;
		padding: 0;
		display: flex;
		justify-content: center;
		align-items: stretch;
		min-height: 50px;
		position: relative;
	}
	.myTab {
		flex: 1;
		display: flex;
		justify-content: center;
		align-items: center;
		border-bottom: 2px solid #ececec;
		font-size: 16px;
		font-weight: 500;
		color: inherit;
		text-decoration: none;
	}
	.myTab:focus {
		text-decoration: none;
	}
	.myTab:not(:last-child) {
		/*border-right: 1px solid #ececec;*/
	}
	.tabActive {
		color: rgb(45, 80, 255);
		text-decoration: none;
		border-bottom: 2px solid rgb(120, 143, 255);		
	}
</style>