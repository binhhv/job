app.filter('startFrom', function() {
    return function(input, start) {
        if(input) {
            start = +start; //parse to int
            return input.slice(start);
        }
        return [];
    }
});

app.controller('employerController', function (employerService,$scope, $http, $timeout,cfpLoadingBar,$modal,$log,$window) {
    $scope.filteredItems =  [];
    $scope.groupedItems  =  [];
    $scope.itemsPerPage  =  4;
    $scope.pagedItems    =  [];
    $scope.currentPage   =  0;

    $scope.getEmployers = function(){
        $scope.start();
        employerService.getListEmployer(function(data){
        $scope.pagedItems = data;    
        $scope.search='';
        $scope.currentPage = 1; //current page
        $scope.entryLimit = 20; //max no of items to display in a page
        $scope.filteredItems = $scope.pagedItems.length; //Initially for no filter  
        $scope.totalItems = $scope.pagedItems.length;

        $scope.complete();
        });
    };
    $scope.setPage = function(pageNo) {
        $scope.currentPage = pageNo;
    };
    $scope.filter = function() {
        $timeout(function() { 
            $scope.filteredItems = $scope.filtered.length;
        }, 10);
    };
    $scope.sort_by = function(predicate) {
        $scope.predicate = predicate;
        $scope.reverse = !$scope.reverse;
    };
    $scope.start = function() {
      cfpLoadingBar.start();
    };

    $scope.complete = function () {
      cfpLoadingBar.complete();
      $("#employerTable").removeClass('hide');
    }

    $scope.modalUpdate = function (size,selectedemployer) {
            employerService.getToken(function(data){
                var obToken = JSON.parse(angular.toJson(data));
               //$log.info(obToken['name']);
                selectedemployer.csrf_name = obToken['name'];
                selectedemployer.csrf_hash = obToken['hash'];
            });
            //alert(data);
            var modalInstance = $modal.open({
                animation: $scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-update-employer.php',
                controller: function ($scope, $modalInstance, employer){
                    $scope.employer = employer;
                    $scope.employer.account_password = '';
                    $scope.ok = function () {
                        $modalInstance.close($scope.employer);
                    };

                    $scope.cancel = function () {
                        $modalInstance.dismiss('cancel');
                    };

                },
                size: size,
                resolve: {
                    employer: function () {
                        return selectedemployer;
                    }
                }
            });

            modalInstance.result.then(function (selectedItem) {
                $scope.selected = selectedItem;
            }, function () {
                $log.info('Modal dismissed at: ' + new Date());
            });
        };

        $scope.modalDelete = function (size,selectedemployer) {

            employerService.getToken(function(data){
                var obToken = JSON.parse(angular.toJson(data));
               //$log.info(obToken['name']);
                selectedemployer.csrf_name = obToken['name'];
                selectedemployer.csrf_hash = obToken['hash'];
            });
            //alert(data);
            var modalInstance = $modal.open({
                animation: $scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-delete-employer.php',
                controller: function ($scope, $modalInstance, employer){
                    $scope.employer = employer;
                    $scope.employer.account_password = '';
                    $scope.ok = function () {
                        $modalInstance.close($scope.employer);
                        for (var i in $scope.pagedItems) {
                            if ($scope.pagedItems[i] === employer) {
                                $scope.pagedItems.splice(i, 1);
                                    }
                        };
                        $scope.getemployers();
                    };

                    $scope.cancel = function () {
                        $modalInstance.dismiss('cancel');
                    };

                },
                size: size,
                resolve: {
                    employer: function () {
                        return selectedemployer;
                    }
                },
                scope: $scope,
                backdrop: 'static'
            });

            modalInstance.result.then(function (selectedItem) {
                $scope.selected = selectedItem;
            }, function () {
                $log.info('Modal dismissed at: ' + new Date());
            });
        };

    $scope.deleteemployer = function(employer){
         $scope.disabled_modal = true;
        if(employer){
            //$scope.$broadcast('removeRow', { message: employer });
            employerService.deleteEmployer(angular.toJson(employer),function(data){
                if(data){
                    alertDeleteSuccess();
                     $scope.disabled_modal = false;
                    
                }
                else{
                    alertErrors();
                     $scope.cancel();
                }

            });
        }
    };

    $scope.$on('myCustomEvent', function (event, data) {
  //console.log(data); // 'Data to send'
  $scope.message =data;
});

    $scope.setDisabled = function(value){
        $scope.employer.account_is_disabled = value;
    };
    $scope.updateEmployer = function(employer){
         employerService.updateEmployer(angular.toJson(employer),function(data){
                if(data){
                    alertEditSuccess();
                }
                else{
                    alertErrors();
                     $scope.cancel();
                }

         });
    };
    self.alertEditSuccess = function(){
        $(".alert-message").removeClass('hide');
                    $(".alert-message").alert();
                    window.setTimeout(function() { $(".alert-message").addClass('hide').fadeOut(); }, 1500);
    }
    self.alertDeleteSuccess = function(){
        $(".alert-message-delete").removeClass('hide');
                    $(".alert-message-delete").alert();
                    window.setTimeout(function() { $(".alert-message-delete").addClass('hide').fadeOut(); }, 1500);
    }
     self.alertCreateSuccess = function(){
        $(".alert-message-create").removeClass('hide');
                    $(".alert-message-create").alert();
                    window.setTimeout(function() { $(".alert-message-create").addClass('hide').fadeOut(); }, 1500);
    }
    self.alertErrors = function(){
        $(".alert-message-errors").removeClass('hide');
                    $(".alert-message-errors").alert();
                    window.setTimeout(function() { $(".alert-message-errors").addClass('hide').fadeOut(); }, 1500);
    }
    $scope.openDetailEmployer = function(employer,url){
        $window.location.href = url + "/" +employer.employer_id;
    }

    $scope.modalCreateEmployer = function (size) {

            
            var modalInstance = $modal.open({
                animation: $scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-create-employer.php',
                controller: function ($scope, $modalInstance,csrf){
                    $scope.csrf = csrf;
                    $scope.ok = function () {
                        //$scope.message="changed";
                         
                        $modalInstance.close();
                       $scope.getemployers();
                       // $scope.setPage(6);
                        //$scope.message ="đâsdasdasdasd";
                    };

                    $scope.cancel = function () {
                        $modalInstance.dismiss('cancel');
                    };

                },
                size: size,
                scope:$scope,
                resolve: {
                    csrf: function () {
                      return employerService.getTokenReturn();
                    }
                },

            });

            modalInstance.result.then(function (selectedItem) {
                $scope.selected = selectedItem;
            }, function () {
                $log.info('Modal dismissed at: ' + new Date());
            });
        };


    $scope.createEmployer = function(employer,csrf){
        console.log(csrf);
        
        employerService.createEmployer(angular.toJson(employer),csrf,function(data){
            if(data){
                alertCreateSuccess();
                $scope.pagedItems[$scope.pagedItems.length] = data;

            }
            else{
                alertErrors();
                 $scope.cancel();
            }
        });

         
    };
    $scope.reload = function(){
    $scope.getemployers();
    }
    $scope.checkEmailEmployer = function(emailEmployer){
       //console.log(employerService.checkEmailExits(emailemployer));
       $timeout(function() {
            console.log(employerService.checkEmailExits(emailEmployer));
       }, 100);
    }


});

