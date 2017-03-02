<template>
	<div class="col-xs-12">
		<div v-for="comment in comments" class="col-xs-8 col-xs-offset-2 commentaires">
			<div class="col-xs-2">
				<img src="">
			</div>
			<div class="col-xs-10">
				<span>{{comment.user | fullName}} Le {{comment.created_at}} </span>
				<span v-if="comment.can_delete" class="pull-right" @click="deleteComment(comment)">X</span>
				<p>{{comment.content}}</p>
			</div>
		</div>
		<add-comment :formationId="formationId" @commentAdded="postSubmit"></add-comment>
	</div>
</template>

<script>
import addComment from './addComment.vue';

export default {
	components: {addComment},
	props: ['data', 'formation-id'],
	data() {
		return {
			comments: this.data
		}
	},

	methods: {
		postSubmit(comment) {
			this.comments.push(JSON.parse(comment));
		},
		deleteComment(comment) {
			$.ajax({
                type:"POST",
                url:"/ppem2l/deleteComment",
                data:{
                	commentId: comment.id
                },
                timeout:5000
            }).done(id => {
            	this.comments = this.comments.filter(comment => comment.id !== parseInt(id));
            });
		}
	},
	filters: {
		fullName(user) {
			return `${user.prenom} ${user.nom}`;
		}
	}
}
</script>