<template>
	<div class="center">
		<ul class="pagination main-pagination">
			<li class="previous" :class="{disabled : current <= 1}">
				<a @click.prevent="getPage(current - 1)" :href="link(current - 1)">
					<span class="fa fa-chevron-left"></span>
				</a>
			</li>
			<li v-for="i in last" :class="{active : current == i}">
				<a @click.prevent="getPage(i)" :href="link(i)">{{ i }}</a>
			</li>
			<li class="next" :class="{disabled : current >= last}">
				<a @click.prevent="getPage(current + 1)" :href="link(current+1)">
					<span class="fa fa-chevron-right"></span>
				</a>
			</li>
		</ul>
	</div>
</template>

<script>
	export default {
		props: ['current', 'last', 'url'],
		methods: {
			link(page) {
				return baseUrl+this.url+page
			},
			getPage(page) {
				if(page < 1 || page > this.last || page == this.current)
					return
				this.$emit('loading')
				$.get(this.link(page)).done(data => {
					data = JSON.parse(data)
					this.$emit(this.url.replace(/\//, ''), data)
					window.history.pushState('page2', 'M2L - Formations', baseUrl+this.url+data[data.length-1].current)
				})
			}
		}
	}
</script>