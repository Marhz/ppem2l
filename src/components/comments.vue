<template>
	<div class="col-xs-12">
		<div class="comments-count col-xs-12">
			<h3>{{commentsCount}} Commentaire{{ (commentsCount > 1) ? 's' : '' }}</h3>
		</div>
		<transition-group name="slide" tag="div">
			<div v-for="comment in comments" v-bind:key="comment.id" class="margin-bot-50 clear">
				<div class="comments">
					<!-- col-xs-12 col-md-10 col-md-offset-1 -->
					<div class="comment-avatar col-md-2 col-sm-3 hidden-xs">
						<img :src="avatarUrl(comment.user)">
					</div>
					<div class="col-xs-12 col-sm-9 col-md-10 ">
						<span>
							<b class="blue">{{comment.user | fullName}}</b>
							<span v-if="comment.can_delete" class="pull-right fa fa-trash" @click="deleteComment(comment)"></span>
							<span v-if="comment.can_delete" class="pull-right fa fa-edit" @click="editComment(comment)"></span>
							<span class="pull-right">{{comment.created_at | ago }}</span>
						</span>
						<hr class="no-mt">
						<p>{{comment.content}}</p>						
						<transition name="slide">
							<add-comment v-show="editId == comment.id" :editId="editId" :content="comment.content" @commentEdited="postEdit"></add-comment>
						</transition>
					</div>
				</div>
			</div>
		</transition-group>
		<!-- <div class="col-md-10 col-md-offset-1 col-md-12"> -->
		<div class="col-xs-12 col-md-10 col-md-offset-2">
			<add-comment :formationId="formationId" @commentAdded="postSubmit"></add-comment>
		</div>
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
                url:baseUrl+"deleteComment",
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
		},
		avatarUrl(user) {
			return baseUrl+user.avatar
		}
	},
	computed: {
		commentsCount() {
			return this.comments.length
		}
	},
	filters: {
		fullName(user) {
			return `${user.nom} ${user.prenom}`;
		},
		ago(date) {
			return moment(date).fromNow();
		}
	}
}
</script>