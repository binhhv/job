app.factory('mailJobseekerService' ,function ($http,$q,$timeout){
	var _mailJobseekerService ={};

	_mailJobseekerService.getListMailJobseeker = function(callback){
 		return $http.get(pathWebsite + 'admin/mail/getListMailJobseeker').success(callback);
 	}
 	return _mailJobseekerService;
});
app.factory('mailEmployerService' ,function ($http,$q,$timeout){
	var _mailEmployerService ={};

	_mailEmployerService.getListMailEmployer = function(callback){
 		return $http.get(pathWebsite + 'admin/mail/getListMailEmployer').success(callback);
 	}
 	return _mailEmployerService;
});