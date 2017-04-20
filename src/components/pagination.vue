<template>
	<div class="center">
		<ul class="pagination main-pagination">
			<li class="previous" :class="{disabled : current <= 1}">
				<a @click.prevent="getPage(current - 1)" :href="link(current - 1)">
					<span class="fa fa-chevron-left"></span>
				</a>
			</li>
			<li 
				v-for="i in pages" 
				:class="{active : current == i}" 
				key="i" 		
			>
				<a @click.prevent="getPage(i)" :href="link(i)" v-if="!isNaN(i)">
					{{ i }}
				</a>
				<span v-else>{{ i }}</span>
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
		data() {
			return {
				beforeDotsOut: false
			}
		},
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
			},
		},
		computed: {
			pages() {
				let res = []
				let beforeDots = false
				let afterDots = false
				for(let i = 1; i <= this.last; i++)
				{
					if((i >= this.current - 1 && i <= this.current + 1) || ((i == 1) || (i == this.last)))
						res.push(i)
					else if (i < this.current) {
						if(!beforeDots) {
							res.push('. . .')
							beforeDots = true
						}
					}
					else {
						if(!afterDots) {
							res.push('. . .')
							afterDots = true
						}
					}
				}
				return res
			}
		}
	}
</script>

<style>
	.pagination > li >span {
		padding: 6px 16px;
		font-size: 22px;
	}
</style>
