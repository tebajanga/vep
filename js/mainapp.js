var mainApp = angular.module("mainApp",['ui.bootstrap','ngDialog']);

mainApp.directive('hideEvent', function($document){
  		return {
    		restrict: 'A',
    		link: function(scope, elem, attr, ctrl) {
      			elem.bind('click', function(e) {
        			e.stopPropagation();
      			});
      			$document.bind('click', function() {
        			scope.$apply(attr.hideEvent);
      			})
    		}
  		}
	});

mainApp.controller("eventController",function($scope,$http){
  $scope.events = [];
  $scope.event_id = "";
  $scope.event_name = "";
  $scope.event_location = "";
  $scope.event_start_date = "";
  $scope.event_end_date = "";

  $scope.bookYourPlaceButton = true;

  var url = server_url + 'home/json_get_events';
  var event_id = "";

  $http.get(url).then(function(response,status,xhr){
    $scope.events = response.data;

  });

  $scope.showEvent = function($event){
    $scope.event_name = $event.name;
    $scope.event_location = $event.location;
    $scope.event_start_date = $event.start_date;
    $scope.event_end_date = $event.end_date;

    event_id = $event.event_id;

    $scope.eventDetails = true;
    $scope.bookYourPlaceButton = false;
  }

  $scope.hideEvent = function(){
    $scope.eventDetails = false;
    $scope.bookYourPlaceButton = true;

    $scope.event_name = "";
    $scope.event_location = "";
    $scope.event_start_date = "";
    $scope.event_end_date = "";

    event_id = "";
  }

  $scope.bookYourPlace = function(){
    var url = server_url + 'hall' + '/' + event_id;
    window.location = url;
  }
});

mainApp.controller('hallController',function($scope,$http,ngDialog){
  $scope.event_id = document.getElementById('event_id').value;
  $scope.stands = [];

  var url = server_url + 'hall/json_get_stands/' + $scope.event_id;

  $http.get(url).then(function(response,status,xhr){
    $scope.stands = response.data;
  });

  $scope.reserveStand = function($stand){
    if($stand.status == "Free"){
      $scope.stand = $stand;

      ngDialog.open({
        template: 'standDetails',
        className: 'ngdialog-theme-default',
        scope: $scope
      });
    }
  }

  $scope.reserve = function($stand){
    var url = server_url + 'registration/stand/' + $stand.stand_id;
    window.location = url;
  }
});

mainApp.directive("fileInput",function($parse){
  return{
    restrict : 'A',
    link : function(scope,elem,attrs){
      elem.bind('change',function(){
        $parse(attrs.fileInput).assign(scope,elem[0].files);
      });
    }
  }
});

mainApp.controller('registrationController',function($scope,$http,$templateCache){
  var url = server_url + 'registration/add_reservation';
  $scope.stand_id = document.getElementById('stand_id').value;
  $scope.event_id = document.getElementById('event_id').value;

  $scope.confirmReservation = function(){
    var formData = new FormData();

    formData.append("name",$scope.company.name);
    formData.append("owner",$scope.company.owner);
    formData.append("location",$scope.company.location);
    formData.append("phonenumber",$scope.company.phonenumber);
    formData.append("website",$scope.company.website);
    formData.append("admin_email",$scope.company.admin_email);
    formData.append("stand_id",$scope.stand_id);

    angular.forEach($scope.logo,function(file){
      formData.append('logo',file);
    });

    angular.forEach($scope.document,function(file){
      formData.append('document',file);
    });

    var config = {
      method : 'POST',
      url : url,
      data : formData,
      transformRequest: angular.identity,
      headers: { 'Content-Type': undefined}
    };

    var request = $http(config);
    request.then(function(response){
      var url = server_url + 'hall' + '/' + $scope.event_id;
      window.location = url;
    },function(error){
      alert(error.data);
    });
  }
});
