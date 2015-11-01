app.factory('recruitmentService' ,function ($http,$q,$timeout){
		var _recruitmentService = {};
		_recruitmentService.getListEmployer = function(){
			return $http.get(pathWebsite + 'admin/recruitment/getListEmployer');
		};
		_recruitmentService.createRecruitment = function(rec,callback){
			var objectrec = JSON.parse(rec);
			//var csrf = JSON.parse(objectrec.csrf);
			var csrf_hash = (objectrec.csrf)['hash'];
			//console.log(csrf['hash']);
			var postData = $.param({'csrf_test_name': csrf_hash,'rec':rec});
			$http.post(pathWebsite + 'admin/recruitment/createRecruitment', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
		
		};
		_recruitmentService.getListRecruitments = function(type,callback){
			console.log("call service");
			return $http.get(pathWebsite + 'admin/recruitment/getListRecruitment/'+type).success(callback);
		};
		_recruitmentService.getRecruitmentApply = function(id,callback){
			var temp = {};
			    var defer = $q.defer();
			    $http.get(pathWebsite + 'admin/recruitment/getRecruitmentApply/'+id).success(function(data){
			            temp =data;
			            $timeout(function(){
					      defer.resolve(data);
					    }, 750) 

			    });
			    return defer.promise;
		}
		_recruitmentService.getToken = function(){
			var temp = {};
			    var defer = $q.defer();
			    $http.get(pathWebsite + 'admin/jobseeker/getToken').success(function(data){
			            temp =data;
			            $timeout(function(){
					      defer.resolve(data);
					    }, 350) 
			           

			    });
			    return defer.promise;
		};

		_recruitmentService.editShowRecruitment = function(rec,callback){
			var objectRecruitment = JSON.parse(rec);
			
			var csrf_name = objectRecruitment['csrf']['name'];
			var csrf_hash = objectRecruitment['csrf']['hash'];
			var postData = $.param({'csrf_test_name': csrf_hash,'rec':rec});
			$http.post(pathWebsite + 'admin/recruitment/editShowRecruitment', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
		
		}

		_recruitmentService.disabledRecruitment = function(rec,callback){
			var objectRecruitment = JSON.parse(rec);
			
			var csrf_name = objectRecruitment['csrf']['name'];
			var csrf_hash = objectRecruitment['csrf']['hash'];
			var postData = $.param({'csrf_test_name': csrf_hash,'rec':rec});
			$http.post(pathWebsite + 'admin/recruitment/disabledRecruitment', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
		
		}
		
		return _recruitmentService;
});