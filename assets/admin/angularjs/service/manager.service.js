app.factory('managerService' ,function ($http,$q,$timeout){
		var _managerService = {};
		_managerService.getListManager = function(callback){
			return $http.get(pathWebsite + 'admin/manager/getListManager').success(callback);
		};

		_managerService.getToken = function(callback){
			$http.get(pathWebsite + 'admin/jobseeker/getToken').success(callback);
		};
		
		_managerService.createManager = function(manager,csrf,callback){
			var csrf_hash = csrf['hash'];
			console.log(csrf_hash);
			var postData = $.param({'csrf_test_name': csrf_hash,'manager':manager});

			$http.post(pathWebsite + 'admin/manager/createManager', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
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
			            $timeout(function(){
					      defer.resolve(data);
					    }, 750) 

			    });
			    return defer.promise;
		};
		_managerService.checkEmailExits = function(email){
			var temp = {};
			    var defer = $q.defer();
			    $http.get(pathWebsite + 'admin/jobseeker/checkEmailExits/'+email).success(function(data){
			            temp =data;
			             $timeout(function(){
					      defer.resolve(data);
					    }, 750) 

			    });
			    return defer.promise;
		};

		return _managerService;


	});