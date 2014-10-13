/**
 * Created by as on 09.10.2014.
 */
/**
 * Created by as on 09.10.2014.
 */
(function () {
	"use strict";

	angular
		.module("videoBlog")
		.factory("$bgShadow", bgShadow);

	function bgShadow() {
		var body = angular.element('body'),
			shadowClass = "shadow-container",
			shadowContainer = angular.element("<div class='" + shadowClass + "'><div class='loader-spinner'></div></div>"),
			service = {
				start: start,
				cansel: cancel,
				isStarted: isStarted
			};

		return service;
		//////////////////

		function start() {
			if(isStarted()) return;
			body.append(shadowContainer);
		}

		function cancel() {
			angular.element("." + shadowClass).remove();
		}

		function isStarted() {
			return (angular.element("." + shadowClass).length) > 0 ? true : false;
		}
	}
})(angular);
