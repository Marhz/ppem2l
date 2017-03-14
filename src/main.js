import Vue from 'vue';
import select2 from 'select2';
import selectOrDisable from './components/selectOrDisable.vue';
import jQuery from 'jquery';
import bootstrap from 'bootstrap/dist/js/bootstrap';
import datatablesbs from 'datatables.net-bs';
import tabs from './components/tabs.vue';
import tab from './components/tab.vue';
import comments from './components/comments.vue'
import css from './css';
import searchForm from './components/searchForm.vue';
import moment from 'moment'

window.baseUrl = 'http://127.0.0.1/ppem2l/';
moment.locale('fr')
window.moment = moment;

new Vue({
	el:'#app',
	components: {
		selectOrDisable,
		tabs,
		tab,
		comments,
		searchForm
	}
});

$(document).ready(function() {
    $('#datatable').DataTable({
	    "language": {
	        "url": "//cdn.datatables.net/plug-ins/1.10.13/i18n/French.json"
	    }        
    });
	$(".select2").select2();
	$(".users").hide();
	if(document.getElementById('chef').checked) {
		$(".users").hide();
		$(".employes").show()
	}
	else {
		$(".users").show()
		$(".employes").hide()		
	}
	$(".chef").change(() => {
		$(".users").toggle();
		$(".employes").toggle();

	})
});