app.controller('employerUserController', function (employerUserService,jobseekerService,$scope, $http, $timeout,cfpLoadingBar,$modal,$log,$window,$filter) {
    $scope.completeProcess = false;
$scope.formatDate = function(date){
          var dateOut = new Date(date);
          return dateOut;
    };

    $scope.filteredItems =  [];
    $scope.groupedItems  =  [];
    $scope.itemsPerPage  =  4;
    $scope.pagedItems    =  [];
    $scope.currentPage   =  0;
    $scope.exitsAdmin = false;
    $scope.getEmployerUsers = function(idemployer){
        $scope.start();
        employerUserService.checkAdminEmployerExits(idemployer,function(data){
           
            if(data != 0 ){

                $scope.exitsAdmin = true;
                 console.log(data);

            }
            else{
                $scope.exitsAdmin = false;
                 console.log("0");
            }
        });
        employerUserService.getListEmployerUser(idemployer,function(data){
            console.log(data);
        $scope.pagedItems = data;    
        $scope.search='';
        $scope.currentPage = 1; //current page
        $scope.entryLimit = 20; //max no of items to display in a page
        $scope.filteredItems = $scope.pagedItems.length; //Initially for no filter  
        $scope.totalItems = $scope.pagedItems.length;
         if($scope.filteredItems == 0){
           $("#div-no-data-loading").removeClass('hide');
        }
        $scope.complete();
        });
    };
    $scope.setPage = function(pageNo) {
        $scope.currentPage = pageNo;
    };
    $scope.filter = function() {
        $timeout(function() { 
            $scope.filteredItems = $scope.filtered.length;
            if($scope.filteredItems == 0){
               $("#div-no-data-loading").removeClass('hide');
            }
        }, 10);
    };
    $scope.sort_by = function(predicate) {
        $scope.predicate = predicate;
        $scope.reverse = !$scope.reverse;
    };
    $scope.start = function() {
      cfpLoadingBar.start();
    };

    $scope.complete = function () {
      cfpLoadingBar.complete();
      $("#employerUserTable").removeClass('hide');
     // $("#managerTable").removeClass('hide');
      $("#div-data-loading").addClass('hide');
    }
    $scope.setRoleAdminEmployer = function(idemployer,employeruser){
       
       employerUserService.getToken(function(data){
            //console.log(employeruser['account_id']);
            if(data){
                employerUserService.setRoleAdminEmployer(idemployer,employeruser['account_id'],data['hash'],function(data){
                    if(data){
                        alertSetRoleEmployerSuccess();
                        $scope.exitsAdmin = true;
                        $scope.getEmployerUsers(idemployer);
                    }
                    else{
                        alertErrors();
                    }
                });
            }
       });
    
        
    };
    $scope.alertEditSuccess = function(){
        $(".alert-message").removeClass('hide');
                    $(".alert-message").alert();
                    window.setTimeout(function() { $(".alert-message").addClass('hide').fadeOut(); }, 1500);
    }
    self.alertDeleteSuccess = function(){
        $(".alert-message-delete").removeClass('hide');
                    $(".alert-message-delete").alert();
                    window.setTimeout(function() { $(".alert-message-delete").addClass('hide').fadeOut(); }, 1500);
    }
     self.alertCreateSuccess = function(){
        $(".alert-message-create").removeClass('hide');
                    $(".alert-message-create").alert();
                    window.setTimeout(function() { $(".alert-message-create").addClass('hide').fadeOut(); }, 1500);
    }
    self.alertSetRoleEmployerSuccess = function(){
        $(".alert-message-setRoleEmployer").removeClass('hide');
                    $(".alert-message-setRoleEmployer").alert();
                    window.setTimeout(function() { $(".alert-message-setRoleEmployer").addClass('hide').fadeOut(); }, 1500);
    };
    self.alertErrors = function(){
        $(".alert-message-errors").removeClass('hide');
                    $(".alert-message-errors").alert();
                    window.setTimeout(function() { $(".alert-message-errors").addClass('hide').fadeOut(); }, 1500);
    };
    $scope.reloadEmployerUser = function(employerid){
        $scope.getEmployerUsers(employerid);
    };
    $scope.modalUpdateEmployerUser = function (size,selecteduseremployer) {
            jobseekerService.getToken(function(data){
                var obToken = JSON.parse(angular.toJson(data));
               //$log.info(obToken['name']);
                selecteduseremployer.csrf_name = obToken['name'];
                selecteduseremployer.csrf_hash = obToken['hash'];
            });
            //alert(data);
           // console.log(selecteduseremployer);
            var modalInstance = $modal.open({
                animation: $scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-update-employer-user.php',
                controller: function ($scope, $modalInstance, jobseeker){
                    $scope.jobseeker = jobseeker;
                    $scope.jobseeker.account_password = '';
                    $scope.ok = function () {
                        $modalInstance.close($scope.jobseeker);
                       //var employerid = $scope.jobseeker['emac_map_employer'];
                       //$scope.getEmployerUsers(employerid);
                    };

                    $scope.cancel = function () {
                        $modalInstance.dismiss('cancel');
                    };

                },
                size: size,
                resolve: {
                    jobseeker: function () {
                        return selecteduseremployer;
                    }
                }
            });

            modalInstance.result.then(function (selectedItem) {
                $scope.selected = selectedItem;
            }, function () {
                $log.info('Modal dismissed at: ' + new Date());
            });
        };

        $scope.modalDeleteEmployerUser = function (size,selectedjobseeker) {

            jobseekerService.getToken(function(data){
                var obToken = JSON.parse(angular.toJson(data));
               //$log.info(obToken['name']);
                selectedjobseeker.csrf_name = obToken['name'];
                selectedjobseeker.csrf_hash = obToken['hash'];
            });
            //alert(data);
            var modalInstance = $modal.open({
                animation: $scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-delete-employer-user.php',
                controller: function ($scope, $modalInstance, jobseeker){
                    $scope.jobseeker = jobseeker;
                    $scope.jobseeker.account_password = '';
                    $scope.ok = function () {
                        $modalInstance.close($scope.jobseeker);
                        // for (var i in $scope.pagedItems) {
                        //     if ($scope.pagedItems[i] === jobseeker) {
                        //         $scope.pagedItems.splice(i, 1);
                        //             }
                        // };
                        //$scope.pagedItems = null;
                        //$scope.getEmployerUsers(jobseeker['emac_map_employer']);
                         $scope.getEmployerUsers(jobseeker['emac_map_employer']);
                        console.log("close modal");
                        
                    };

                    $scope.cancel = function () {
                        $modalInstance.dismiss('cancel');
                    };

                },
                size: size,
                resolve: {
                    jobseeker: function () {
                        return selectedjobseeker;
                    }
                },
                scope: $scope,
                 backdrop: 'static'
            });

            modalInstance.result.then(function (selectedItem) {
                $scope.selected = selectedItem;
            }, function () {
                $log.info('Modal dismissed at: ' + new Date());
            });
        };

    $scope.deleteJobseeker = function(jobseeker){
         $scope.disabled_modal = true;
        if(jobseeker){
            console.log("start delete");
            //$scope.$broadcast('removeRow', { message: jobseeker });
            employerUserService.deleteEmployerUser(angular.toJson(jobseeker),function(data){
                console.log(data);
                if(data){
                    console.log("finish delete");
                    alertDeleteSuccess();
                   
                    $scope.disabled_modal = false;
                    $scope.ok();
                }
                else{
                    alertErrors();
                     $scope.cancel();
                }

            });
        }
    };

    $scope.$on('myCustomEvent', function (event, data) {
  //console.log(data); // 'Data to send'
  $scope.message =data;
});

    $scope.setDisabled = function(value){
        $scope.jobseeker.account_is_disabled = value;
    };
    $scope.updateJobseeker = function(jobseeker){
         jobseekerService.updateJobseeker(angular.toJson(jobseeker),function(data){
                if(data){
                    $scope.alertEditSuccess();
                    $scope.getEmployerUsers(jobseeker['emac_map_employer']);
                    $scope.ok();
                }
                else{
                    alertErrors();
                     $scope.cancel();
                }

         });
    };


    $scope.modalCreateEmployerUser = function (size,employerid,employername) {

            
            var modalInstance = $modal.open({
                animation: $scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-create-employer-user.php',
                controller: function ($scope, $modalInstance,csrf,employerid,employername,exitsAdminCreate){
                    $scope.csrf = csrf;
                    $scope.employerid = employerid;
                    $scope.employername = employername;
                    $scope.exitsAdminCreate = exitsAdminCreate;
                    $scope.employerUserRole = 3;
                    console.log("exitsadmin"  + $scope.exitsAdminCreate['data']+"---");
                    $scope.ok = function () {
                        //$scope.message="changed";
                         
                        $modalInstance.close();
                        $scope.getEmployerUsers($scope.employerid);
                        //$scope.getJobseekers();
                       // $scope.setPage(6);
                        //$scope.message ="đâsdasdasdasd";
                    };

                    $scope.cancel = function () {
                        $modalInstance.dismiss('cancel');
                    };

                },
                size: size,
                scope:$scope,
                resolve: {
                    csrf: function () {
                      return jobseekerService.getTokenReturn();
                    },
                    employerid:function(){
                        return employerid;
                    },
                    employername:function(){
                        return employername;
                    },
                    exitsAdminCreate:function(){
                        return employerUserService.checkAdminEmployerExits(employerid,function(data){
                            return data;
                        })
                    }
                },

            });

            modalInstance.result.then(function (selectedItem) {
                $scope.selected = selectedItem;
            }, function () {
                $log.info('Modal dismissed at: ' + new Date());
            });
        };


    $scope.createEmployerUser = function(jobseeker,csrf,employerid,employerUserRole){
        console.log(csrf);
        
        employerUserService.createEmployerUser(angular.toJson(jobseeker),csrf,employerid,employerUserRole,function(data){
            if(data){
                alertCreateSuccess();
                //$scope.pagedItems[$scope.pagedItems.length] = data;

                $scope.ok ();
            }
            else{
                alertErrors();
                 $scope.cancel();
            }
        });

         
    };
    $scope.setRoleEmployerUser = function(type){
        $scope.employerUserRole = type;
    }

});

