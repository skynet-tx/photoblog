/**
 * Created by as on 07.10.2014.
 */
(function () {
	"use strict";

	angular
		.module("videoBlog")
		.factory("getServices", getServices);

	getServices.$inject = [
		"$log",
		"$http",
		"$location",
		"$q",
		"$bgShadow"
	];

	function getServices($log, $http, $location, $q, $bgShadow) {
		var deferred = $q.defer(),
			urls = {
				getPages: "wp-json/pages",
				APIEndpoint: "wp-json",
				getSliderImages: "wp-json/media"
			};

		$bgShadow.start();

		return {
			getPages: getPages,
			getAPIEndpoint: getAPIEndpoint,
			getSliderImages: getSliderImages
		};

		function getPages() {
			return _get(urls.getPages, {});
		}

		function getAPIEndpoint() {
			return _get(urls.APIEndpoint, {});
		}

		function getSliderImages() {
			var params = {
				"filter[posts_per_page]": 5,
				"filter[order]": "DESC"
			};
			return _get(urls.getSliderImages, params);
		}

		function _get(url, params) {
			return $http({method: 'GET', params: params, url: url})
				.success(function () {
					$bgShadow.cansel();
				})
				.error(function (data) {
					deferred.reject(data.messages);
					$bgShadow.cansel();
					$log.error("GET ERROR: ", data[0]['message']);
				});
		}
	}

})(angular);
