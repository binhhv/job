//GET DATA RETURN IN SERVICE
			// if(!_jobseeker){
			// 	_jobseeker = $http.get(pathWebsite + 'admin/jobseeker/getListJobseeker').then(function(response){
			// 			return response.data;
			// 	})
			// }
			// return _jobseeker;


//PARSE JSON OBJECT
			//csrf_test_name
			//var objectJobseeker = JSON.parse(jobseeker);
			//var csrf_name = objectJobseeker['csrf_name'];
			//var objectCsrf = JSON.parse(csrf);

//CONTROLLER CALL SV HTTP.GET
             //$http.get(pathWebsite + 'admin/jobseeker/getListJobseeker').success(function(data)
   			 //{

//SOME FUNCTION TO SETUP PAGINATION IN ANGULARJS WITH TABLE
		 	//$scope.list; //max no of items to display in a page
		    // $scope.init = function(){
		    //     $scope.start();
		    //     getData();   
		    //     $scope.complete();
		    // }
		    // $scope.reload = function (){
		    //     //$scope.list = null;
		    //     $scope.start();
		    //     getData();   
		    //     $scope.complete();
		    //     $scope.message="123123123";
		    // }
		    // $scope.setPage = function(pageNo) {
		    //     $scope.currentPage = pageNo;
		    // };
		    // $scope.filter = function() {
		    //     $timeout(function() { 
		    //         $scope.filteredItems = $scope.filtered.length;
		    //     }, 10);
		    // };
		    // $scope.sort_by = function(predicate) {
		    //     $scope.predicate = predicate;
		    //     $scope.reverse = !$scope.reverse;
		    // };
		    // self.getData = function(){
		    //     jobseekerService.getListJobseeker().then(function(data){
		    //     $scope.list = data;
		        
		    //     $scope.filteredItems = $scope.list.length; //Initially for no filter  
		    //     $scope.totalItems = $scope.list.length;
		    //     //console.log($scope.totalItems);
		       
		    //     });
		    // };

//GET TOKEN INCONTROLLER IN MODAL
			// alert(selectedjobseeker);
            //var data = jobseekerService.getToken();

//ACTION ON REMOVE ONE ROW TABLE AND UPDATE DATA ON TABLE


		     // $scope.$on('removeRow', function (event, args) {
		     //     $scope.message = args.message;
		     //     console.log($scope.message.account_id);
		     //     // alert($scope.list);
		     //     //     for (var i in $scope.list) {
		     //     //                    if ($scope.list[i] === args.message) {
		     //     //                        $scope.list.splice(i, 1);
		                               
		     //     //                            }
		     //     //                }
		     //     });

//UPDATE DATA SUCESS SERVICE
			//$scope.filteredItems  = $scope.filteredItems  -1;
            //console.log($scope.list.length );
            //$scope.reload;
            // $scope.$watch('search', function(oldTerm, newTerm) {
            //   $scope.page = 1;
            //   // Use orderByPriorityFilter to convert Firebase Object into Array
            //   $scope.filtered = filterFilter(orderByPriorityFilter($scope.contacts), $scope.search);
            //   $scope.lastSearch.search = oldTerm;
            //   $scope.contactsCount = $scope.filtered.length;
            // });
                    // $scope.$watch("search", function(newvalue, oldvalue) {
                    //       console.log('watch search');
                    //       $timeout(function(){
                    //         $scope.filter();
                    //       });
                    //     }, true);

//POST SERVICE RETURN NOT CALLBACK
			// $scope.pagedItems[$scope.pagedItems.length] = jobseeker;
	        //var csrf_hash = csrf['hash'];
	            //console.log(csrf_hash);
	           // var postData = $.param({'csrf_test_name': csrf_hash,'jobseeker':angular.toJson(jobseeker)});

	            //$http.post(pathWebsite + 'admin/jobseeker/createJobseeker', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}})
	        //  $http.post('db.php?action=add_product', 
	        //     {
	        //         'prod_name'     : $scope.prod_name, 
	        //         'prod_desc'     : $scope.prod_desc, 
	        //         'prod_price'    : $scope.prod_price,
	        //         'prod_quantity' : $scope.prod_quantity
	        //     }
	        // )
	       // .success(function (data, status, headers, config) {
	          //alert("Product has been Submitted Successfully");
	         //$scope.pagedItems[$scope.pagedItems.length] = data;

	       // })

	       // .error(function(data, status, headers, config){
	           
	       // });

