

(function( $ ) {

	'use strict';

	var datatableInit = function() {

		$('#datatable-default').dataTable();
		$('#datatable-default-1').dataTable();

	};

	$(function() {
		datatableInit();
	});

}).apply( this, [ jQuery ]);