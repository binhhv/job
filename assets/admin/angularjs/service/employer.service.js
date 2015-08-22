app.factory('employerService' ,function ($http,$q){
		var _employerService = {};
		var _employer;

		_employerService.getListEmployer = function(callback){
			return $http.get(pathWebsite + 'admin/employer/getListEmployer').success(callback);
		};
		_employerService.getToken = function(callback){
			$http.get(pathWebsite + 'admin/employer/getToken').success(callback);
		};
		_employerService.createEmployer = function(employer,csrf,callback){
			var csrf_hash = csrf['hash'];
			console.log(csrf_hash);
			var postData = $.param({'csrf_test_name': csrf_hash,'employer':employer});

			$http.post(pathWebsite + 'admin/employer/createemployer', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
		};

		_employerService.updateEmployer = function(employer,callback){
			var objectemployer = JSON.parse(employer);
			var csrf_name = objectemployer['csrf_name'];
			var csrf_hash = objectemployer['csrf_hash'];
			var postData = $.param({'csrf_test_name': csrf_hash,'employer':employer});

			$http.post(pathWebsite + 'admin/employer/updateemployer', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
		};
		_employerService.deleteEmployer = function(employer,callback){
			var objectemployer = JSON.parse(employer);
			var csrf_name = objectemployer['csrf_name'];
			var csrf_hash = objectemployer['csrf_hash'];
			var postData = $.param({'csrf_test_name': csrf_hash,'employer':employer});
			$http.post(pathWebsite + 'admin/employer/deleteemployer', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
		};
		_employerService.getDetailDocument = function(id){
			var temp = {};
			    var defer = $q.defer();
			    $http.get(pathWebsite + 'admin/employer/detail/document/'+id).success(function(data){
			           // alert(data);
			           console.log(data);
			            temp =data;
			            defer.resolve(data);

			    });
			    return defer.promise;
		};
		_employerService.getTokenReturn = function(){
			var temp = {};
			    var defer = $q.defer();
			    $http.get(pathWebsite + 'admin/employer/getToken').success(function(data){
			            temp =data;
			            defer.resolve(data);

			    });
			    return defer.promise;
		};
		_employerService.checkEmailExits = function(email){
			var temp = {};
			    var defer = $q.defer();
			    $http.get(pathWebsite + 'admin/employer/checkEmailExits/'+email).success(function(data){
			            temp =data;
			            defer.resolve(data);

			    });
			    return defer.promise;
		};
		return _employerService;
});