app.controller('employerRecruitmentController', function (employerRecruitmentService,employerUserService,$scope, $http, $timeout,cfpLoadingBar,$modal,$log,$window,$filter) {
  
    $scope.completeProcess = false;
$scope.formatDate = function(date){
          var dateOut = new Date(date);
          return dateOut;
    };

    $scope.filteredItems =  [];
    $scope.groupedItems  =  [];
    $scope.itemsPerPage  =  4;
    $scope.pagedItems    =  [];
    $scope.currentPage   =  0;

    $scope.getEmployerRecruitments = function(idemployer){
        $scope.start();
        employerRecruitmentService.getListEmployerRecruitment(idemployer,function(data){
            console.log(data);
        $scope.pagedItems = data;    
        $scope.search='';
        $scope.currentPage = 1; //current page
        $scope.entryLimit = 20; //max no of items to display in a page
        $scope.filteredItems = $scope.pagedItems.length; //Initially for no filter  
        $scope.totalItems = $scope.pagedItems.length;
         if($scope.filteredItems == 0){
           $("#div-no-data-loading-rec").removeClass('hide');
        }
        $scope.complete();
        });
    };
    $scope.setPage = function(pageNo) {
        $scope.currentPage = pageNo;
    };
    $scope.filter = function() {
        $timeout(function() { 
            $scope.filteredItems = $scope.filtered.length;
            if($scope.filteredItems == 0){
               $("#div-no-data-loading-rec").removeClass('hide');
            }
        }, 10);
    };
    $scope.sort_by = function(predicate) {
        $scope.predicate = predicate;
        $scope.reverse = !$scope.reverse;
    };
    $scope.start = function() {
      cfpLoadingBar.start();
    };

    $scope.complete = function () {
      cfpLoadingBar.complete();
      $("#employerRecruitmentTable").removeClass('hide');
     // $("#managerTable").removeClass('hide');
      $("#div-data-loading-rec").addClass('hide');
    };




$scope.modalDetailEmployerRecruitment = function (size,selectedrecruitment) {
            jobseekerService.getToken(function(data){
                var obToken = JSON.parse(angular.toJson(data));
               //$log.info(obToken['name']);
                selecteduseremployer.csrf_name = obToken['name'];
                selecteduseremployer.csrf_hash = obToken['hash'];
            });
            //alert(data);
           // console.log(selecteduseremployer);
            var modalInstance = $modal.open({
                animation: $scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-detail-employer-recruitment.php',
                controller: function ($scope, $modalInstance, jobseeker){
                    $scope.jobseeker = jobseeker;
                    $scope.jobseeker.account_password = '';
                    $scope.ok = function () {
                        $modalInstance.close($scope.jobseeker);
                       //var employerid = $scope.jobseeker['emac_map_employer'];
                       //$scope.getEmployerUsers(employerid);
                    };

                    $scope.cancel = function () {
                        $modalInstance.dismiss('cancel');
                    };

                },
                size: size,
                resolve: {
                    jobseeker: function () {
                        return selecteduseremployer;
                    }
                }
            });

            modalInstance.result.then(function (selectedItem) {
                $scope.selected = selectedItem;
            }, function () {
                $log.info('Modal dismissed at: ' + new Date());
            });
        };



        $scope.modalUpdateEmployerRecruitment = function (size,selectedrecruitment) {
            jobseekerService.getToken(function(data){
                var obToken = JSON.parse(angular.toJson(data));
               //$log.info(obToken['name']);
                selecteduseremployer.csrf_name = obToken['name'];
                selecteduseremployer.csrf_hash = obToken['hash'];
            });
            //alert(data);
           // console.log(selecteduseremployer);
            var modalInstance = $modal.open({
                animation: $scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-update-employer-user.php',
                controller: function ($scope, $modalInstance, jobseeker){
                    $scope.jobseeker = jobseeker;
                    $scope.jobseeker.account_password = '';
                    $scope.ok = function () {
                        $modalInstance.close($scope.jobseeker);
                       //var employerid = $scope.jobseeker['emac_map_employer'];
                       //$scope.getEmployerUsers(employerid);
                    };

                    $scope.cancel = function () {
                        $modalInstance.dismiss('cancel');
                    };

                },
                size: size,
                resolve: {
                    jobseeker: function () {
                        return selecteduseremployer;
                    }
                }
            });

            modalInstance.result.then(function (selectedItem) {
                $scope.selected = selectedItem;
            }, function () {
                $log.info('Modal dismissed at: ' + new Date());
            });
        };



        $scope.modalDeleteEmployerRecruitment = function (size,selectedrecruitment) {
            employerUserService.getToken(function(data){
                var obToken = JSON.parse(angular.toJson(data));
               //$log.info(obToken['name']);
                selectedrecruitment.csrf_name = obToken['name'];
                selectedrecruitment.csrf_hash = obToken['hash'];
            });
            //alert(data);
            //console.log(selectedrecruitment);
            var modalInstance = $modal.open({
                animation: $scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-delete-employer-recruitment.php',
                controller: function ($scope, $modalInstance, recruitment){
                    $scope.recruitment = recruitment;
                    //$scope.jobseeker.account_password = '';
                    $scope.ok = function () {
                        $modalInstance.close($scope.recruitment);
                       //var employerid = $scope.jobseeker['emac_map_employer'];
                       //$scope.getEmployerUsers(employerid);
                    };

                    $scope.cancel = function () {
                        $modalInstance.dismiss('cancel');
                    };

                },
                size: size,
                resolve: {
                    recruitment: function () {
                        return selectedrecruitment;
                    }
                },
                 backdrop: 'static'
            });

            modalInstance.result.then(function (selectedItem) {
                $scope.selected = selectedItem;
            }, function () {
                $log.info('Modal dismissed at: ' + new Date());
            });
        };

        $scope.deleteEmployerRecruitment = function(recruitment){
            $scope.disabled_modal = true;
        if(recruitment){
            console.log("start delete");
            //$scope.$broadcast('removeRow', { message: jobseeker });
            employerRecruitmentService.deleteEmployerRecruitment(angular.toJson(recruitment),function(data){
                console.log(data);
                if(data){
                    console.log(recruitment['rec_map_employer']);
                    alertDeleteSuccess();
                    $scope.getEmployerRecruitments(recruitment['rec_map_employer']);
                    $scope.disabled_modal = false;
                    $scope.ok();
                }
                else{
                    alertErrors();
                     $scope.cancel();
                }

            });
        }
        };

        $scope.reloadEmployerRecruitment = function(employerid){
            $scope.getEmployerRecruitments(employerid);
        }




});


//directive controller

app.directive('wcUnique', ['jobseekerService', function (jobseekerService) {
    return {
        restrict: 'A',
        require: 'ngModel',
        link: function (scope, element, attrs, ngModel) {
                  scope.$watch(attrs.ngModel, function(value) {
                    console.log(value);
                    jobseekerService.checkEmailExits(value)
                    .then(function (unique) {
                            console.log("===="+unique + '\n' + '-=======');
                           // ngModel.$loading = false;
                           if(unique.trim() =="true")
                            {
                                 console.log('===TRUE====');
                                ngModel.$setValidity('unique', false); 

                            }
                        else
                        {
                            console.log('===FALSE====');
                           ngModel.$setValidity('unique', true); 
                        }
                            
                        
                    });
                  });
        }
    }
}]);