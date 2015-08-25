app.factory('documentService' ,function ($http,$q){
		var _documentService = {};
		//var _employer;

		_documentService.getListCV = function(callback){
			return $http.get(pathWebsite + 'admin/document/getListCV').success(callback);
		};
		_documentService.getListForm = function(callback){
			return $http.get(pathWebsite + 'admin/document/getListForm').success(callback);
		};
		_documentService.getToken = function(callback){
			$http.get(pathWebsite + 'admin/jobseeker/getToken').success(callback);
		};
		
		_documentService.deleteCV = function(cv,callback){
			var objectcv = JSON.parse(cv);
			var csrf_name = objectcv['csrf_name'];
			var csrf_hash = objectcv['csrf_hash'];
			var postData = $.param({'csrf_test_name': csrf_hash,'cv':cv});

			$http.post(pathWebsite + 'admin/document/deleteCV', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
		};
		_documentService.deleteForm= function(docform,callback){
			var objectform = JSON.parse(docform);
			var csrf_name = objectform['csrf_name'];
			var csrf_hash = objectform['csrf_hash'];
			var postData = $.param({'csrf_test_name': csrf_hash,'docform':docform});

			$http.post(pathWebsite + 'admin/document/deleteForm', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
		};
		_documentService.updateForm = function(form,callback){
			var objectform = JSON.parse(form);
			var csrf_name = objectform['csrf_name'];
			var csrf_hash = objectform['csrf_hash'];
			var postData = $.param({'csrf_test_name': csrf_hash,'form':form});

			$http.post(pathWebsite + 'admin/document/updateForm', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
		};
		
		_documentService.getDetailForm = function(id){
			var temp = {};
			    var defer = $q.defer();
			    $http.get(pathWebsite + 'admin/document/form/'+id).success(function(data){
			           // alert(data);
			           console.log(data);
			            temp =data;
			            defer.resolve(data);

			    });
			    return defer.promise;
		};
		_documentService.getListHealthy = function(callback){
			return $http.get(pathWebsite + 'admin/document/getListHealthy').success(callback);
		};

		_documentService.getTokenReturn = function(){
			var temp = {};
			    var defer = $q.defer();
			    $http.get(pathWebsite + 'admin/jobseeker/getToken').success(function(data){
			            temp =data;
			            defer.resolve(data);

			    });
			    return defer.promise;
		};
		_documentService.checkEmailExits = function(email){
			var temp = {};
			    var defer = $q.defer();
			    $http.get(pathWebsite + 'admin/jobseeker/checkEmailExits/'+email).success(function(data){
			            temp =data;
			            defer.resolve(data);

			    });
			    return defer.promise;
		};
		return _documentService;
});