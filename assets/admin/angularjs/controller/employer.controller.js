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
                scope: $scope
            });

            modalInstance.result.then(function (selectedItem) {
                $scope.selected = selectedItem;
            }, function () {
                $log.info('Modal dismissed at: ' + new Date());
            });
        };

    $scope.deleteemployer = function(employer){
        if(employer){
            //$scope.$broadcast('removeRow', { message: employer });
            employerService.deleteEmployer(angular.toJson(employer),function(data){
                if(data){
                    alertDeleteSuccess();
                    
                }
                else{
                    alertErrors();
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
        $window.location.href = url + "/" +employer.account_id;
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