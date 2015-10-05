app.factory('provinceService' ,function ($http,$q,$timeout){
	var _provinceService ={};
	_provinceService.getListCountry = function(callback){
			// var temp = {};
			//     var defer = $q.defer();
			//     $http.get(pathWebsite + 'admin/employer/getListCountry').success(function(data){
			//             return  =data;
			//             $timeout(function(){
			// 		      defer.resolve(data);
			// 		    }, 350) 

			//     });
			//     return defer.promise;
			// return $http.get(pathWebsite + 'admin/employer/getListCountry')
   //         .then(
   //            function (response) {
   //              return response.data;
               
   //            });
			 return $http.get(pathWebsite + 'admin/employer/getListCountry').success(callback);
			  // $http.get(pathWebsite + 'admin/employer/getListCountry').success(function (data){
			 	//    scope.listCountry = data;
			  //  });
 	};
 	_provinceService.getListProvinceCountry = function(country,callback){
 		return $http.get(pathWebsite + 'admin/category/getListProvinceCountry/'+country).success(callback);
 	}
 	_provinceService.getListRegionCountry = function(country){
 		var temp = {};
			    var defer = $q.defer();
			    $http.get(pathWebsite + 'admin/category/getListRegionCountry/'+country).success(function(data){
			             temp =data;
			            $timeout(function(){
					      defer.resolve(data);
					    }, 350) 

			    });
		return defer.promise;
 	}
 	_provinceService.getToken = function(){
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
	_provinceService.updateProvince = function(province,callback){
		var objectprovince = JSON.parse(province);
			var csrf_name = objectprovince['csrf']['name'];
			var csrf_hash = objectprovince['csrf']['hash'];
			var postData = $.param({'csrf_test_name': csrf_hash,'province':province});
			$http.post(pathWebsite + 'admin/category/updateProvince', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
	
	};
	_provinceService.createProvince = function(province,callback){
		var objectprovince = JSON.parse(province);
			var csrf_name = objectprovince['csrf']['name'];
			var csrf_hash = objectprovince['csrf']['hash'];
			var postData = $.param({'csrf_test_name': csrf_hash,'province':province});
			$http.post(pathWebsite + 'admin/category/createProvince', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
	
	}
	_provinceService.deleteProvince = function(province,callback){
			var objectprovince = JSON.parse(province);
			var csrf_name = objectprovince['csrf']['name'];
			var csrf_hash = objectprovince['csrf']['hash'];
			var postData = $.param({'csrf_test_name': csrf_hash,'province':province});
			$http.post(pathWebsite + 'admin/category/deleteProvince', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
	
	}
	return _provinceService;
});

app.factory('healthService' ,function ($http,$q,$timeout){
	var _healthService ={};

	_healthService.getListHealth = function(callback){
 		return $http.get(pathWebsite + 'admin/category/getListHealth').success(callback);
 	}
	_healthService.updateHealth = function(health,callback){
		var objecthealth = JSON.parse(health);
			var csrf_name = objecthealth['csrf']['name'];
			var csrf_hash = objecthealth['csrf']['hash'];
			var postData = $.param({'csrf_test_name': csrf_hash,'health':health});
			$http.post(pathWebsite + 'admin/category/updateHealth', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
	
	};
	_healthService.createHealth = function(health,callback){
		var objecthealth = JSON.parse(health);
			var csrf_name = objecthealth['csrf']['name'];
			var csrf_hash = objecthealth['csrf']['hash'];
			var postData = $.param({'csrf_test_name': csrf_hash,'health':health});
			$http.post(pathWebsite + 'admin/category/createHealth', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
	
	}
	_healthService.deleteHealth = function(health,callback){
			var objecthealth = JSON.parse(health);
			var csrf_name = objecthealth['csrf']['name'];
			var csrf_hash = objecthealth['csrf']['hash'];
			var postData = $.param({'csrf_test_name': csrf_hash,'health':health});
			$http.post(pathWebsite + 'admin/category/deleteHealth', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
	
	}
	return _healthService;
});

//form service
app.factory('formService' ,function ($http,$q,$timeout){
	var _formService ={};

	_formService.getListForm = function(callback){
 		return $http.get(pathWebsite + 'admin/category/getListForm').success(callback);
 	}
	_formService.updateForm = function(jobForm,callback){
		var objectjobForm = JSON.parse(jobForm);
			var csrf_name = objectjobForm['csrf']['name'];
			var csrf_hash = objectjobForm['csrf']['hash'];
			var postData = $.param({'csrf_test_name': csrf_hash,'jobForm':jobForm});
			$http.post(pathWebsite + 'admin/category/updateForm', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
	
	};
	_formService.createForm = function(jobForm,callback){
		var objectjobForm = JSON.parse(jobForm);
			var csrf_name = objectjobForm['csrf']['name'];
			var csrf_hash = objectjobForm['csrf']['hash'];
			var postData = $.param({'csrf_test_name': csrf_hash,'jobForm':jobForm});
			$http.post(pathWebsite + 'admin/category/createForm', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
	
	}
	_formService.deleteForm = function(jobForm,callback){
			var objectjobForm = JSON.parse(jobForm);
			var csrf_name = objectjobForm['csrf']['name'];
			var csrf_hash = objectjobForm['csrf']['hash'];
			var postData = $.param({'csrf_test_name': csrf_hash,'jobForm':jobForm});
			$http.post(pathWebsite + 'admin/category/deleteForm', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
	
	}
	return _formService;
});

//level job service
app.factory('levelService' ,function ($http,$q,$timeout){
	var _levelService ={};

	_levelService.getListLevel = function(callback){
 		return $http.get(pathWebsite + 'admin/category/getListLevel').success(callback);
 	}
	_levelService.updateLevel = function(jobLevel,callback){
		var objectjobLevel = JSON.parse(jobLevel);
			var csrf_name = objectjobLevel['csrf']['name'];
			var csrf_hash = objectjobLevel['csrf']['hash'];
			var postData = $.param({'csrf_test_name': csrf_hash,'jobLevel':jobLevel});
			$http.post(pathWebsite + 'admin/category/updateLevel', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
	
	};
	_levelService.createLevel = function(jobLevel,callback){
		var objectjobLevel = JSON.parse(jobLevel);
			var csrf_name = objectjobLevel['csrf']['name'];
			var csrf_hash = objectjobLevel['csrf']['hash'];
			var postData = $.param({'csrf_test_name': csrf_hash,'jobLevel':jobLevel});
			$http.post(pathWebsite + 'admin/category/createLevel', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
	
	}
	_levelService.deleteLevel = function(jobLevel,callback){
			var objectjobLevel = JSON.parse(jobLevel);
			var csrf_name = objectjobLevel['csrf']['name'];
			var csrf_hash = objectjobLevel['csrf']['hash'];
			var postData = $.param({'csrf_test_name': csrf_hash,'jobLevel':jobLevel});
			$http.post(pathWebsite + 'admin/category/deleteLevel', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
	
	}
	return _levelService;
});

//faq
app.factory('faqService' ,function ($http,$q,$timeout){
	var _faqService ={};

	_faqService.getListFAQ = function(callback){
 		return $http.get(pathWebsite + 'admin/category/getListFAQ').success(callback);
 	}
	_faqService.updateFAQ = function(faq,callback){
		var objectfaq = JSON.parse(faq);
			var csrf_name = objectfaq['csrf']['name'];
			var csrf_hash = objectfaq['csrf']['hash'];
			var postData = $.param({'csrf_test_name': csrf_hash,'faq':faq});
			$http.post(pathWebsite + 'admin/category/updateFAQ', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
	
	};
	_faqService.createFAQ = function(faq,callback){
		var objectfaq = JSON.parse(faq);
			var csrf_name = objectfaq['csrf']['name'];
			var csrf_hash = objectfaq['csrf']['hash'];
			var postData = $.param({'csrf_test_name': csrf_hash,'faq':faq});
			$http.post(pathWebsite + 'admin/category/createFAQ', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
	
	}
	_faqService.deleteFAQ = function(faq,callback){
			var objectfaq = JSON.parse(faq);
			var csrf_name = objectfaq['csrf']['name'];
			var csrf_hash = objectfaq['csrf']['hash'];
			var postData = $.param({'csrf_test_name': csrf_hash,'faq':faq});
			$http.post(pathWebsite + 'admin/category/deleteFAQ', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
	
	}
	return _faqService;
});


//career
app.factory('careerService' ,function ($http,$q,$timeout){
	var _careerService ={};

	_careerService.getListCareer = function(callback){
 		return $http.get(pathWebsite + 'admin/category/getListCareer').success(callback);
 	}
	_careerService.updateCareer = function(career,callback){
		var objectcareer = JSON.parse(career);
			var csrf_name = objectcareer['csrf']['name'];
			var csrf_hash = objectcareer['csrf']['hash'];
			var postData = $.param({'csrf_test_name': csrf_hash,'career':career});
			$http.post(pathWebsite + 'admin/category/updateCareer', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
	
	};
	_careerService.createCareer = function(career,callback){
		var objectcareer = JSON.parse(career);
			var csrf_name = objectcareer['csrf']['name'];
			var csrf_hash = objectcareer['csrf']['hash'];
			var postData = $.param({'csrf_test_name': csrf_hash,'career':career});
			$http.post(pathWebsite + 'admin/category/createCareer', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
	
	}
	_careerService.deleteCareer = function(career,callback){
			var objectcareer = JSON.parse(career);
			var csrf_name = objectcareer['csrf']['name'];
			var csrf_hash = objectcareer['csrf']['hash'];
			var postData = $.param({'csrf_test_name': csrf_hash,'career':career});
			$http.post(pathWebsite + 'admin/category/deleteCareer', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
	
	}
	return _careerService;
});

//salary
app.factory('salaryService' ,function ($http,$q,$timeout){
	var _salaryService ={};

	_salaryService.getListSalary = function(callback){
 		return $http.get(pathWebsite + 'admin/category/getListSalary').success(callback);
 	}
	_salaryService.updateSalary = function(salary,callback){
		var objectsalary = JSON.parse(salary);
			var csrf_name = objectsalary['csrf']['name'];
			var csrf_hash = objectsalary['csrf']['hash'];
			var postData = $.param({'csrf_test_name': csrf_hash,'salary':salary});
			$http.post(pathWebsite + 'admin/category/updateSalary', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
	
	};
	_salaryService.createSalary = function(salary,callback){
		var objectsalary = JSON.parse(salary);
			var csrf_name = objectsalary['csrf']['name'];
			var csrf_hash = objectsalary['csrf']['hash'];
			var postData = $.param({'csrf_test_name': csrf_hash,'salary':salary});
			$http.post(pathWebsite + 'admin/category/createSalary', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
	
	}
	_salaryService.deleteSalary = function(salary,callback){
			var objectsalary = JSON.parse(salary);
			var csrf_name = objectsalary['csrf']['name'];
			var csrf_hash = objectsalary['csrf']['hash'];
			var postData = $.param({'csrf_test_name': csrf_hash,'salary':salary});
			$http.post(pathWebsite + 'admin/category/deleteSalary', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
	
	}
	return _salaryService;
});


//contact form
app.factory('contactFormService' ,function ($http,$q,$timeout){
	var _contactFormService ={};

	_contactFormService.getListContactForm = function(callback){
 		return $http.get(pathWebsite + 'admin/category/getListContactForm').success(callback);
 	}
	_contactFormService.updateContactForm = function(contactform,callback){
		var objectcontactform = JSON.parse(contactform);
			var csrf_name = objectcontactform['csrf']['name'];
			var csrf_hash = objectcontactform['csrf']['hash'];
			var postData = $.param({'csrf_test_name': csrf_hash,'contactform':contactform});
			$http.post(pathWebsite + 'admin/category/updateContactForm', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
	
	};
	_contactFormService.createContactForm = function(contactform,callback){
		var objectcontactform = JSON.parse(contactform);
			var csrf_name = objectcontactform['csrf']['name'];
			var csrf_hash = objectcontactform['csrf']['hash'];
			var postData = $.param({'csrf_test_name': csrf_hash,'contactform':contactform});
			$http.post(pathWebsite + 'admin/category/createContactForm', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
	
	}
	_contactFormService.deleteContactForm = function(contactform,callback){
			var objectcontactform = JSON.parse(contactform);
			var csrf_name = objectcontactform['csrf']['name'];
			var csrf_hash = objectcontactform['csrf']['hash'];
			var postData = $.param({'csrf_test_name': csrf_hash,'contactform':contactform});
			$http.post(pathWebsite + 'admin/category/deleteContactForm', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
	
	}
	return _contactFormService;
});

app.factory('welfareService' ,function ($http,$q,$timeout){
	var _welfareService ={};

	_welfareService.getListWelfare = function(callback){
 		return $http.get(pathWebsite + 'admin/category/getListWelfare').success(callback);
 	}
	_welfareService.updateWelfare = function(welfare,callback){
		var objectwelfare = JSON.parse(welfare);
			var csrf_name = objectwelfare['csrf']['name'];
			var csrf_hash = objectwelfare['csrf']['hash'];
			var postData = $.param({'csrf_test_name': csrf_hash,'welfare':welfare});
			$http.post(pathWebsite + 'admin/category/updateWelfare', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
	
	};
	_welfareService.createWelfare = function(welfare,callback){
		var objectwelfare = JSON.parse(welfare);
			var csrf_name = objectwelfare['csrf']['name'];
			var csrf_hash = objectwelfare['csrf']['hash'];
			var postData = $.param({'csrf_test_name': csrf_hash,'welfare':welfare});
			$http.post(pathWebsite + 'admin/category/createWelfare', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
	
	}
	_welfareService.deleteWelfare = function(welfare,callback){
			var objectwelfare = JSON.parse(welfare);
			var csrf_name = objectwelfare['csrf']['name'];
			var csrf_hash = objectwelfare['csrf']['hash'];
			var postData = $.param({'csrf_test_name': csrf_hash,'welfare':welfare});
			$http.post(pathWebsite + 'admin/category/deleteWelfare', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
	
	}
	_welfareService.getListIcon = function(){
 		var temp = {};
			    var defer = $q.defer();
			    $http.get(pathWebsite + 'admin/category/getListIcon').success(function(data){
			             temp =data;
			            $timeout(function(){
					      defer.resolve(data);
					    }, 350) 

			    });
		return defer.promise;
 	}
	return _welfareService;
});