var myApp = angular.module('spacApp', [
    'ngRoute',
    'spacControllers'
], function($httpProvider) {
// Use x-www-form-urlencoded Content-Type
  //$httpProvider.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded;charset=utf-8';

  /**
   * The workhorse; converts an object to x-www-form-urlencoded serialization.
   * @param {Object} obj
   * @return {String}
   */ 
  /*var param = function(obj) {
    var query = '', name, value, fullSubName, subName, subValue, innerObj, i;

    for(name in obj) {
      value = obj[name];

      if(value instanceof Array) {
        for(i=0; i<value.length; ++i) {
          subValue = value[i];
          fullSubName = name + '[' + i + ']';
          innerObj = {};
          innerObj[fullSubName] = subValue;
          query += param(innerObj) + '&';
        }
      }
      else if(value instanceof Object) {
        for(subName in value) {
          subValue = value[subName];
          fullSubName = name + '[' + subName + ']';
          innerObj = {};
          innerObj[fullSubName] = subValue;
          query += param(innerObj) + '&';
        }
      }
      else if(value !== undefined && value !== null)
        query += encodeURIComponent(name) + '=' + encodeURIComponent(value) + '&';
    }

    return query.length ? query.substr(0, query.length - 1) : query;
  };

  // Override $http service's default transformRequest
  $httpProvider.defaults.transformRequest = [function(data) {
    return angular.isObject(data) && String(data) !== '[object File]' ? param(data) : data;
  }];*/
});

myApp.config(['$routeProvider', function($routeProvider) {
    $routeProvider.
        when('/', {
            templateUrl : 'views/home.html',
            controller : 'HomeController'
        }).
        when('/group', {
            templateUrl : 'views/group.html',
            controller : 'GroupController'
        }).
        when('/small_group', {
            templateUrl : 'views/small_group.html',
            controller : 'SmallGroupController'
        }).
        when('/pilates', {
            templateUrl : 'views/pilates.html',
            controller : 'PilatesController'
        }).
        when('/events', {
            templateUrl : 'views/events.html',
            controller : 'EventsController'
        }).
        otherwise({
           redirectTo: '/' 
        });
}]);