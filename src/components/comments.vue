<template>
	<div>
		<transition-group name="slide" tag="div">
			<div v-for="comment in comments" v-bind:key="comment.id" class="col-xs-12 col-md-10 col-md-offset-1 comments">
				<div class="col-xs-2">
					<img src="/ppem2l/image/default-user-avatar.png" class="comment-avatar">
				</div>
				<div class="col-xs-10">
					<span><b class="blue">{{comment.user | fullName}}</b> Le {{comment.created_at}} </span>
					<span v-if="comment.can_delete" class="pull-right fa fa-trash" @click="deleteComment(comment)"></span>
					<span v-if="comment.can_delete" class="pull-right fa fa-edit" @click="editComment(comment)"></span>
					<hr class="no-mt">
					<p>{{comment.content}}</p>
					<transition name="slide">
						<add-comment v-show="editId == comment.id" :editId="editId" :content="comment.content" @commentEdited="postEdit"></add-comment>
					</transition>
				</div>
			</div>
		</transition-group>
		<label for="commentaire" class="col-md-2 form-group">Commentaire</label>
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
			comments: this.data,
			editId: false
		}
	},

	methods: {
		postSubmit(comment) {
			this.comments.push(comment);
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
		},
		editComment(comment) {
			if(comment.id == this.editId)
				this.editId = false;
			else
				this.editId = comment.id;
		},

		postEdit(comment) {
			this.comments.map(c => {
				if (comment.id == c.id){
					c.content = comment.content;
				}
			});
			this.editId = false;
		}
	},
	filters: {
		fullName(user) {
			return `${user.prenom} ${user.nom}`;
		}
	}
}
</script>