//UPDATE DATA WHEN SUCESS SERVICE
			//alert("adasdasd");
          //$scope.getJobseekers();
        // jobseekerService.createJobseeker(angular.toJson(jobseeker),csrf,function(data){
        //         if(data){
        //             //console.log(data);
        //             $scope.pagedItems[$scope.pagedItems.length] = data;
        //              alertCreateSuccess();
        //              //$scope.filteredItems++;
        //             // $scope.currentPage = 2;

        //               // console.log($scope.list);
        //             //$scope.message.push("adasdasd");
        //               $scope.getJobseekers();
        //         }

        //     });
         
        //$scope.selectPage(2);


///GET DATA  FROM SERVICE CALL BACK
	// alert(selectedjobseeker);
            //var data = jobseekerService.getToken();
            
            // jobseekerService.getDetailDocument(id,function(data){
            //                         console.log(data);
            //                         $scope.documentJobseeker = data;
            //                     });




//default value is vietnam with 1
           
           // $http.get(pathWebsite + 'admin/employer/getListProvinceCountry/'+selectedrecruitment['rec_job_map_country']).success(function(data){
                       // alert(data);
                      // console.log(data);
                        //selectedrecruitment.listProvinces =data;
                        //defer.resolve(data);

               // });
            // selectedrecruitment.multipleDemo.listProvinces = employerRecruitmentService.getListProvinceCountryNoRT(selectedrecruitment['rec_job_map_country']);//,function(data){
                  //selectedrecruitment.listProvinces = data;
                 //  var arrTmp = [];
                 // angular.forEach(data, function(value, key) {
                 //       //console.log("key :" + key + "value :" + value['province_name']);
                 //       selectedrecruitment.multipleDemo.listProvinces.push({province_id:value['province_id'],province_name:value['province_name']});
                 //    });
                 //  //selectedrecruitment.listProvinces = arrTmp;
                 //  arrTmp = null;
                 //console.log("=="+selectedrecruitment.multipleDemo.listProvinces);
                // $scope.multipleDemo.listProvinces = data;
            //});
            //console.log(  $scope.recruitmentCreate.listProvinces );

            //recruitmentCreate.welfareSelected = [];
            //$scope.getListWelfareEmployerRecruitment(selectedrecruitment['rec_id'],function(data){
                //selectedrecruitment.welfareSelected = data;
           // });
            // recruitmentCreate.provinceSelected = [];
            //employerRecruitmentService.getListProvinceRecruitment(selectedrecruitment['rec_id']).success(function(data){
               //selectedrecruitment.provinceSelected =data;
               //if(data.length >= 5){
                       //$("#select-Province").addClass('hide');
                    //}
           //});
           //$http.get(pathWebsite + 'admin/employer/getListProvinceRecruitment/'+selectedrecruitment['rec_id']).success(function(data){
                       // alert(data);
                       //console.log(data);
                        //selectedrecruitment.provinceSelected =data;
                        //defer.resolve(data);

            //});
           //selectedrecruitment.multipleDemo.provinceSelected = employerRecruitmentService.getListProvinceRecruitmentNoRT(selectedrecruitment['rec_id']);//,function(data){
                // selectedrecruitment.provinceSelected = data;
                // var arrTmp = [];
                // angular.forEach(data, function(value, key) {
                //        //console.log("key :" + key + "value :" + value['province_name']);
                //         selectedrecruitment.multipleDemo.provinceSelected.push(selectedrecruitment.multipleDemo.listProvinces[getIndexIfObjWithOwnAttr(selectedrecruitment.multipleDemo.listProvinces,'province_id',value['province_id'])]);;//({province_id:value['province_id'],province_name:value['province_name']});//(selectedrecruitment.listProvinces[getIndexIfObjWithOwnAttr(selectedrecruitment.listProvinces,'province_id',value['province_id'])]);//
                //     });
                //selectedrecruitment.multipleDemo.provinceSelected = arrTmp;
                 //console.log(selectedrecruitment.provinceSelected);
                //selectedrecruitment.provinceSelectd = data;
               // console.log(selectedrecruitment.provinceSelectd);
                //$scope.multipleDemo.provinceSelected = data;
           // });

            
           
            //selectedrecruitment.multipleDemo = {};
             // selectedrecruitment.multipleDemo.people = [
             //    { name: 'Adam',      email: 'adam@email.com',      age: 12, country: 'United States' },
             //    { name: 'Amalie',    email: 'amalie@email.com',    age: 12, country: 'Argentina' },
             //    { name: 'Estefanía', email: 'estefania@email.com', age: 21, country: 'Argentina' },
             //    { name: 'Adrian',    email: 'adrian@email.com',    age: 21, country: 'Ecuador' },
             //    { name: 'Wladimir',  email: 'wladimir@email.com',  age: 30, country: 'Ecuador' },
             //    { name: 'Samantha',  email: 'samantha@email.com',  age: 30, country: 'United States' },
             //    { name: 'Nicole',    email: 'nicole@email.com',    age: 43, country: 'Colombia' },
             //    { name: 'Natasha',   email: 'natasha@email.com',   age: 54, country: 'Ecuador' },
             //    { name: 'Michael',   email: 'michael@email.com',   age: 15, country: 'Colombia' },
             //    { name: 'Nicolás',   email: 'nicolas@email.com',    age: 43, country: 'Colombia' }
             //  ];

              //$scope.availableColors = ['Red','Green','Blue','Yellow','Magenta','Maroon','Umbra','Turquoise'];

              //$scope.singleDemo = {};
              //$scope.singleDemo.color = '';
              
              //$scope.multipleDemo.colors = ['Blue','Red'];
             // $scope.multipleDemo.colors2 = ['Blue','Red'];
             // selectedrecruitment.multipleDemo.selectedPeople = [selectedrecruitment.multipleDemo.people[5]];



