app.filter('startFrom', function() {
    return function(input, start) {
        if(input) {
            start = +start; //parse to int
            return input.slice(start);
        }
        return [];
    }
});

app.controller('managerController', function (managerService,$scope, $http, $timeout,cfpLoadingBar,$modal,$log,$window) {
	$scope.completeProcess = false;
$scope.formatDate = function(date){
          var dateOut = new Date(date);
          return dateOut;
    };
    $scope.filteredItems =  [];
    $scope.groupedItems  =  [];
    $scope.itemsPerPage  =  5;
    $scope.pagedItems    =  [];
    $scope.currentPage   =  0;

    $scope.getManagers = function(){
    	//$scope.pagedItems =[];
        $scope.start();
        console.log("start call service");
       managerService.getListManager(function(data){
       	 console.log("start get data");
       	//$http.get(pathWebsite + 'admin/manager/getListManager').success(function(data){
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
        console.log("finish data");
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
      $("#managerTable").removeClass('hide');
      $("#div-data-loading").addClass('hide');
    };

    $scope.modalUpdate = function (size,selectedmanager) {
            managerService.getToken(function(data){
                var obToken = JSON.parse(angular.toJson(data));
               //$log.info(obToken['name']);
                selectedmanager.csrf_name = obToken['name'];
                selectedmanager.csrf_hash = obToken['hash'];
            });
            //alert(data);
            var modalInstance = $modal.open({
                animation: false,//$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-update-manager.php',
                controller: function ($scope, $modalInstance, manager){
                    $scope.manager = manager;
                    $scope.manager.account_password = '';
                    $scope.ok = function () {
                        $modalInstance.close($scope.manager);
                    };

                    $scope.cancel = function () {
                        $modalInstance.dismiss('cancel');
                    };

                },
                size: size,
                 windowClass: "modal fade in",
                resolve: {
                    manager: function () {
                        return selectedmanager;
                    }
                }
            });

            modalInstance.result.then(function (selectedItem) {
                $scope.selected = selectedItem;
            }, function () {
                $log.info('Modal dismissed at: ' + new Date());
            });
        };

        $scope.modalDelete = function (size,selectedmanager) {

            managerService.getToken(function(data){
                var obToken = JSON.parse(angular.toJson(data));
               $log.info(obToken);
                selectedmanager.csrf_name = obToken['name'];
                selectedmanager.csrf_hash = obToken['hash'];
            });
   
            var modalInstance = $modal.open({
                animation: false,//$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-delete-manager.php',
                controller: function ($scope, $modalInstance, manager){
                    $scope.manager = manager;
                    $scope.manager.account_password = '';
                    $scope.ok = function () {
                        $modalInstance.close($scope.manager);
                       
                    console.log("close modal");
                    $scope.getManagers();
                       
                    };

                    $scope.cancel = function () {
                        $modalInstance.dismiss('cancel');
                    };

                },
                size: size,
                resolve: {
                    manager: function () {
                        return selectedmanager;
                    }
                },
                scope: $scope,
                backdrop: 'static',
                 windowClass: "modal fade in",
            });

            modalInstance.result.then(function (selectedItem) {
                $scope.selected = selectedItem;
            }, function () {
                $log.info('Modal dismissed at: ' + new Date());
            });
        };

    $scope.deleteManager = function(manager){
         $scope.disabled_modal = true;
        if(manager){
        	console.log("start delete");
            managerService.deleteManager(angular.toJson(manager),function(data){
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

   

    $scope.setDisabled = function(value){
        $scope.manager.account_is_disabled = value;
    };
    $scope.updateManager = function(manager){
         managerService.updateManager(angular.toJson(manager),function(data){
                if(data){
                    alertEditSuccess();
                }
                else{
                    alertErrors();
                     $scope.cancel();
                }

         });
    };
    $scope.removeObject = function(object){

    	for (var i in  eval($scope.pagedItems)) {
                            if ($scope.pagedItems[i]['email'] == object['email']) {
                                $scope.pagedItems.splice(i, 1);
                                    }
                        }
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
    };
    $scope.reload = function(){
    $scope.getManagers();
    }

    $scope.modalCreateManager = function (size) {

            
            var modalInstance = $modal.open({
                animation: false,//$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-create-manager.php',
                controller: function ($scope, $modalInstance,csrf){
                    $scope.csrf = csrf;
                    $scope.ok = function () {
                        //$scope.message="changed";
                         
                       $modalInstance.close();
                       $scope.getManagers();
                       // $scope.setPage(6);
                        //$scope.message ="đâsdasdasdasd";
                    };

                    $scope.cancel = function () {
                        $modalInstance.dismiss('cancel');
                    };

                },
                size: size,
                scope:$scope,
                 windowClass: "modal fade in",
                resolve: {
                    csrf: function () {
                      return managerService.getTokenReturn();
                    }
                },

            });

            modalInstance.result.then(function (selectedItem) {
                $scope.selected = selectedItem;
            }, function () {
                $log.info('Modal dismissed at: ' + new Date());
            });
        };


    $scope.createManager = function(manager,csrf){
        console.log(csrf);
        
        managerService.createManager(angular.toJson(manager),csrf,function(data){
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
});

app.directive('wcUnique', ['managerService', function (managerService) {
    return {
        restrict: 'A',
        require: 'ngModel',
        link: function (scope, element, attrs, ngModel) {
                  scope.$watch(attrs.ngModel, function(value) {
                    console.log(value);
                    managerService.checkEmailExits(value)
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