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
		"getServices"
    ];

    function homeCtrl($log, getServices){
        var vm = this;


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
