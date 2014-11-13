var spacControllers = angular.module('spacControllers', []);

// days of the week to help organize the fitness schedules into a week view
// needed as angular does not arrange monday to sunday.
var week = ['monday', 'tuesday', 'wednesday', 'thursday',
            'friday', 'saturday', 'sunday'];

/*
* Home Controller
* No functionality needed
*/
spacControllers.controller('HomeController', ['$scope', function($scope) {
}]);

/*
* Group Fitness Schedule controller
*/
spacControllers.controller('GroupController', ['$scope', '$http', function($scope, $http) {
    
    $scope.week = week;
    
	// get the group schedule and add it to the views scope
	$http.get('http://andrewzurn.com/spac-demo/data/group_schedule.json', {
		cache: true
	}).success(function(data) {
       $scope.groupSchedule = data;
    });
    
	// remove the given row index from the given day of the week
    $scope.removeRow = function(day, index) {
        $scope.groupSchedule[day].clazz.splice(index, 1);
    };
    
	// insert a row at the given index from a given day of the week
    $scope.insertRow = function(day, index) {
        var newClass = { "name": '', "time": '', "instructor": '', "room": '' };
        $scope.groupSchedule[day].clazz.splice(index + 1, 0, newClass);
    };
    
	// move a row index, either up or down in direction, for a given day
    $scope.moveRow = function(direction, day, index) {
        if (direction == 'up' && index > 0) {
            var temp = $scope.groupSchedule[day].clazz[index - 1]; //the class before the given one
            $scope.groupSchedule[day].clazz[index - 1] = $scope.groupSchedule[day].clazz[index]; //the given class
            $scope.groupSchedule[day].clazz[index] = temp;
        } else if (direction == 'down' && index < $scope.groupSchedule[day].clazz.length - 1) {
            var temp = $scope.groupSchedule[day].clazz[index + 1]; //the class after the given one
            $scope.groupSchedule[day].clazz[index + 1] = $scope.groupSchedule[day].clazz[index]; //the given class
            $scope.groupSchedule[day].clazz[index] = temp;
        }
    };
    
	// save the schedule by pushing it to update.php on this webserver
    $scope.saveSchedule = function() {
		var request = $http({
			method: "post",
			url: "http://andrewzurn.com/spac-demo/update.php",
			data: {
				fileName: 'group_schedule.json',
				jsonData: $scope.groupSchedule
			},
			headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
		});
		
		request.success(function(data) {
			alert('Group Schedule has been saved!');
		});
		
		$http.get('http://andrewzurn.com/spac-demo/data/group_schedule.json', {
			cache: true
		}).success(function(data) {
			$scope.eventsSchedule = data;
		});
    };
	
}]);

/*
* Small Group Fitness Schedule controller
*/
spacControllers.controller('SmallGroupController', ['$scope', '$http', function($scope, $http) {
    $scope.week = week;
    
	// get the small group schedule and add it to the views scope
    $http.get('data/small_group_schedule.json', {
		cache: false
	}).success(function(data) {
       $scope.smallGroupSchedule = data;
    });
    
	// remove the given row index from the given day of the week
    $scope.removeRow = function(day, index) {
        $scope.smallGroupSchedule[day].clazz.splice(index, 1);
    };
    
	// insert a row at the given index from a given day of the week
    $scope.insertRow = function(day, index) {
        var newClass = { "name": '', "time": '', "instructor": '', "room": '' };
        $scope.smallGroupSchedule[day].clazz.splice(index + 1, 0, newClass);
    };
    
	// move a row index, either up or down in direction, for a given day
    $scope.moveRow = function(direction, day, index) {
        if (direction == 'up' && index > 0) {
            var temp = $scope.smallGroupSchedule[day].clazz[index - 1]; //the class that will move down
            $scope.smallGroupSchedule[day].clazz[index - 1] = $scope.smallGroupSchedule[day].clazz[index]; //the class that will move up
            $scope.smallGroupSchedule[day].clazz[index] = temp;
        } else if (direction == 'down' && index < $scope.smallGroupSchedule[day].clazz.length - 1) {
            var temp = $scope.smallGroupSchedule[day].clazz[index + 1]; //the class that will move up
            $scope.smallGroupSchedule[day].clazz[index + 1] = $scope.smallGroupSchedule[day].clazz[index]; //the class that will move down
            $scope.smallGroupSchedule[day].clazz[index] = temp;
        }
    };
    
	// save the schedule by pushing it to update.php on this webserver
    $scope.saveSchedule = function() {
		var request = $http({
			method: "post",
			url: "http://andrewzurn.com/spac-demo/update.php",
			data: {
				fileName: 'small_group_schedule.json',
				jsonData: $scope.smallGroupSchedule
			},
			headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
		});
		
		request.success(function(data) {
			alert('Small Group Schedule has been saved!');
		});
		
		$http.get('data/small_group_schedule.json', {
			cache: false
		}).success(function(data) {
			$scope.eventsSchedule = data;
		});
    };
	
}]);

