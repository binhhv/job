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

	_titleSiteService.getListTitleSite = function(option,callback){
 		return $http.get(pathWebsite + 'admin/config/getListTitleSite/'+option).success(callback);
 	}
	// _titleSiteService.updateHealth = function(health,callback){
	// 	var objecthealth = JSON.parse(health);
	// 		var csrf_name = objecthealth['csrf']['name'];
	// 		var csrf_hash = objecthealth['csrf']['hash'];
	// 		var postData = $.param({'csrf_test_name': csrf_hash,'health':health});
	// 		$http.post(pathWebsite + 'admin/category/updateHealth', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
	
	// };
	_titleSiteService.createTitleSite = function(site,option,callback){
		var objectsite = JSON.parse(site);
			var csrf_name = objectsite['csrf']['name'];
			var csrf_hash = objectsite['csrf']['hash'];
			var postData = $.param({'csrf_test_name': csrf_hash,'site':site,'option':option});
			$http.post(pathWebsite + 'admin/config/createTitleSite', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
	
	}
	_titleSiteService.selectedTitleSite = function(site,active,option,callback){
			return $http.get(pathWebsite + 'admin/config/selectedTitleSite/'+site+'/'+active+'/'+option).success(callback);
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
	_titleSiteService.deleteTitleSite = function(site,option,callback){
			var objectsite = JSON.parse(site);
			var csrf_name = objectsite['csrf']['name'];
			var csrf_hash = objectsite['csrf']['hash'];
			var postData = $.param({'csrf_test_name': csrf_hash,'site':site,'option':option});
			$http.post(pathWebsite + 'admin/config/deleteTitleSite', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
	
	}
	return _titleSiteService;
});

app.factory('adwordsService' ,function ($http,$q,$timeout){
	var _adwordsService ={};

	_adwordsService.getListAdwords = function(callback){
 		return $http.get(pathWebsite + 'admin/config/getListAdwords').success(callback);
 	}
	
	_adwordsService.updateAdword = function(adword,callback){
		var objectadword = JSON.parse(adword);
			var csrf_name = objectadword['csrf']['name'];
			var csrf_hash = objectadword['csrf']['hash'];
			var postData = $.param({'csrf_test_name': csrf_hash,'adword':adword});
			$http.post(pathWebsite + 'admin/config/updateAdword', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
	
	}

	return _adwordsService;
});

app.factory('memberService' ,function ($http,$q,$timeout){
	var _memberService ={};

	_memberService.getListMember = function(callback){
 		return $http.get(pathWebsite + 'admin/config/getListMember').success(callback);
 	}
	_memberService.choiceMember = function(id,callback){
		return $http.get(pathWebsite + 'admin/config/choiceMember/'+id).success(callback);
	}
	_memberService.unchoiceMember = function(id,callback){
		return $http.get(pathWebsite + 'admin/config/unchoiceMember/'+id).success(callback);
	}
	_memberService.changeMember = function(idOld,idNew,callback){
		return $http.get(pathWebsite + 'admin/config/changeMember/'+idOld+'/'+idNew).success(callback);
	}
	_memberService.deleteMember = function(member,callback){
			var objectmember = JSON.parse(member);
			var csrf_name = objectmember['csrf']['name'];
			var csrf_hash = objectmember['csrf']['hash'];
			var postData = $.param({'csrf_test_name': csrf_hash,'member':member});
			$http.post(pathWebsite + 'admin/config/deleteMember', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
	
	}
	_memberService.createMember = function(member,avatarObject,callback){
			var objectMember = JSON.parse(member);
			var csrf_name = objectMember['csrf']['name'];
			var csrf_hash = objectMember['csrf']['hash'];
			var postData = $.param({'csrf_test_name': csrf_hash,'member':member,'avatarObject':JSON.stringify(avatarObject)});

			$http.post(pathWebsite + 'admin/config/createMember', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
	
	}
	_memberService.updateMember = function(member,avatarObject,callback){
			var objectMember = JSON.parse(member);
			var csrf_name = objectMember['csrf']['name'];
			var csrf_hash = objectMember['csrf']['hash'];
			var postData = $.param({'csrf_test_name': csrf_hash,'member':member,'avatarObject':JSON.stringify(avatarObject)});

			$http.post(pathWebsite + 'admin/config/updateMember', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
	
	}
	// _memberService.updateAdword = function(adword,callback){
	// 	var objectadword = JSON.parse(adword);
	// 		var csrf_name = objectadword['csrf']['name'];
	// 		var csrf_hash = objectadword['csrf']['hash'];
	// 		var postData = $.param({'csrf_test_name': csrf_hash,'adword':adword});
	// 		$http.post(pathWebsite + 'admin/config/updateAdword', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
	
	// }
	// _memberService.getToken = function(){
	// 		var temp = {};
	// 		    var defer = $q.defer();
	// 		    $http.get(pathWebsite + 'admin/jobseeker/getToken').success(function(data){
	// 		            temp =data;
	// 		            $timeout(function(){
	// 				      defer.resolve(data);
	// 				    }, 350) 
			           

	// 		    });
	// 		    return defer.promise;
	// 	};
	return _memberService;
});

app.factory('videoService' ,function ($http,$q,$timeout){
	var _videoService ={};

	_videoService.getListVideos = function(callback){
 		return $http.get(pathWebsite + 'admin/config/getListVideos').success(callback);
 	}
	
	// _adwordsService.updateAdword = function(adword,callback){
	// 	var objectadword = JSON.parse(adword);
	// 		var csrf_name = objectadword['csrf']['name'];
	// 		var csrf_hash = objectadword['csrf']['hash'];
	// 		var postData = $.param({'csrf_test_name': csrf_hash,'adword':adword});
	// 		$http.post(pathWebsite + 'admin/config/updateAdword', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
	
	// }

	_videoService.activeDelete = function(video,callback){
			var objectVideo = JSON.parse(video);
			var csrf_name = objectVideo['csrf']['name'];
			var csrf_hash = objectVideo['csrf']['hash'];
			var postData = $.param({'csrf_test_name': csrf_hash,'video':video});
			$http.post(pathWebsite + 'admin/config/activeDeleteVideo', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
	
	}

	return _videoService;
});

app.factory('numberRecruitmentService' ,function ($http,$q,$timeout){
	var _numberRecruitmentService ={};

	_numberRecruitmentService.getConfigNumRecruitment = function(callback){
 		return $http.get(pathWebsite + 'admin/config/getConfigNumRecruitment').success(callback);
 	}
	
	// _adwordsService.updateAdword = function(adword,callback){
	// 	var objectadword = JSON.parse(adword);
	// 		var csrf_name = objectadword['csrf']['name'];
	// 		var csrf_hash = objectadword['csrf']['hash'];
	// 		var postData = $.param({'csrf_test_name': csrf_hash,'adword':adword});
	// 		$http.post(pathWebsite + 'admin/config/updateAdword', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
	
	// }

	_numberRecruitmentService.updateConfigNumRecruitment = function(configRecruitment,callback){
			var objectConfigRec = JSON.parse(configRecruitment);
			var csrf_name = objectConfigRec['csrf']['name'];
			var csrf_hash = objectConfigRec['csrf']['hash'];
			var postData = $.param({'csrf_test_name': csrf_hash,'configRecruitment':configRecruitment});
			$http.post(pathWebsite + 'admin/config/updateConfigNumRecruitment', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
	
	}

	return _numberRecruitmentService;
});


app.factory('imageRecruitmentService' ,function ($http,$q,$timeout){
	var _imageRecruitmentService ={};

	_imageRecruitmentService.getImageRec = function(callback){
 		return $http.get(pathWebsite + 'admin/config/getImageRec').success(callback);
 	}
	_imageRecruitmentService.uploadImageRec = function(slide,slideObject,callback){
		var objectSlide = JSON.parse(slide);
			
			var csrf_name = objectSlide['csrf']['name'];
			var csrf_hash = objectSlide['csrf']['hash'];
			var postData = $.param({'csrf_test_name': csrf_hash,'slide':slide,'slideObject':JSON.stringify(slideObject)});

			$http.post(pathWebsite + 'admin/config/uploadImageRec', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
	
	};
	_imageRecruitmentService.deleteImageRec = function(slide,callback){
			var objectSlide = JSON.parse(slide);
			var csrf_name = objectSlide['csrf']['name'];
			var csrf_hash = objectSlide['csrf']['hash'];
			var postData = $.param({'csrf_test_name': csrf_hash,'slide':slide});
			$http.post(pathWebsite + 'admin/config/deleteImageRec', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
	
	}
	_imageRecruitmentService.activeImageRec = function(slide,callback){
		return $http.get(pathWebsite + 'admin/config/activeImageRec/'+slide).success(callback);
	}
	_imageRecruitmentService.deactiveImageRec = function(slide,callback){
		
			return $http.get(pathWebsite + 'admin/config/deactiveImageRec/'+slide).success(callback);
	}
	return _imageRecruitmentService;
});
