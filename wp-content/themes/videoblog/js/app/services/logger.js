/**
 * Created by as on 09.10.2014.
 */
(function(){
	"use strict";

	angular
		.module("videoBlog")
		.factory("logger", logger);

	function logger($log, toaster){
		var service = {
			showToasts: true,

			error: error,
			info: info,
			success: success,
			warn: warning,

			// startingh to console; bypass toastr
			log: $log.log
		}

		if(!service.showToasts) return;

		return service;
		//////////////////

		function error(message, title, data){
			toaster.pop("error", title, message);
			$log.error("ERROR: " + message, data)
		}
		function info(message, title, data){
			toaster.pop("info", title, message);
			$log.debug("info: " + message, data)
		}
		function success(message, title, data){
			toaster.pop("success", title, message);
			$log.debug("success: " + message, data)
		}
		function warning(message, title, data){
			toaster.pop("warning", title, message);
			$log.debug("warning: " + message, data)
		}
	}

})(angular);