//  employerRecruitmentService.getTokenReturn().then(function(data){
           //      recruitmentCreate.csrf = data;
           //  });
           // employerRecruitmentService.getListWelfareR().then(function(data){
           //  recruitmentCreate.listWelfares = data;
           // });
           //  employerRecruitmentService.getListFormR().then(function(data){
           //  recruitmentCreate.listForms =data;
           // });
           //  employerRecruitmentService.getListFormChildR().then(function(data){
           //  recruitmentCreate.listFormChilds =data;
           // });
           // employerRecruitmentService.getListLevelR().then(function(data){
           //  recruitmentCreate.listLevels =  data;
           // });
           // employerRecruitmentService.getListContactFormR().then(function(data){
           //  recruitmentCreate.listContactForms =  data;
           // });
           //  employerRecruitmentService.getListCountryR().then(function(data){
           //    recruitmentCreate.listCountrys =  data;
           // });
          // var resultCallCsrf = false;
           // employerUserService.getToken(function(data){
                //var obToken = JSON.parse(angular.toJson(data));
               //$log.info(obToken['name']);                // $scope.recruitmentCreate.csrf_name = obToken['name'];
                 //$scope.recruitmentCreate.csrf_hash = obToken['hash'];
                
                 //resultCallCsrf = true;
            //});
             //$log.info(resultCallCsrf);
            // employerRecruitmentService.getListWelfare(function(data){
            //      $scope.recruitmentCreate.listWelfares = data;
            // });
            // employerRecruitmentService.getListForm(function(data){
            //      $scope.recruitmentCreate.listForms = data;
            //      $log.info("call forms");
            // });
            // employerRecruitmentService.getListFormChild(function(data){
            //      $scope.recruitmentCreate.listFormChilds = data;
            //      $log.info("call form child");
            // });
            // employerRecruitmentService.getListLevel(function(data){
            //      $scope.recruitmentCreate.listLevels = data;
            //      $log.info("call level");
            // });
            // employerRecruitmentService.getListContactForm(function(data){
            //      $scope.recruitmentCreate.listContactForms = data;
            //      $log.info("call contact form");
            // });
            // $scope.firstCountry = {};
            // // selectedrecruitment.listProvinces = [];
            // employerRecruitmentService.getListCountry(function(data){
            //      $scope.recruitmentCreate.listCountrys = data;
            //     $log.info("call country");
            //     $scope.firstCountry = data[0];
            //      employerRecruitmentService.getListProvinceCountry($scope.firstCountry['country_id']).success(function(data){
            //      $scope.recruitmentCreate.listProvinces = data;
            //      $log.info("call province");
            // });

            // });
            //selectedrecruitment.listProvinces = [];











