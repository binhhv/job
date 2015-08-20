app.factory('jobseekerService' ,function ($http,$q){
		var _jobseekerService = {};
		var _jobseeker;

		_jobseekerService.getListJobseeker = function(){
			if(!_jobseeker){
				_jobseeker = $http.get(pathWebsite + 'admin/jobseeker/getListJobseeker').then(function(response){
						return response.data;
				})
			}
			return _jobseeker;
		};
		_jobseekerService.getToken = function(callback){
			$http.get(pathWebsite + 'admin/jobseeker/getToken').success(callback);
		};
		_jobseekerService.createJobseeker = function(jobseeker,csrf,callback){
			//csrf_test_name
			//var objectJobseeker = JSON.parse(jobseeker);
			//var csrf_name = objectJobseeker['csrf_name'];
			//var objectCsrf = JSON.parse(csrf);
			var csrf_hash = csrf['hash'];
			console.log(csrf_hash);
			var postData = $.param({'csrf_test_name': csrf_hash,'jobseeker':jobseeker});

			$http.post(pathWebsite + 'admin/jobseeker/createJobseeker', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
		};

		_jobseekerService.updateJobseeker = function(jobseeker,callback){
			//csrf_test_name
			var objectJobseeker = JSON.parse(jobseeker);
			var csrf_name = objectJobseeker['csrf_name'];
			var csrf_hash = objectJobseeker['csrf_hash'];
			//console.log(csrf_hash);
			var postData = $.param({'csrf_test_name': csrf_hash,'jobseeker':jobseeker});

			$http.post(pathWebsite + 'admin/jobseeker/updateJobseeker', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
		};
		_jobseekerService.deleteJobseeker = function(jobseeker,callback){
			var objectJobseeker = JSON.parse(jobseeker);
			var csrf_name = objectJobseeker['csrf_name'];
			var csrf_hash = objectJobseeker['csrf_hash'];
			var postData = $.param({'csrf_test_name': csrf_hash,'jobseeker':jobseeker});
			$http.post(pathWebsite + 'admin/jobseeker/deleteJobseeker', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
		};
		_jobseekerService.getDetailDocument = function(id){
			var temp = {};
			    var defer = $q.defer();
			    $http.get(pathWebsite + 'admin/jobseeker/detail/document/'+id).success(function(data){
			           // alert(data);
			           console.log(data);
			            temp =data;
			            defer.resolve(data);

			    });
			    return defer.promise;
		};
		_jobseekerService.getTokenReturn = function(){
			var temp = {};
			    var defer = $q.defer();
			    $http.get(pathWebsite + 'admin/jobseeker/getToken').success(function(data){
			           // alert(data);
			          // console.log(data);
			            temp =data;
			            defer.resolve(data);

			    });
			    return defer.promise;
		};
		_jobseekerService.checkEmailExits = function(email){
			var temp = {};
			    var defer = $q.defer();
			    $http.get(pathWebsite + 'admin/jobseeker/checkEmailExits/'+email).success(function(data){
			           // alert(data);
			          // console.log(data);
			            temp =data;
			            defer.resolve(data);

			    });
			    return defer.promise;
		};
		return _jobseekerService;
});
app.factory('Notify', ['$rootScope',
		function($rootScope) {
			var notify = {};
			notify.sendMsg = function(msg,data){
				data = data || {};
				$rootScope.$emit(msg,data);

				console.log("message sent!");
			};

			notify.getMsg = function (msg,func,scope) {
				var unbind = $rootScope.$on(msg,func);
				if(scope){
					scope.$on('destroy',unbind);
				}
			};
			return notify;
		}
	]);