<template>
	<div class="col-xs-8 col-xs-offset-2">
		<form class="form-vertical" @submit.prevent="onSubmit" role="form" method="POST" action="ajouterCommentaire">
	        <div class="form-group">
	            <label for="commentaire" class="col-md-2 form-group">Commentaire</label>
	            <div class="col-md-4">
	                <textarea v-model="content" name="commentaire" class="form-control"></textarea>
	            </div>
	        </div>
	        <input class='formationId' type="hidden" name="id_formation" :value="formationId">
	        <div class="form-group">
	            <div class="col-md-4 col">
	                <button type="submit" class="btn btn-primary">
	                    Envoyer
	                </button>
	            </div>
	        </div>
	    </form>
	</div>
</template>

<script>
	export default {
		name: 'add-comment',
		props: ['formationId'],

		data() {
			return {
				content: ''
			}
		},
		methods: {
			onSubmit() {
				$.ajax({
	                type:"POST",
	                url:"/ppem2l/addComment",
	                data:{
	                	formationId: this.formationId,
	                	content: this.content
	                },
	                timeout:5000
	            }).done(comment => {
	            	this.content = '';
	            	this.$emit('commentAdded', comment)
	            });
            }
		}
	}
</script>