/*
* Pilates Fitness Schedule controller
*/
spacControllers.controller('PilatesController', ['$scope', '$http', function($scope, $http) {
    $scope.week = week;
    
	// get the small group schedule and add it to the views scope
    $http.get('data/pilates_schedule.json', {
		cache: false
	}).success(function(data) {
       $scope.pilatesSchedule = data; 
    });
    
	// remove the given row index from the given day of the week
    $scope.removeRow = function(day, index) {
        $scope.pilatesSchedule[day].clazz.splice(index, 1);
    };
    
	// insert a row at the given index from a given day of the week
    $scope.insertRow = function(day, index) {
        var newClass = { "name": '', "time": '', "instructor": '', "room": '' };
        $scope.pilatesSchedule[day].clazz.splice(index + 1, 0, newClass);
    };
    
	// move a row index, either up or down in direction, for a given day
    $scope.moveRow = function(direction, day, index) {
        if (direction == 'up' && index > 0) {
            var temp = $scope.pilatesSchedule[day].clazz[index - 1]; //the class that will move down
            $scope.pilatesSchedule[day].clazz[index - 1] = $scope.pilatesSchedule[day].clazz[index]; //the class that will move up
            $scope.pilatesSchedule[day].clazz[index] = temp;
        } else if (direction == 'down' && index < $scope.pilatesSchedule[day].clazz.length - 1) {
            var temp = $scope.pilatesSchedule[day].clazz[index + 1]; //the class that will move up
            $scope.pilatesSchedule[day].clazz[index + 1] = $scope.pilatesSchedule[day].clazz[index]; //the class that will move down
            $scope.pilatesSchedule[day].clazz[index] = temp;
        }
    };
    
	// save the schedule by pushing it to update.php on this webserver
	$scope.saveSchedule = function() {
		var request = $http({
			method: "post",
			url: "http://andrewzurn.com/spac-demo/update.php",
			data: {
				fileName: 'pilates_schedule.json',
				jsonData: $scope.pilatesSchedule
			},
			headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
		});
		
		request.success(function(data) {
			alert('Pilates Schedule has been saved!');
		});
		
		$http.get('data/pilates_schedule.json', {
			cache: false
		}).success(function(data) {
			$scope.eventsSchedule = data;
		});
    };
	
}]);

/*
* Events Schedule controller
*/
spacControllers.controller('EventsController', ['$scope', '$http', function($scope, $http) {
	
	// get the small group schedule and add it to the views scope
    $http.get('data/events.json', {
		cache: false
	}).success(function(data) {
       $scope.eventsSchedule = data;
    });
    
	// remove the given row index from the given day of the week
    $scope.removeRow = function(index) {
        $scope.eventsSchedule.events.splice(index, 1);
    };
    
	// insert a row at the given index from a given day of the week
    $scope.insertRow = function(index) {
        var newEvent = { "name": '', "date": '', "location": '', "description": '' , "contact": ''};
        $scope.eventsSchedule.events.splice(index + 1, 0, newEvent);
    };
    
	// move a row index, either up or down in direction, for a given day
    $scope.moveRow = function(direction, index) {
        if (direction == 'up' && index > 0) {
            var temp = $scope.eventsSchedule.events[index - 1]; //the event that will move down
            $scope.eventsSchedule.events[index - 1] = $scope.eventsSchedule.events[index]; //the event that will move up
            $scope.eventsSchedule.events[index] = temp;
        } else if (direction == 'down' && index < $scope.eventsSchedule.events.length - 1) {
            var temp = $scope.eventsSchedule.events[index + 1]; //the event that will move up
            $scope.eventsSchedule.events[index + 1] = $scope.eventsSchedule.events[index]; //the event that will move down
            $scope.eventsSchedule.events[index] = temp;
        }
    };
    
	// save the schedule by pushing it to update.php on this webserver
    $scope.saveSchedule = function() {
		var request = $http({
			method: "post",
			url: "http://andrewzurn.com/spac-demo/update.php",
			data: {
				fileName: 'events.json',
				jsonData: $scope.eventsSchedule
			},
			headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
		});
		
		request.success(function(data) {
			alert('Events Schedule has been saved!');
		});
		
		$http.get('data/events.json', {
			cache: false
		}).success(function(data) {
			$scope.eventsSchedule = data;
		});
    };
	
}]);