/**
 * Created by as on 10/4/2014.
 */
(function(angular){
    "use strict";

    angular
        .module("videoBlog")
        .controller("HomeCtrl", homeCtrl);

    homeCtrl.$inject = [
        "$log",
		"getServices",
		"$interval"
    ];

    function homeCtrl($log, getServices, $interval){
        var vm = this;

		// Scope variables
		vm.picture = [];
		vm.isPicturesLoaded = false;
		vm.collectedImages = [];
		vm.carouselIndex2 = 2;


		// Init site title
		getServices.getAPIEndpoint().then(function (response) {
			if (response.statusText === "OK") {
				angular.element("title").text(response.data.name + " | Home");
			} else {
				console.log(response);
			}
		});

		// Init slider
		getServices.getSliderImages().then(function (response) {
			if (response.statusText === "OK") {
				$log.debug("Server send media:", response.data);
				collectImages(response.data);
			} else {
				console.log(response);
			}
		});

		function collectImages(data){
			_.each(data, function(imageData, key){
				this.push({
					src: imageData.source,
					id: imageData.ID,
					odd: (key % 2 === 0)
				});
			}, vm.collectedImages);
			console.log(vm.collectedImages);
		}


    }

})(angular);
