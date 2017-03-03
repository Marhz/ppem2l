<template>
	<div class="col-xs-10 col-xs-offset-1">
		<form class="form-vertical" @submit.prevent="onSubmit" @keydown="error = false" role="form" method="POST" action="ajouterCommentaire">
	        <div class="form-group" :class="{'has-error' : error}">
	            <label for="commentaire" class="col-md-2 form-group">Commentaire</label>
	            <div class="col-md-10">
	                <textarea v-model="getContent" name="commentaire" class="form-control"></textarea>
	                <small v-if="error" class="error">{{error}}</small>
	            </div>
	        </div>
	        <input class='formationId' type="hidden" name="id_formation" :value="formationId">
	        <div class="form-group">
	            <div class="col-md-12 margin-top">
	                <button type="submit" class="btn btn-primary pull-right">
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
		props: ['formationId', 'editId', 'content'],
		data() {
			return {
				getContent: (this.content) ? this.content : '',
				error: false,
			}
		},
		methods: {
			onSubmit() {
				$.ajax({
	                type:"POST",
	                url:baseUrl+"/addComment",
	                data:{
	                	formationId: this.formationId,
	                	content: this.getContent,
	                	editId: this.editId
	                },
	                timeout:5000
	            }).done(data => {
	            	this.getContent = '';
	            	if(this.editId)
	            		this.$emit('commentEdited', data);
	            	else
	            		this.$emit('commentAdded', data)
	            }).fail(data => this.error = JSON.parse(data.responseText));
            }
		},
	}
</script>