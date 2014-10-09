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
				cansel: cansel,
				isStarted: isStarted
			};

		return service;
		//////////////////

		function start() {
			body.append(shadowContainer);
		}

		function cansel() {
			angular.element("." + shadowClass).remove();
		}

		function isStarted() {

		}
	}
})(angular);
