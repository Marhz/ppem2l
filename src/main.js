import Vue from 'vue';
import selectOrDisable from './components/selectOrDisable.vue';
import jQuery from 'jquery';
// import bootstrap from 'bootstrap';
import datatables from 'datatables.net';
import datatablesbs from 'datatables.net-bs';
import tabs from './components/tabs.vue';
import tab from './components/tab.vue';

var $ = jQuery;
window.jQuery = jQuery;
window.$ = jQuery;

new Vue({
	el:'#app',
	components: {
		selectOrDisable,
		tab,
		tabs,
	}
});

$(document).ready(function() {
    $('#datatable').DataTable({
	    "language": {
	        "url": "//cdn.datatables.net/plug-ins/1.10.13/i18n/French.json"
	    }        
    });
} );