var myApp = angular.module('spacApp', [
    'ngRoute',
    'spacControllers'
])
.filter('trustUrl', function ($sce) {
    return function(url) {
      return $sce.trustAsResourceUrl(url);
    }
});

myApp.config(['$routeProvider', function($routeProvider) {
    $routeProvider.
        when('/', {
            templateUrl : 'views/vote.html',
            controller : 'VoteController'
        }).
        when('/add', {
            templateUrl : 'views/add.html',
            controller : 'AddController'
        }).
        when('/play', {
            templateUrl : 'views/play.html',
            controller : 'PlayController'
        }).
        otherwise({
           redirectTo: '/' 
        });
}]);