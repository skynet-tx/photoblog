/**
 * Created by as on 10/4/2014.
 */
(function () {
    "use strict";

    angular
        .module("videoBlog")
        .config(config);

    function config($routeProvider, $logProvider, $locationProvider) {
        $logProvider.debugEnabled(true);

        $routeProvider.
            when('/', {
                redirectTo: function () {
                    return "/home";
                }
            })
            .when('/home', {
                templateUrl: BlogInfo.url +  'partials/home/home_view.html',
                controller: 'HomeCtrl',
                controllerAs: "vm"
            })
            .otherwise({
                redirectTo: '/error'
            });

//        enable html5Mode for pushstate ('#'-less URLs)
        $locationProvider.html5Mode(true);
        $locationProvider.hashPrefix('!');
    }
})(angular);