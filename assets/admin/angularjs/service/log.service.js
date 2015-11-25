app.factory('logService' ,function ($http,$q,$timeout){
    var _logService = {};
	_logService.getToken = function(){
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

	_logService.getLogs= function(callback){
		return $http.get(pathWebsite + 'admin/log/getLogs').success(callback);
	}
	return _logService;
});