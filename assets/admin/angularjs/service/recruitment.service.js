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

		
		return _recruitmentService;
});