Vue.component('select-or-disable', {
	props: {
		elements: Array, 
		name: String, 
		bsclass: {
			default: false
		}
	},
	template: '<div><div :class="!bsclass ? \'form-group col-md-12\' : \'margin-bot\' ">\
					<label :for="name | addId">{{name | capitalize}} :</label>\
						<div class="input-group">\
						<select :name="name | addId" :id="name | addId" class="form-control" :disabled="showSubForm" required>\
							<option value="" disabled selected hidden>Selectionnez ou ajoutez</option>\
							<option v-for="elem in elements" :value="elem.id">{{elem.data}}</option>\
						</select>\
						<span @click="toggleSubForm()" class="plus-icon input-group-addon fa fa-icons" :class="[showSubForm ? \'fa-minus-square red\' : \'fa-plus-square green\']"></span>\
					</div>\
				</div>\
				<slot v-if="showSubForm"></slot>\
				</div>\
				',
	data: function() {
		return {
			showSubForm: false,
		}
	},
	methods: {
		toggleSubForm : function () {
			this.showSubForm = !this.showSubForm;
		}
	},
	filters: {
		capitalize : function (str) {
			return str.charAt(0).toUpperCase() + str.slice(1);
		},
		addId: function(str) {
			return str+"_id";
		}
	}
});


app = new Vue({
	el:'#addrForm'
});