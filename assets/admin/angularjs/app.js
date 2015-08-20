var app = angular.module('myApp', ['ui.bootstrap','chieffancypants.loadingBar', 'ngAnimate']);

app.filter('startFrom', function() {
    return function(input, start) {
        if(input) {
            start = +start; //parse to int
            return input.slice(start);
        }
        return [];
    }
});
app.config(function(cfpLoadingBarProvider) {
    cfpLoadingBarProvider.includeSpinner = true;
  })
app.controller('jobseekerController', function (jobseekerService,$scope, $http, $timeout,cfpLoadingBar,$modal,$log,$window) {
    $scope.message ="";
    $scope.currentPage = 1; //current page
    $scope.entryLimit = 20;
    //$scope.list; //max no of items to display in a page
    $scope.init = function(){
        $scope.start();
        getData();   
        $scope.complete();
    }
    $scope.reload = function (){
        getData();
    }
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
    self.getData = function(){
        jobseekerService.getListJobseeker().then(function(data){
        $scope.list = data;
        
        $scope.filteredItems = $scope.list.length; //Initially for no filter  
        $scope.totalItems = $scope.list.length;
       
        });
    };
    $scope.start = function() {
      cfpLoadingBar.start();
    };

    $scope.complete = function () {
      cfpLoadingBar.complete();
      $("#jobseekerTable").removeClass('hide');
    }

    $scope.modalUpdate = function (size,selectedjobseeker) {
           // alert(selectedjobseeker);
            //var data = jobseekerService.getToken();
            jobseekerService.getToken(function(data){
                var obToken = JSON.parse(angular.toJson(data));
               //$log.info(obToken['name']);
                selectedjobseeker.csrf_name = obToken['name'];
                selectedjobseeker.csrf_hash = obToken['hash'];
            });
            //alert(data);
            var modalInstance = $modal.open({
                animation: $scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-update-jobseeker.php',
                controller: function ($scope, $modalInstance, jobseeker){
                    $scope.jobseeker = jobseeker;
                    $scope.jobseeker.account_password = '';
                    //alert(JSON.parse(jobseeker));
                    //$log.info(jobseeker);
                    $scope.ok = function () {
                        $modalInstance.close($scope.jobseeker);
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
                }
            });

            modalInstance.result.then(function (selectedItem) {
                $scope.selected = selectedItem;
            }, function () {
                $log.info('Modal dismissed at: ' + new Date());
            });
        };

        $scope.modalDelete = function (size,selectedjobseeker) {
           // alert(selectedjobseeker);
            //var data = jobseekerService.getToken();
            jobseekerService.getToken(function(data){
                var obToken = JSON.parse(angular.toJson(data));
               //$log.info(obToken['name']);
                selectedjobseeker.csrf_name = obToken['name'];
                selectedjobseeker.csrf_hash = obToken['hash'];
            });
            //alert(data);
            var modalInstance = $modal.open({
                animation: $scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-delete-jobseeker.php',
                controller: function ($scope, $modalInstance, jobseeker){
                    $scope.jobseeker = jobseeker;
                    $scope.jobseeker.account_password = '';
                    //alert(JSON.parse(jobseeker));
                    //$log.info(jobseeker);
                    $scope.ok = function () {
                        $modalInstance.close($scope.jobseeker);
                        
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
                scope: $scope
            });

            modalInstance.result.then(function (selectedItem) {
                $scope.selected = selectedItem;
            }, function () {
                $log.info('Modal dismissed at: ' + new Date());
            });
        };

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
    $scope.deleteJobseeker = function(jobseeker){
        if(jobseeker){
            $scope.$broadcast('removeRow', { message: jobseeker });
            jobseekerService.deleteJobseeker(angular.toJson(jobseeker),function(data){
                if(data){
                    alertDeleteSuccess();
                    
                }

            });

            for (var i in $scope.list) {
                            if ($scope.list[i] === jobseeker) {
                                $scope.list.splice(i, 1);
                               
                                    }
                        }

        }
    };
    $scope.setDisabled = function(value){
        $scope.jobseeker.account_is_disabled = value;
    };
    $scope.updateJobseeker = function(jobseeker){
         jobseekerService.updateJobseeker(angular.toJson(jobseeker),function(data){
                if(data){
                    alertEditSuccess();
                }

         });
    };
    self.alertEditSuccess = function(){
        $(".alert-message").removeClass('hide');
                    $(".alert-message").alert();
                    window.setTimeout(function() { $(".alert-message").hide(); }, 1500);
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
    $scope.openDetailJobseeker = function(jobseeker,url){
        $window.location.href = url + "/" +jobseeker.account_id;
    }

    $scope.modalCreateJobseeker = function (size) {

            
            var modalInstance = $modal.open({
                animation: $scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-create-jobseeker.php',
                controller: function ($scope, $modalInstance,csrf){
                    $scope.csrf = csrf;
                    $scope.ok = function () {
                        $modalInstance.close();
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
                    //console.log(data);
                    $scope.list[$scope.list.length] = data;
                    alertCreateSuccess();
                    
                }

            });
    };
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
           // alert(selectedjobseeker);
            //var data = jobseekerService.getToken();
            
            // jobseekerService.getDetailDocument(id,function(data){
            //                         console.log(data);
            //                         $scope.documentJobseeker = data;
            //                     });
            var modalInstance = $modal.open({
                animation: $scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-document-jobseeker.php',
                controller: function ($scope, $modalInstance, documentJobseeker){
                    $scope.documentJobseeker = documentJobseeker;
                    // $scope.jobseeker.account_password = '';
                    //alert(JSON.parse(jobseeker));
                    //$log.info(jobseeker);
                    $scope.ok = function () {
                        $modalInstance.close($scope.jobseeker);
                    };

                    $scope.cancel = function () {
                        $modalInstance.dismiss('cancel');
                    };

                },
                size: size,
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
                           if(unique ==="true")
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


