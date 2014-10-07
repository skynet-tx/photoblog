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
        "$q"
    ];

    function getServices($log, $http, $location, $q) {
        var deferred = $q.defer(),
            urls = {
                getPages: "wp-json/pages",
                APIEndpoint: "wp-json"
            };

        return {
            getPages: getPages,
            getAPIEndpoint: getAPIEndpoint
        };

        function getPages(){
            return _get(urls.getPages, [])
        }

        function getAPIEndpoint(){
            return _get(urls.APIEndpoint, [])
        }

        function _get(url, params) {
            return $http({method: 'GET', params: params, url: url})
                .error(function (data) {
                    deferred.reject(data.messages);
                    $log.error("GET ERROR: ", data[0]['message']);
                });
        }

    }

})(angular);