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
		"logger"
    ];

    function homeCtrl($log, getServices, logger){
        var vm = this;

		getServices.getAPIEndpoint().then(function (response) {
			if (response.statusText === "OK") {
				angular.element("title").text(response.data.name + " | Home");
				logger.info("test", "test msg", 'ttt');
			} else {
				console.log(response);
			}
		});




    }

})(angular);
