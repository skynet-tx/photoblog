/**
 * Created by as on 10/4/2014.
 */
(function(){
    "use strict";

    angular
        .module("videoBlog")
        .controller("HomeCtrl", homeCtrl);

    homeCtrl.$inject = [
        "$log",
        "$http"
    ];

    function homeCtrl($log, $http){
        var vm = this;

        $http({
            method: 'GET',
//            url: "/wp-json/posts", // derived from the rootScope
//            params: {
//                "filter[posts_per_page]": 10,
//                "filter[order]": "desc"
//            }
            url: "/wp-json/pages"
        }).
            success(function(data, status, headers, config) {
                vm.postdata = data;
            }).
            error(function(data, status, headers, config) {
            });


    }

})(angular);