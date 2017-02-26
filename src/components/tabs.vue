<template>
	<div>
		<div class="tabs">
			<ul class="nav nav-tabs">
				<li v-for="tab in tabs" :class="{ 'active' : tab.isActive }">
					<a :href="tab.href" @click="selectTab(tab.href)">{{tab.name}}</a>
				</li>
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
			return { tabs: [] }
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
		}
	}
</script>