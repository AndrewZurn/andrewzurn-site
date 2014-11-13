var spacControllers = angular.module('spacControllers', []);

spacControllers.controller('VoteController', ['$scope', '$http', '$route', '$window', function($scope, $http, $route, $window) {

    /*
    * Get the list of all the videos
    */
    $http.get('http://andrewzurn.com:9080/list').success(function(data) {
        var returnList = [];
        for(var i = 0; i < data.length; i++) {
            var returnObj = new Object();
            returnObj.imageUrl = 'http://img.youtube.com/vi/' + data[i].url + '/0.jpg';
            returnObj.url = data[i].url;
            returnObj.wholeUrl = '//www.youtube.com/embed/' + data[i].url;
            returnObj.vote = data[i].vote;
            returnObj.played = data[i].played;
            returnObj.category = data[i].catName;
            getVideoName(data[i].url, i, function(pos, videoName) {
                returnList[pos].videoName = videoName;
            });
            
            returnList[i] = returnObj;
        }
        $scope.videos = returnList;
    });
    
    $scope.vote = function(url) {
        $http.get('http://andrewzurn.com:9080/vote/' + url).success(function() {
            $route.reload();
        });
    };
    
    /*
    * Change the status of the video to played, and then open the video in a new window
    */ 
    $scope.play = function(url, wholeUrl) {
        $window.open(wholeUrl);
    };
    
    function getVideoName(url, pos, callback) {
        $http.get('http://gdata.youtube.com/feeds/api/videos/' + url + '?v=2&alt=jsonc').success(function(response) {
            callback(pos, response.data.title);
        });
    }
	
	$scope.wasPlayed = function(video) {
 		return video.played;
	};
    
}]);

spacControllers.controller('AddController', ['$scope', '$http', '$window', function($scope, $http, $window) {
    
	$scope.formInfo = {};
    $scope.formInfo.catId = 5;
	
    $scope.addVideo = function() {
		var videoUrl = $scope.formInfo.video;
        var catId = $scope.formInfo.catId;
		var urlToAdd = videoUrl.substring(videoUrl.indexOf('=')+1, videoUrl.length);
		isValidVideo(urlToAdd, catId);
    };
	
	function isValidVideo(url, catId) {
		$http.get('http://gdata.youtube.com/feeds/api/videos/' + url + '?v=2&alt=jsonc').success(function(response) {
			if(response.error === undefined) {
				$http.get('http://andrewzurn.com:9080/add/' + url + '/' + catId).success(function(data) {
                	$window.location.reload();
            	});
			} else {
				alert('Please enter a valid YouTube url! (ex. http://youtube.com...)');
			}
		}).error(function() {
			alert('Please enter a valid YouTube url! (ex. http://youtube.com...)');
		});
	}
    
    
}]);

spacControllers.controller('PlayController', ['$scope', '$http', '$route', '$window', function($scope, $http, $route, $window) {
    
    /*
    * Get the list of all the videos
    */
    $http.get('http://andrewzurn.com:9080/list').success(function(data) {
        var returnList = [];
        for(var i = 0; i < data.length; i++) {
			if (!data[i].played) {
				var returnObj = new Object();
				returnObj.wholeUrl = 'https://www.youtube.com/watch?v=' + data[i].url;
				returnObj.url = data[i].url;
				returnObj.imageUrl = 'http://img.youtube.com/vi/' + data[i].url + '/0.jpg';
				returnObj.vote = data[i].vote;
				returnObj.played = data[i].played;
                returnObj.category = data[i].catName;
				getVideoName(data[i].url, i, function(pos, videoName) {
					returnList[pos].videoName = videoName;
				});

				returnList[i] = returnObj;
			}
        }
        $scope.videos = returnList;
    });
    
    /*
    * Change the status of the video to played, and then open the video in a new window
    */ 
    $scope.play = function(url, wholeUrl, playVid) {
		if (playVid === false) {
			$http.get('http://andrewzurn.com:9080/play/' + url).success(function(data) {
				$window.location.reload();
			});
		} else {
			$http.get('http://andrewzurn.com:9080/play/' + url).success(function(data) {
				 $window.open(wholeUrl);
			});
		}
    };
    
    function getVideoName(url, pos, callback) {
        $http.get('http://gdata.youtube.com/feeds/api/videos/' + url + '?v=2&alt=jsonc').success(function(response) {
            callback(pos, response.data.title);
        });
    }
    
}]);
