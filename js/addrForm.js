new Vue({
	el:'#addrForm',
	data: {
		showAddrForm: false,
		showPrestaForm: 0
	},
	methods: {
		switchAddrForm : function () {
			this.showAddrForm = !this.showAddrForm;
		}
	}
});