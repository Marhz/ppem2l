<template>
	<div class="">
		<form 
			@submit.prevent="onSubmit" 
			@keydown="error = false" 
			role="form" 
			method="POST" 
			action="ajouterCommentaire"
		>
        <div class="form-group" :class="{'has-error' : error}">
            <textarea 
            	v-model="getContent" 
            	name="commentaire" 
            	class="form-control comment-input"
            	rows="6"
            	placeholder="Votre commentaire..."
            >
            </textarea>
            <small v-if="error" class="error">{{error}}</small>
        </div>
	        <input class='formationId' type="hidden" name="id_formation" :value="formationId">
            <div class="margin-top">
                <button type="submit" class="btn btn-primary pull-right no-pr">
                    Envoyer
                </button>
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
				$.post({
	                type:"POST",
	                url:baseUrl+"addComment",
	                data:{
	                	formationId: this.formationId,
	                	content: this.getContent,
	                	editId: this.editId
	                },
	                timeout:5000
	            }).done(data => {
	            	if(this.editId)
	            		this.$emit('commentEdited', data);
	            	else{
	            		this.getContent = '';
	            		this.$emit('commentAdded', data)
	            	}
	            }).fail(data => this.error = JSON.parse(data.responseText));
            }
		},
	}
</script>