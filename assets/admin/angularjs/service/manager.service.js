app.factory('managerService' ,function ($http,$q){
		var _managerService = {};
		_managerService.getListManager = function(callback){
			return $http.get(pathWebsite + 'admin/manager/getListManager').success(callback);
		};

		_managerService.getToken = function(callback){
			$http.get(pathWebsite + 'admin/jobseeker/getToken').success(callback);
		};
		

		_managerService.updateManager = function(manager,callback){
			var objectmanager = JSON.parse(manager);
			var csrf_name = objectmanager['csrf_name'];
			var csrf_hash = objectmanager['csrf_hash'];
			var postData = $.param({'csrf_test_name': csrf_hash,'manager':manager});

			$http.post(pathWebsite + 'admin/manager/updateManager', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
		};
		_managerService.deleteManager = function(manager,callback){
			var objectmanager = JSON.parse(manager);
			var csrf_name = objectmanager['csrf_name'];
			var csrf_hash = objectmanager['csrf_hash'];
			var postData = $.param({'csrf_test_name': csrf_hash,'manager':objectmanager['account_id']});
			$http.post(pathWebsite + 'admin/manager/deleteManager', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
		};
		_managerService.getTokenReturn = function(){
			var temp = {};
			    var defer = $q.defer();
			    $http.get(pathWebsite + 'admin/jobseeker/getToken').success(function(data){
			            temp =data;
			            defer.resolve(data);

			    });
			    return defer.promise;
		};
		return _managerService;


	});