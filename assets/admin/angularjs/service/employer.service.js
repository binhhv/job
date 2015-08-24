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

app.factory('employerUserService' ,function ($http,$q){
		var _employerUserService = {};
		var _employer;

		_employerUserService.getListEmployerUser = function(id,callback){
			return $http.get(pathWebsite + 'admin/employer/getListEmployerUser/'+id).success(callback);
		};
		_employerUserService.checkAdminEmployerExits = function(id,callback){
			return $http.get(pathWebsite + 'admin/employer/checkAdminEmployerExits/'+id).success(callback);
		}
		_employerUserService.setRoleAdminEmployer = function(id,employeruser,crfs,callback){
			var postData = $.param({'csrf_test_name': crfs,'employeruser':employeruser,'employerid':id});

			$http.post(pathWebsite + 'admin/employer/setRoleAdminEmployer', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
		}
		_employerUserService.createEmployerUser = function(employeruser,csrf,employerid,employerUserRole,callback){
			var csrf_hash = csrf['hash'];
			//console.log(csrf_hash);
			var postData = $.param({'csrf_test_name': csrf_hash,'employeruser':employeruser,'employerid':employerid,'role':employerUserRole});

			$http.post(pathWebsite + 'admin/employer/createEmployerUser', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
		};
		_employerUserService.deleteEmployerUser = function(employeruser,callback){
			var objectEmployer = JSON.parse(employeruser);
			var csrf_name = objectEmployer['csrf_name'];
			var csrf_hash = objectEmployer['csrf_hash'];
			var postData = $.param({'csrf_test_name': csrf_hash,'employeruser':employeruser});
			$http.post(pathWebsite + 'admin/employer/deleteEmployerUser', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
		};
		_employerUserService.getToken = function(callback){
			$http.get(pathWebsite + 'admin/jobseeker/getToken').success(callback);
		};
		
		_employerUserService.getTokenReturn = function(){
			var temp = {};
			    var defer = $q.defer();
			    $http.get(pathWebsite + 'admin/jobseeker/getToken').success(function(data){
			            temp =data;
			            defer.resolve(data);

			    });
			    return defer.promise;
		};
		_employerUserService.checkEmailExits = function(email){
			var temp = {};
			    var defer = $q.defer();
			    $http.get(pathWebsite + 'admin/employer/checkEmailExits/'+email).success(function(data){
			            temp =data;
			            defer.resolve(data);

			    });
			    return defer.promise;
		};
		return _employerUserService;
});


app.factory('employerRecruitmentService' ,function ($http,$q){
		var _employerRecruitmentService = {};
		var _employer;

		_employerRecruitmentService.getListEmployerRecruitment = function(id,callback){
			return $http.get(pathWebsite + 'admin/employer/getListEmployerRecruitment/'+id).success(callback);
		};
		_employerRecruitmentService.getToken = function(callback){
			$http.get(pathWebsite + 'admin/employer/getToken').success(callback);
		};
		_employerRecruitmentService.deleteEmployerRecruitment = function(recruitment,callback){
			var objectRecruitment = JSON.parse(recruitment);
			var csrf_name = objectRecruitment['csrf_name'];
			var csrf_hash = objectRecruitment['csrf_hash'];
			var postData = $.param({'csrf_test_name': csrf_hash,'recruitment':recruitment});
			$http.post(pathWebsite + 'admin/employer/deleteEmployerRecruitment', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
		};
		_employerRecruitmentService.createEmployer = function(employer,csrf,callback){
			var csrf_hash = csrf['hash'];
			console.log(csrf_hash);
			var postData = $.param({'csrf_test_name': csrf_hash,'employer':employer});

			$http.post(pathWebsite + 'admin/employer/createemployer', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
		};

		_employerRecruitmentService.updateEmployer = function(employer,callback){
			var objectemployer = JSON.parse(employer);
			var csrf_name = objectemployer['csrf_name'];
			var csrf_hash = objectemployer['csrf_hash'];
			var postData = $.param({'csrf_test_name': csrf_hash,'employer':employer});

			$http.post(pathWebsite + 'admin/employer/updateemployer', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
		};
		_employerRecruitmentService.deleteEmployer = function(employer,callback){
			var objectemployer = JSON.parse(employer);
			var csrf_name = objectemployer['csrf_name'];
			var csrf_hash = objectemployer['csrf_hash'];
			var postData = $.param({'csrf_test_name': csrf_hash,'employer':employer});
			$http.post(pathWebsite + 'admin/employer/deleteemployer', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
		};
		_employerRecruitmentService.getDetailDocument = function(id){
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
		_employerRecruitmentService.getTokenReturn = function(){
			var temp = {};
			    var defer = $q.defer();
			    $http.get(pathWebsite + 'admin/employer/getToken').success(function(data){
			            temp =data;
			            defer.resolve(data);

			    });
			    return defer.promise;
		};
		_employerRecruitmentService.checkEmailExits = function(email){
			var temp = {};
			    var defer = $q.defer();
			    $http.get(pathWebsite + 'admin/employer/checkEmailExits/'+email).success(function(data){
			            temp =data;
			            defer.resolve(data);

			    });
			    return defer.promise;
		};
		return _employerRecruitmentService;
});