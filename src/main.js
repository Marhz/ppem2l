import Vue from 'vue';
import selectOrDisable from './components/selectOrDisable.vue';
import jQuery from 'jquery';
import bootstrap from 'bootstrap/dist/js/bootstrap';
// import datatables from 'datatables.net';
import datatablesbs from 'datatables.net-bs';
import tabs from './components/tabs.vue';
import tab from './components/tab.vue';
import comments from './components/comments.vue'
import css from './css';

window.baseUrl = 'http://127.0.0.1/ppem2l/';

new Vue({
	el:'#app',
	components: {
		selectOrDisable,
		tabs,
		tab,
		comments
	}
});

$(document).ready(function() {
    $('#datatable').DataTable({
	    "language": {
	        "url": "//cdn.datatables.net/plug-ins/1.10.13/i18n/French.json"
	    }        
    });
} );
