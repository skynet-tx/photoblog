/**
 * Created by as on 17.10.2014.
 */
/**
 * Created by as on 10/5/2014.
 */
/**
 * Created by as on 10/4/2014.
 */
(function () {
	"use strict";

	angular
		.module("videoBlog")
		.directive("siteFooter", siteFooter);

	siteFooter.$inject = [
		"$log",
		"getServices",
		"$templateCache"
	];

	function siteFooter($log, getServices, $templateCache) {
		var directive = {
			link: link,
			replace: true,
			templateUrl: BlogInfo.url + 'partials/siteFooter/siteFooter.html',
			restrict: 'EA'
		};
		return directive;

		function link(scope, $el, attrs) {

		}
	}

})(angular);
