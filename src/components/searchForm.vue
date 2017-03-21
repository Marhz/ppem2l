<template>
    <form :action="baseUrl+'search'" id="search-form" method="Post" class="form-inline searchbar" @submit.prevent="goToFormation">
        <div class="form-group">
        	<div class="input-group">
	            <input 
	            	v-model="search" 
	            	@keyup="getResult"
	            	@focus="displayResult = true"
	            	@blur="loseFocus"
	            	@keyup.up.prevent="getPrevious"
	            	@keyup.down.prevent="getNext"
	            	@keyup.esc.prevent="displayResult = false"
	            	type="text" 
	            	name="search" 
	            	size="25"
	            	class="form-control" 
	            	placeholder="Rechercher..." 
	            	autocomplete="off" 
	            	required
	            >
	            <span class="input-group-addon search-addon fa fa-search" @click="submit"></span>
        	</div>
        </div>
        <div class="results" v-if="displayResult && results.length > 0">
        	<ul>
        		<li v-for="formation in results" @mouseover="selected = results.indexOf(formation)">
        			<a :href="baseUrl+'/formations/'+formation.id" class="result" :class="{ 'search-active' : selected === results.indexOf(formation) }"@click.prevent="goToFormation">
        				<div>
		        			<span v-html="formation.titre" class="titre"></span>
		        			<span v-html="formation.type.titre" class="pull-right"></span><br/>
		        			<span>Débute le {{formation.debut | formatDate}}</span><br/>
		        			<span>Coût: {{formation.cout}} crédits</span><br/>
		        			<span>Durée: {{formation.duree}} jours</span>
		        		</div>
					</a>
					<hr class="search-separator"/>
        		</li>
        	</ul>
        </div>
    </form>
</template>

<script>
	export default {

		data: function()  {
			return {
				search: '',
				oldSearch: '',
				results: false,
				baseUrl: baseUrl,
				displayResult: false,
				selected: 0
			}
		},
		methods: {
			getResult: function () {
				if(this.search == ''){
					this.results = false
					this.oldSearch = ''
					this.displayResult = false
					return
				}
				if(this.search === this.oldSearch)
					return
	            this.oldSearch = this.search
				$.ajax({
	                type:"POST",
	                url:baseUrl+"search",
	                data:{
	                	search: this.search,
	                	ajax: true
	                },
	                timeout:5000
	            }).done(data => {
	            	this.selected = 0;
	            	this.results = JSON.parse(data)
	            	this.displayResult = true
	            }).fail();
			},
			getNext: function () {
				if(this.selected === this.results.length-1)
					this.selected = 0
				else
					this.selected++
			},
			getPrevious: function() {
				if(this.selected == 0)
					this.selected = this.results.length-1
				else
					this.selected--;
			},
			goToFormation: function() {
				window.location = baseUrl+'formations/'+this.results[this.selected].id
			},
			submit: function() {
				$("#search-form").submit()
			},
			loseFocus: function() {
				setTimeout(() => this.displayResult = false, 100)
			}
		},
		filters: {
			formatDate: function(date) {
				return moment(date).format('LL')
			}
		}
	}
</script>

<style>
	a:hover {
		text-decoration: none;
	}
	.results {
		position: absolute;
		background: rgba(0,0,0,0.9);
		box-shadow: 2px 2px 8px rgba(156, 156, 156, 1),-2px 2px 8px rgba(156, 156, 156, 1);
		border: 1px solid white;
	}
	.results a {
		color:white;
	}
	@media (max-width: 768px)
	{
		.results {
			position: relative;
		}
	}
	.results ul {
		padding: 0;
	}
	.result {
		display:block;
		min-width: 300px;
		padding: 0 15px;
	}
	.result span {
		line-height: 30px
	}
	.titre {
		font-size: 20px
	}
	.search-separator {
		margin: 5px 0;
	}
	.results li:last-child .search-separator {
		display: none;
	}
	.search-addon {
		color: white;
		background: #337AB7;
		font-size: 15px;
		cursor:pointer;
	}
	.search-active {
		background: #1048ff;
		color:white;
	}
	.search-active:hover {
		color:white;
	}
</style>