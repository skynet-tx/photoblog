/**
 * Created by as on 10/5/2014.
 */
/**
 * Created by as on 10/4/2014.
 */
(function(){
    "use strict";

    angular
        .module("videoBlog")
        .directive("topMenu", topMenu);

    topMenu.$inject = [
        "$log"
    ];

    function topMenu($log){
        var directive = {
            link: link,
            replace: true,
            templateUrl: BlogInfo.url + 'partials/topmenu/topmenu.html',
            restrict: 'EA'
        };
        return directive;

        function link(scope, element, attrs) {
            scope.temp = "some property 123"
        }
    }

})(angular);