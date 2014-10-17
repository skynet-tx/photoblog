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
        .directive("topMenu", topMenu);

    topMenu.$inject = [
        "$log",
        "getServices",
		"$templateCache"
    ];

    function topMenu($log, getServices, $templateCache) {
        var directive = {
            link: link,
            replace: true,
            templateUrl: BlogInfo.url + 'partials/topmenu/topmenu.html',
            restrict: 'EA'
        };
        return directive;

        function link(scope, $el, attrs) {
            scope.siteName = "";
            scope.description = "";
            scope.preName = "";
            scope.menuList = [
                {
                    title: "Блог",
                    url: "/blog"
                }
            ];

            getServices.getPages().then(function (response) {
                if (response.statusText === "OK") {
                    createMenuLink(response.data);
                } else {
                    console.log(response);
                }
            });

            getServices.getAPIEndpoint().then(function (response) {
                if (response.statusText === "OK") {
                    getSiteName(response.data.name);
                    scope.description = response.data.description;
                } else {
                    console.log(response);
                }
            });

            function createMenuLink(data) {
                _.each(data, function (item, key) {
                    this.push({
                        title: item.title,
                        url: "pages/" + item.ID
                    })
                }, scope.menuList);

                scope.menuList = _.sortBy(scope.menuList, "title")
            }

            function getSiteName(fullName){
                var siteName = fullName.split(" ");

                if(_.contains(siteName, "фотограф")){
                    scope.preName = "фотограф";
                    scope.siteName = fullName.replace("фотограф", "");
                } else {
                    scope.siteName = fullName;
                }
            }
        }
    }

})(angular);
