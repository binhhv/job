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








