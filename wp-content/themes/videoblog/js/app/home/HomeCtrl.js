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
		"getServices",
		"$bgShadow"
    ];

    function homeCtrl($log, getServices, $bgShadow){
        var vm = this;

		$bgShadow.start();

		// Init site title
		getServices.getAPIEndpoint().then(function (response) {
			if (response.statusText === "OK") {
				angular.element("title").text(response.data.name + " | Home");
			} else {
				console.log(response);
			}
		});




    }

})(angular);
