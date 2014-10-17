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
		vm.lastPosts = [];

		init();

		function init(){
			getAPIEndpoint();
			getSliderImages();
			getLastCountPosts();
		}

		function getAPIEndpoint(){
			// Init site title
			getServices.getAPIEndpoint().then(function (response) {
				if (response.statusText === "OK") {
					angular.element("title").text(response.data.name + " | Home");
				} else {
					$log.error(response);
				}
			});
		}

		function getSliderImages(){
			// Init slider
			getServices.getSliderImages().then(function (response) {
				if (response.statusText === "OK") {
					$log.debug("Server send media:", response.data);
					collectImages(response.data);
				} else {
					$log.error(response);
				}
			});
		}

		function getLastCountPosts(){
			getServices.getLastCountPosts(10).then(function (response) {
				if (response.statusText === "OK") {
					$log.debug("Server send last Posts:", response.data);
					collectLastPosts(response.data);
				} else {
					$log.error(response);
				}
			});
		}

		function collectImages(data){
			_.each(data, function(imageData, key){
				this.push({
					src: imageData.source,
					id: imageData.ID,
					odd: (key % 2 === 0)
				});
			}, vm.collectedImages);
		}

		function collectLastPosts(posts){
			_.forEach(posts, function(post){
				this.push({
					thumbnail: post.featured_image.attachment_meta.sizes.thumbnail.url,
					title: post.title,
					id: post.ID,
					description: post.excerpt
				})
			}, vm.lastPosts);
		}


    }

})(angular);
