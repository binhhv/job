app.factory('contactService' ,function ($http,$q,$timeout){
		var _contactService = {};
		_contactService.getListContact = function(callback){
			return $http.get(pathWebsite + 'admin/contact/getListContact').success(callback);
		};

		_contactService.getToken = function(){
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
		_contactService.deleteContact = function(contact,callback){
			var objectform = JSON.parse(contact);
			var csrf_name = objectform['csrf']['name'];
			var csrf_hash = objectform['csrf']['hash'];
			var postData = $.param({'csrf_test_name': csrf_hash,'contact':objectform['cont_id']});
			$http.post(pathWebsite + 'admin/contact/deleteContact', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
		
		}
		_contactService.replyContact = function(contact,callback){
			var objectform = JSON.parse(contact);
			var csrf_name = objectform['csrf']['name'];
			var csrf_hash = objectform['csrf']['hash'];
			var postData = $.param({'csrf_test_name': csrf_hash,'contact':contact});
			$http.post(pathWebsite + 'admin/contact/replyContact', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
		
		}
		_contactService.updateContactView = function(id){
			var temp = {};
			    var defer = $q.defer();
			    $http.get(pathWebsite + 'admin/contact/updateContactView/'+id).success(function(data){
			            temp =data;
			            $timeout(function(){
					      defer.resolve(data);
					    }, 750) 

			    });
			    return defer.promise;
		}
		return _contactService;
	});