app.factory('adminService' ,function ($http,$q,$timeout){
    var _adminService = {};
	_adminService.getToken = function(){
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

	_adminService.changePassword = function(admin,callback){
		var objectadmin = JSON.parse(admin);
		var csrf_name = objectadmin['csrf']['name'];
		var csrf_hash = objectadmin['csrf']['hash'];
		var postData = $.param({'csrf_test_name': csrf_hash,'admin':admin});
		$http.post(pathWebsite + 'admin/profile/changePassword', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);		
	}
	return _adminService;
});