app.factory('employerService' ,function ($http,$q,$timeout){
		var _employerService = {};
		var _employer;

		_employerService.getListEmployer = function(callback){
			return $http.get(pathWebsite + 'admin/employer/getListEmployer').success(callback);
		};
		_employerService.getToken = function(callback){
			$http.get(pathWebsite + 'admin/jobseeker/getToken').success(callback);
		};
		_employerService.createEmployer = function(employer,logo,callback){
			var objectemployer = JSON.parse(employer);
			console.log(objectemployer);
			var csrf_name = objectemployer['csrf']['name'];
			var csrf_hash = objectemployer['csrf']['hash'];
			var postData = $.param({'csrf_test_name': csrf_hash,'employer':employer,'logo':JSON.stringify(logo)});

			$http.post(pathWebsite + 'admin/employer/createemployer', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
		};

		_employerService.updateEmployer = function(employer,logo,callback){
			console.log(logo);
			var objectemployer = JSON.parse(employer);
			var csrf_name = objectemployer['csrf_name'];
			var csrf_hash = objectemployer['csrf_hash'];
			var postData = $.param({'csrf_test_name': csrf_hash,'employer':employer,'logo':JSON.stringify(logo)});

			$http.post(pathWebsite + 'admin/employer/updateemployer', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
		};
		_employerService.deleteEmployer = function(employer,callback){
			var objectemployer = JSON.parse(employer);
			var csrf_name = objectemployer['csrf_name'];
			var csrf_hash = objectemployer['csrf_hash'];
			var postData = $.param({'csrf_test_name': csrf_hash,'employer':employer});
			$http.post(pathWebsite + 'admin/employer/deleteemployer', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
		
		};
		_employerService.getDetailDocument = function(id){
			var temp = {};
			    var defer = $q.defer();
			    $http.get(pathWebsite + 'admin/employer/detail/document/'+id).success(function(data){
			           // alert(data);
			           console.log(data);
			            temp =data;
			            $timeout(function(){
					      defer.resolve(data);
					    }, 750) 

			    });
			    return defer.promise;
		};
		_employerService.getTokenReturn = function(){
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
		_employerService.checkEmailExits = function(email){
			var temp = {};
			    var defer = $q.defer();
			    $http.get(pathWebsite + 'admin/employer/checkEmailExits/'+email).success(function(data){
			            temp =data;
			            $timeout(function(){
					      defer.resolve(data);
					    }, 750) 

			    });
			    return defer.promise;
		};
		_employerService.changeSwitchSearch = function(employer,callback){
			var objectemployer = JSON.parse(employer);
			var csrf_name = objectemployer['csrf']['name'];;
			var csrf_hash = objectemployer['csrf']['hash'];;
			var postData = $.param({'csrf_test_name': csrf_hash,'employer':employer});
			$http.post(pathWebsite + 'admin/employer/changeSwitchSearch', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
		}
		return _employerService;
});

app.factory('employerUserService' ,function ($http,$q,$timeout){
		var _employerUserService = {};
		var _employer;

		_employerUserService.getListEmployerUser = function(id,callback){
			return $http.get(pathWebsite + 'admin/employer/getListEmployerUser/'+id).success(callback);
		};
		_employerUserService.checkAdminEmployerExits = function(id,callback){
			return $http.get(pathWebsite + 'admin/employer/checkAdminEmployerExits/'+id).success(callback);
		}
		_employerUserService.setRoleAdminEmployer = function(id,employeruser,crfs,callback){
			var postData = $.param({'csrf_test_name': crfs,'employeruser':employeruser,'employerid':id});

			$http.post(pathWebsite + 'admin/employer/setRoleAdminEmployer', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
		}
		_employerUserService.createEmployerUser = function(employeruser,csrf,employerid,employerUserRole,callback){
			var csrf_hash = csrf['hash'];
			//console.log(csrf_hash);
			var postData = $.param({'csrf_test_name': csrf_hash,'employeruser':employeruser,'employerid':employerid,'role':employerUserRole});

			$http.post(pathWebsite + 'admin/employer/createEmployerUser', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
		};
		_employerUserService.deleteEmployerUser = function(employeruser,callback){
			var objectEmployer = JSON.parse(employeruser);
			var csrf_name = objectEmployer['csrf_name'];
			var csrf_hash = objectEmployer['csrf_hash'];
			var postData = $.param({'csrf_test_name': csrf_hash,'employeruser':employeruser});
			$http.post(pathWebsite + 'admin/employer/deleteEmployerUser', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
		};
		_employerUserService.getToken = function(callback){
			$http.get(pathWebsite + 'admin/jobseeker/getToken').success(callback);
		};
		
		_employerUserService.getTokenReturn = function(){
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
		_employerUserService.checkEmailExits = function(email){
			var temp = {};
			    var defer = $q.defer();
			    $http.get(pathWebsite + 'admin/employer/checkEmailExits/'+email).success(function(data){
			            temp =data;
			             $timeout(function(){
					      defer.resolve(data);
					    }, 750) 

			    });
			    return defer.promise;
		};
		return _employerUserService;
});


app.factory('employerRecruitmentService' ,function ($http,$q,$timeout){
		var _employerRecruitmentService = {};
		var _employer;

		_employerRecruitmentService.getListEmployerRecruitment = function(id,callback){
			return $http.get(pathWebsite + 'admin/employer/getListEmployerRecruitment/'+id).success(callback);
		};
		_employerRecruitmentService.getToken = function(callback){
			$http.get(pathWebsite + 'admin/employer/getToken').success(callback);
		};
		_employerRecruitmentService.getListWelfare = function(callback){
			$http.get(pathWebsite + 'admin/employer/getListWelfare').success(callback);
		};
		_employerRecruitmentService.getListForm = function(callback){
			$http.get(pathWebsite + 'admin/employer/getListForm').success(callback);
		};
		_employerRecruitmentService.getListFormChild = function(callback){
			$http.get(pathWebsite + 'admin/employer/getListFormChild').success(callback);
		};
		_employerRecruitmentService.getListLevel = function(callback){
			$http.get(pathWebsite + 'admin/employer/getListLevel').success(callback);
		};
		_employerRecruitmentService.getListContactForm = function(callback){
			$http.get(pathWebsite + 'admin/employer/getListContactForm').success(callback);
		};
		_employerRecruitmentService.getListWelfareEmployerRecruitment = function(idrec,callback){
			$http.get(pathWebsite + 'admin/employer/getListWelfareEmployerRecruitment/'+idrec).success(callback);
		};
		_employerRecruitmentService.getListProvinceCountry = function(idcountry){
			return $http.get(pathWebsite + 'admin/employer/getListProvinceCountry/'+idcountry);//.then(function(data){
				//return data;
			//});
		};
		_employerRecruitmentService.getListCountry = function(callback){
			$http.get(pathWebsite + 'admin/employer/getListCountry').success(callback);
		};
		_employerRecruitmentService.getListProvinceRecruitment = function(id){
			return $http.get(pathWebsite + 'admin/employer/getListProvinceRecruitment/'+id);//.success(function(data){
				//return data;
			//});
		}
		_employerRecruitmentService.getListProvinceRecruitmentChange = function(idrec,idcountry){
			return $http.get(pathWebsite + 'admin/employer/getListProvinceRecruitmentChange/'+idrec + '/' + idcountry);
		}
		_employerRecruitmentService.getListCountryNoRT = function(){
			var temp = {};
			    var defer = $q.defer();
			    $http.get(pathWebsite + 'admin/employer/getListCountry').success(function(data){
			           // alert(data);
			           console.log(data);
			            temp =data;
			            $timeout(function(){
					      defer.resolve(data);
					    }, 350) 

			    });
			    return defer.promise;
			//$http.get().success(callback);
		};
		_employerRecruitmentService.getListProvinceRecruitmentNoRT = function(id){
			//$http.get(pathWebsite + 'admin/employer/getListProvinceRecruitment/'+id).success(callback);
			var temp = [];
			    var defer = $q.defer();
			    $http.get(pathWebsite + 'admin/employer/getListProvinceRecruitment/'+id).success(function(data){
			           // alert(data);
			           //console.log(data);
			            temp =data;
			            $timeout(function(){
					      defer.resolve(data);
					    }, 350) 

			    });
			    return defer.promise;
		}
		_employerRecruitmentService.getListProvinceCountryNoRT = function(idcountry){
			var temp = [];
			    var defer = $q.defer();
			    $http.get(pathWebsite + 'admin/employer/getListProvinceCountry/'+idcountry).success(function(data){
			           // alert(data);
			          // console.log(data);
			            temp =data;
			            $timeout(function(){
					      defer.resolve(data);
					    }, 350) 

			    });
			    return defer.promise;
		}
		_employerRecruitmentService.deleteEmployerRecruitment = function(recruitment,callback){
			var objectRecruitment = JSON.parse(recruitment);
			var csrf_name = objectRecruitment['csrf_name'];
			var csrf_hash = objectRecruitment['csrf_hash'];
			var postData = $.param({'csrf_test_name': csrf_hash,'recruitment':recruitment});
			$http.post(pathWebsite + 'admin/employer/deleteEmployerRecruitment', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
		};
		_employerRecruitmentService.getDetailEmployerRecruitment = function(id){
			var temp = {};
			    var defer = $q.defer();
			    $http.get(pathWebsite + 'admin/employer/detailEmployerRecruitment/'+id).success(function(data){
			           // alert(data);
			           console.log(data);
			            temp =data;
			            $timeout(function(){
					      defer.resolve(data);
					    }, 350) 

			    });
			    return defer.promise;
		};
		_employerRecruitmentService.updateEmployerRecruitment = function(rec,callback){
			var objectrec = JSON.parse(rec);
			var csrf_name = objectrec['csrf_name'];
			var csrf_hash = objectrec['csrf_hash'];
			console.log(csrf_hash);
			var postData = $.param({'csrf_test_name': csrf_hash,'rec':rec});
			$http.post(pathWebsite + 'admin/employer/updateEmployerRecruitment', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
		}
		_employerRecruitmentService.createEmployerRecruitment =function(rec,callback){
			var objectrec = JSON.parse(rec);
			//var csrf = JSON.parse(objectrec.csrf);
			var csrf_hash = (objectrec.csrf)['hash'];
			//console.log(csrf['hash']);
			var postData = $.param({'csrf_test_name': csrf_hash,'rec':rec});
			$http.post(pathWebsite + 'admin/employer/createEmployerRecruitment', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
		}
		_employerRecruitmentService.approveRecruitment = function(rec,callback){
			var objectrec = JSON.parse(rec);
			var csrf_name = objectrec['csrf_name'];
			var csrf_hash = objectrec['csrf_hash'];
			console.log(csrf_hash);
			var postData = $.param({'csrf_test_name': csrf_hash,'rec':rec});
			$http.post(pathWebsite + 'admin/employer/approveEmployerRecruitment', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
		}
		_employerRecruitmentService.getTokenReturn = function(){
			var temp = {};
			    var defer = $q.defer();
			    $http.get(pathWebsite + 'admin/jobseeker/getToken').success(function(data){
			            temp =data;
			             $timeout(function(){
					      defer.resolve(data);
					    }, 350) 
			            console.log("call token");

			    });
			    return defer.promise;
		};
		_employerRecruitmentService.checkEmailExits = function(email){
			var temp = {};
			    var defer = $q.defer();
			    $http.get(pathWebsite + 'admin/employer/checkEmailExits/'+email).success(function(data){
			            temp =data;
			            $timeout(function(){
					      defer.resolve(data);
					    }, 350) 

			    });
			    return defer.promise;
		};
		_employerRecruitmentService.getListCareer = function(){
			var temp = {};
			    var defer = $q.defer();
			    $http.get(pathWebsite + 'admin/document/getListCareer').success(function(data){
			            temp =data;
			            $timeout(function(){
					      defer.resolve(data);
					    }, 350) 

			    });
			    return defer.promise;
			};
		//function with resolve
		_employerRecruitmentService.getListWelfareR = function(callback){
				var temp = {};
			    var defer = $q.defer();
			    $http.get(pathWebsite + 'admin/employer/getListWelfare').success(function(data){
			            temp =data;
			             $timeout(function(){
					      defer.resolve(data);
					    }, 350) 

			    });
			    return defer.promise;
			//$http.get(pathWebsite + 'admin/employer/getListWelfare').success(callback);
		};
		_employerRecruitmentService.getListFormR = function(callback){
			var temp = {};
			    var defer = $q.defer();
			    $http.get(pathWebsite + 'admin/employer/getListForm').success(function(data){
			            temp =data;
			           $timeout(function(){
					      defer.resolve(data);
					    }, 350) 

			    });
			    return defer.promise;
			//$http.get(pathWebsite + 'admin/employer/getListForm').success(callback);
		};
		_employerRecruitmentService.getListFormChildR = function(callback){
			var temp = {};
			    var defer = $q.defer();
			    $http.get(pathWebsite + 'admin/employer/getListFormChild').success(function(data){
			            temp =data;
			            $timeout(function(){
					      defer.resolve(data);
					    }, 350) 

			    });
			    return defer.promise;
			//$http.get(pathWebsite + 'admin/employer/getListFormChild').success(callback);
		};
		_employerRecruitmentService.getListLevelR = function(callback){
			var temp = {};
			    var defer = $q.defer();
			    $http.get(pathWebsite + 'admin/employer/getListLevel').success(function(data){
			            temp =data;
			            $timeout(function(){
					      defer.resolve(data);
					    }, 350) 

			    });
			    return defer.promise;
			//$http.get(pathWebsite + 'admin/employer/getListLevel').success(callback);
		};
		_employerRecruitmentService.getListContactFormR = function(callback){
			var temp = {};
			    var defer = $q.defer();
			    $http.get(pathWebsite + 'admin/employer/getListContactForm').success(function(data){
			            temp =data;
			             $timeout(function(){
					      defer.resolve(data);
					    }, 350) 

			    });
			    return defer.promise;
			//$http.get(pathWebsite + 'admin/employer/getListContactForm').success(callback);
		};
		_employerRecruitmentService.getListWelfareEmployerRecruitmentR = function(idrec,callback){
			var temp = {};
			    var defer = $q.defer();
			    $http.get(pathWebsite + 'admin/employer/getListWelfareEmployerRecruitment/'+idrec).success(function(data){
			            temp =data;
			            $timeout(function(){
					      defer.resolve(data);
					    }, 350) 

			    });
			    return defer.promise;
			//$http.get(pathWebsite + 'admin/employer/getListWelfareEmployerRecruitment/'+idrec).success(callback);
		};
		_employerRecruitmentService.getListProvinceCountryR = function(idcountry){
			var temp = {};
			    var defer = $q.defer();
			    $http.get(pathWebsite + 'admin/employer/getListProvinceCountry/'+idcountry).success(function(data){
			            temp =data;
			            $timeout(function(){
					      defer.resolve(data);
					    }, 350) 

			    });
			    return defer.promise;
			//return $http.get(pathWebsite + 'admin/employer/getListProvinceCountry/'+idcountry);//.then(function(data){
				//return data;
			//});
		};
		_employerRecruitmentService.getListCountryR = function(callback){
			var temp = {};
			    var defer = $q.defer();
			    $http.get(pathWebsite + 'admin/employer/getListCountry').success(function(data){
			            temp =data;
			            $timeout(function(){
					      defer.resolve(data);
					    }, 350) 

			    });
			    return defer.promise;
			//$http.get(pathWebsite + 'admin/employer/getListCountry').success(callback);
		};
		_employerRecruitmentService.getListSalary = function(callback){
			var temp = {};
			    var defer = $q.defer();
			    $http.get(pathWebsite + 'admin/recruitment/getListSalary').success(function(data){
			            temp =data;
			            $timeout(function(){
					      defer.resolve(data);
					    }, 350) 

			    });
			    return defer.promise;
			//$http.get(pathWebsite + 'admin/employer/getListCountry').success(callback);
		};
		return _employerRecruitmentService;
});