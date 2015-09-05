app.filter('startFrom', function() {
    return function(input, start) {
        if(input) {
            start = +start; //parse to int
            return input.slice(start);
        }
        return [];
    }
});

app.controller('jobseekerController', function (jobseekerService,$scope, $http, $timeout,cfpLoadingBar,$modal,$log,$window) {
    $scope.filteredItems =  [];
    $scope.groupedItems  =  [];
    $scope.itemsPerPage  =  5;
    $scope.pagedItems    =  [];
    $scope.currentPage   =  0;
    $scope.messageProcess = true;
    $scope.getJobseekers = function(){
        console.log("start get datta");
        $scope.start();
        jobseekerService.getListJobseeker(function(data){
        $scope.pagedItems = data;    
        $scope.search='';
        //$scope.itemsPerPage  =  5;
        $scope.currentPage = 1; //current page
        $scope.entryLimit = 20; //max no of items to display in a page
        $scope.filteredItems = $scope.pagedItems.length; //Initially for no filter  
        $scope.totalItems = $scope.pagedItems.length;
        console.log("get data finish");
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
      $("#jobseekerTable").removeClass('hide');
      $("#div-data-loading").addClass('hide');
    }

    $scope.modalUpdate = function (size,selectedjobseeker) {
            jobseekerService.getToken(function(data){
                var obToken = JSON.parse(angular.toJson(data));
               //$log.info(obToken['name']);
                selectedjobseeker.csrf_name = obToken['name'];
                selectedjobseeker.csrf_hash = obToken['hash'];
            });
            //alert(data);
            var modalInstance = $modal.open({
                animation: false,//$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-update-jobseeker.php',
                controller: function ($scope, $modalInstance, jobseeker){
                    $scope.jobseeker = jobseeker;
                    $scope.jobseeker.account_password = '';
                    $scope.ok = function () {
                        $modalInstance.close($scope.jobseeker);
                    };

                    $scope.cancel = function () {
                        $modalInstance.dismiss('cancel');
                    };

                },
                size: size,
                 windowClass: "modal fade in",
                resolve: {
                    jobseeker: function () {
                        return selectedjobseeker;
                    }
                }
            });

            modalInstance.result.then(function (selectedItem) {
                $scope.selected = selectedItem;
            }, function () {
                $log.info('Modal dismissed at: ' + new Date());
            });
        };

        $scope.modalDelete = function (size,selectedjobseeker) {

            jobseekerService.getToken(function(data){
                var obToken = JSON.parse(angular.toJson(data));
               //$log.info(obToken['name']);
                selectedjobseeker.csrf_name = obToken['name'];
                selectedjobseeker.csrf_hash = obToken['hash'];
            });
            //alert(data);
            var modalInstance = $modal.open({
                animation: false,//$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-delete-jobseeker.php',
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
                        console.log("close modal");
                        $scope.getJobseekers();
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
                 backdrop: 'static',
                  windowClass: "modal fade in"
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
            jobseekerService.deleteJobseeker(angular.toJson(jobseeker),function(data){
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
                }
                else{
                    alertErrors();
                     $scope.cancel();
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
    self.alertErrors = function(){
        $(".alert-message-errors").removeClass('hide');
                    $(".alert-message-errors").alert();
                    window.setTimeout(function() { $(".alert-message-errors").addClass('hide').fadeOut(); }, 1500);
    }
    $scope.openDetailJobseeker = function(jobseeker,url){
        $window.location.href = url + "/" +jobseeker.account_id;
    }

    $scope.modalCreateJobseeker = function (size) {

            
            var modalInstance = $modal.open({
                animation: false,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-create-jobseeker.php',
                controller: function ($scope, $modalInstance,csrf){
                    $scope.csrf = csrf;
                    $scope.ok = function () {
                        //$scope.message="changed";
                         
                        $modalInstance.close();
                       $scope.getJobseekers();
                       // $scope.setPage(6);
                        //$scope.message ="đâsdasdasdasd";
                    };

                    $scope.cancel = function () {
                        $modalInstance.dismiss('cancel');
                    };

                },
               //  animation: false,
                windowClass: "modal fade in",
                size: size,
                scope:$scope,
                resolve: {
                    csrf: function () {
                      return jobseekerService.getTokenReturn();
                    }
                },

            });

            modalInstance.result.then(function (selectedItem) {
                $scope.selected = selectedItem;
            }, function () {
                $log.info('Modal dismissed at: ' + new Date());
            });
        };


    $scope.createJobseeker = function(jobseeker,csrf){
        console.log(csrf);
        
        jobseekerService.createJobseeker(angular.toJson(jobseeker),csrf,function(data){
            if(data){
                alertCreateSuccess();
                $scope.pagedItems[$scope.pagedItems.length] = data;

                $scope.ok();

            }
            else{
                alertErrors();
                 $scope.cancel();
            }
        });

         
    };
    $scope.reload = function(){
    $scope.getJobseekers();
    }
    $scope.checkEmailJobseeker = function(emailJobseeker){
       //console.log(jobseekerService.checkEmailExits(emailJobseeker));
       $timeout(function() {
            console.log(jobseekerService.checkEmailExits(emailJobseeker));
       }, 100);
    }




});

app.controller('detailJobseekerController', function (jobseekerService,$scope, $http, $timeout,cfpLoadingBar,$modal,$log,$window) {
    $scope.viewDetailDocument = function(id){
        var objectDocument = jobseekerService.getDetailDocument(id,function(data){
                console.log(data);
        });
        
    }

    $scope.modalDocument = function (size,id) {
           
            var modalInstance = $modal.open({
                animation: false,//$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-document-jobseeker.php',
                controller: function ($scope, $modalInstance, documentJobseeker){
                    $scope.documentJobseeker = documentJobseeker;
                    $scope.ok = function () {
                        $modalInstance.close($scope.jobseeker);
                    };

                    $scope.cancel = function () {
                        $modalInstance.dismiss('cancel');
                    };

                },
                size: size,
                windowClass: "modal fade in",
                resolve: {
                    documentJobseeker: function () {
                         return jobseekerService.getDetailDocument(id);
                    }
                }
            });

            modalInstance.result.then(function (selectedItem) {
                $scope.selected = selectedItem;
            }, function () {
                $log.info('Modal dismissed at: ' + new Date());
            });
        };


});



app.directive('wcUnique', ['jobseekerService', function (jobseekerService) {
    return {
        restrict: 'A',
        require: 'ngModel',
        link: function (scope, element, attrs, ngModel) {
                  scope.$watch(attrs.ngModel, function(value) {
                    console.log(value);
                    jobseekerService.checkEmailExits(value)
                    .then(function (unique) {
                            console.log(unique + '\n');
                           // ngModel.$loading = false;
                           if(unique.trim() ==="true")
                            {ngModel.$setValidity('unique', false); }
                        else
                        {
                           ngModel.$setValidity('unique', true); 
                        }
                            
                        
                    });
                  });
        }
    }
}]);