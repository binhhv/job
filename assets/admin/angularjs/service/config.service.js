app.factory('configService' ,function ($http,$q,$timeout){
	var _configService ={};
	_configService.getToken = function(){
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
	return _configService;
});
app.factory('logoService' ,function ($http,$q,$timeout){
	var _logoService ={};

	_logoService.getListLogo = function(callback){
 		return $http.get(pathWebsite + 'admin/config/getListLogo').success(callback);
 	}
	_logoService.uploadLogo = function(logo,logoObject,callback){
		var objectLogo = JSON.parse(logo);
			
			var csrf_name = objectLogo['csrf']['name'];
			var csrf_hash = objectLogo['csrf']['hash'];
			var postData = $.param({'csrf_test_name': csrf_hash,'logo':logo,'logoObject':JSON.stringify(logoObject)});

			$http.post(pathWebsite + 'admin/config/uploadLogo', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
	};
	_logoService.activeDelete = function(logo,callback){
			var objectLogo = JSON.parse(logo);
			var csrf_name = objectLogo['csrf']['name'];
			var csrf_hash = objectLogo['csrf']['hash'];
			var postData = $.param({'csrf_test_name': csrf_hash,'logo':logo});
			$http.post(pathWebsite + 'admin/config/activeDeleteLogo', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
	
	}
	return _logoService;
});

app.factory('slideService' ,function ($http,$q,$timeout){
	var _slideService ={};

	_slideService.getListSlide = function(typeOption,callback){
 		return $http.get(pathWebsite + 'admin/config/getListSlide/'+typeOption).success(callback);
 	}
	_slideService.uploadSlide = function(typeOption,slide,slideObject,callback){
		var objectSlide = JSON.parse(slide);
			
			var csrf_name = objectSlide['csrf']['name'];
			var csrf_hash = objectSlide['csrf']['hash'];
			var postData = $.param({'csrf_test_name': csrf_hash,'slide':slide,'slideObject':JSON.stringify(slideObject),'type':typeOption});

			$http.post(pathWebsite + 'admin/config/uploadSlide', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
	};
	_slideService.deleteSlide = function(typeOption,slide,callback){
			var objectSlide = JSON.parse(slide);
			var csrf_name = objectSlide['csrf']['name'];
			var csrf_hash = objectSlide['csrf']['hash'];
			var postData = $.param({'csrf_test_name': csrf_hash,'slide':slide,'type':typeOption});
			$http.post(pathWebsite + 'admin/config/deleteSlide', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
	
	}
	_slideService.activeSlide = function(typeOption,slide,callback){
		return $http.get(pathWebsite + 'admin/config/activeSlide/'+slide+'/'+typeOption).success(callback);
	}
	_slideService.deactiveSlide = function(typeOption,slide,callback){
		
			return $http.get(pathWebsite + 'admin/config/deactiveSlide/'+slide+'/'+typeOption).success(callback);
	}
	return _slideService;
});

app.factory('titleSiteService' ,function ($http,$q,$timeout){
	var _titleSiteService ={};

	_titleSiteService.getListTitleSite = function(callback){
 		return $http.get(pathWebsite + 'admin/config/getListTitleSite').success(callback);
 	}
	// _titleSiteService.updateHealth = function(health,callback){
	// 	var objecthealth = JSON.parse(health);
	// 		var csrf_name = objecthealth['csrf']['name'];
	// 		var csrf_hash = objecthealth['csrf']['hash'];
	// 		var postData = $.param({'csrf_test_name': csrf_hash,'health':health});
	// 		$http.post(pathWebsite + 'admin/category/updateHealth', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
	
	// };
	_titleSiteService.createTitleSite = function(site,callback){
		var objectsite = JSON.parse(site);
			var csrf_name = objectsite['csrf']['name'];
			var csrf_hash = objectsite['csrf']['hash'];
			var postData = $.param({'csrf_test_name': csrf_hash,'site':site});
			$http.post(pathWebsite + 'admin/config/createTitleSite', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
	
	}
	_titleSiteService.selectedTitleSite = function(site,active,callback){
			return $http.get(pathWebsite + 'admin/config/selectedTitleSite/'+site+'/'+active).success(callback);
			//var objectsite = JSON.parse(site);
			//var csrf_name = objectsite['csrf']['name'];
			//var csrf_hash = objectsite['csrf']['hash'];
			//var postData = $.param({'csrf_test_name': csrf_hash,'site':site});
			//if(active === 1){
				//$http.post(pathWebsite + 'admin/config/selectedTitleSite', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
			//}
			//else{
				//$http.post(pathWebsite + 'admin/config/unselectedTitleSite', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
			//}
			
	
	}
	_titleSiteService.deleteTitleSite = function(site,callback){
			var objectsite = JSON.parse(site);
			var csrf_name = objectsite['csrf']['name'];
			var csrf_hash = objectsite['csrf']['hash'];
			var postData = $.param({'csrf_test_name': csrf_hash,'site':site});
			$http.post(pathWebsite + 'admin/config/deleteTitleSite', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
	
	}
	return _titleSiteService;
});