app.filter('startFrom', function() {
    return function(input, start) {
        if(input) {
            start = +start; //parse to int
            return input.slice(start);
        }
        return [];
    }
});

app.controller('documentController', function (documentService,$scope, $http, $timeout,cfpLoadingBar,$modal,$log,$window,$filter) {
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

    $scope.getCVs = function(){
    	//$scope.pagedItems =[];
        $scope.start();
        console.log("start call service");
       documentService.getListCV(function(data){
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
    $scope.getForms = function(){
        //$scope.pagedItems =[];
        $scope.start();
        console.log("start call service");
       documentService.getListForm(function(data){
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
    $scope.downloadCV = function(data,url){
        //console.log(url);
        $window.location.href = url +data.doccv_map_user+'/'+data.doccv_file_tmp+'/'+data.doccv_file_name;
    }

    $scope.modalUpdateForm = function (size,selectedform) {
            documentService.getToken(function(data){
                var obToken = JSON.parse(angular.toJson(data));
               //$log.info(obToken['name']);
                selectedform.csrf_name = obToken['name'];
                selectedform.csrf_hash = obToken['hash'];
            });
            documentService.getListHealthy(function(data){
                selectedform.listHealthy = data;

                console.log(data);
            });
            //alert(data);
            var modalInstance = $modal.open({
                animation: $scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-update-form.php',
                controller: function ($scope, $modalInstance, docform){
                    $scope.docform = docform;
                    //$scope.docform.docon_healthy = $scope.getValueHealthy($scope.docform.healthy_id,$scope.docform.listHealthy);
                    $scope.docform.docon_birthday = new Date(docform.docon_birthday);
                    //$scope.manager.account_password = '';
                    $scope.ok = function () {
                        $modalInstance.close($scope.docform);

                        $scope.getForms();
                    };

                    $scope.cancel = function () {
                        $modalInstance.dismiss('cancel');
                    };

                },
                size: size,
                resolve: {
                    docform: function () {
                        return selectedform;
                    }
                },
                scope:$scope

            });

            modalInstance.result.then(function (selectedItem) {
                $scope.selected = selectedItem;
            }, function () {
                $log.info('Modal dismissed at: ' + new Date());
            });
        };

        
    $scope.updateForm = function(docform){
        documentService.updateForm(angular.toJson(docform),function(data){
                if(data){
                    $scope.alertEditSuccess();

                    $scope.ok();
                }
                else{
                    alertErrors();
                     $scope.cancel();
                }

         });
    }
    $scope.getValueHealthy = function(key,data){
             for (var i in data) {
                                    if (data[i]['healthy_id'] === key) {
                                        //$scope.list.splice(i, 1);
                                       return data[i]['healthy_id'];
                                    }
                                }
        return 0;
    }

   

    $scope.setDisabled = function(value){
        $scope.manager.account_is_disabled = value;
    };
    $scope.updateForm = function(manager){
         documentService.updateForm(angular.toJson(manager),function(data){
                if(data){
                    alertEditSuccess();
                    $scope.ok();
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
    $scope.reloadCV = function(){
    $scope.getCVs();
    }
    $scope.reloadForm = function(){
    $scope.getForms();
    };

    $scope.modalDeleteCV = function (size,selectedcv) {

            documentService.getToken(function(data){
                var obToken = JSON.parse(angular.toJson(data));
               //$log.info(obToken['name']);
                selectedcv.csrf_name = obToken['name'];
                selectedcv.csrf_hash = obToken['hash'];
            });
            //selectedcv.subject = 'Xóa CV';
            //selectedcv.message = 'Chúng tôi đã xem và thấy cv của bạn không hợp lệ. Chúng tôi quyết định xóa CV của bạn.'
            //alert(data);
            var modalInstance = $modal.open({
                animation: $scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-delete-cv.php',
                controller: function ($scope, $modalInstance, cv){
                    $scope.cv = cv;
                    //$scope.cv.account_password = '';
                    $scope.ok = function () {
                        $modalInstance.close($scope.cv);
                        
                        $scope.getCVs();
                    };

                    $scope.cancel = function () {
                        $modalInstance.dismiss('cancel');
                    };

                },
                size: size,
                resolve: {
                    cv: function () {
                        return selectedcv;
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

    $scope.deleteCV = function(cv){
        $scope.disabled_modal = true;
        if(cv){
            //$scope.$broadcast('removeRow', { message: employer });
            documentService.deleteCV(angular.toJson(cv),function(data){
                if(data){
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


    $scope.modalDeleteForm = function (size,selectedform) {

            documentService.getToken(function(data){
                var obToken = JSON.parse(angular.toJson(data));
               //$log.info(obToken['name']);
                selectedform.csrf_name = obToken['name'];
                selectedform.csrf_hash = obToken['hash'];
            });
            $log.info(selectedform);
            //selectedcv.subject = 'Xóa CV';
            //selectedcv.message = 'Chúng tôi đã xem và thấy cv của bạn không hợp lệ. Chúng tôi quyết định xóa CV của bạn.'
            //alert(data);
            var modalInstance = $modal.open({
                animation: $scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-delete-form.php',
                controller: function ($scope, $modalInstance, docform){
                    $scope.docform = docform;
                    //$scope.cv.account_password = '';
                    $scope.ok = function () {
                        $modalInstance.close($scope.docform);
                        
                        $scope.getForms();
                    };

                    $scope.cancel = function () {
                        $modalInstance.dismiss('cancel');
                    };

                },
                size: size,
                resolve: {
                    docform: function () {
                        return selectedform;
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

    $scope.deleteForm = function(docform){
        $scope.disabled_modal = true;
        if(docform){
            //$scope.$broadcast('removeRow', { message: employer });
            documentService.deleteForm(angular.toJson(docform),function(data){
                if(data){
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

    $scope.modalDetailForm = function (size,id) {
           
            var modalInstance = $modal.open({
                animation: $scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-document-form.php',
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
                resolve: {
                    documentJobseeker: function () {
                         return documentService.getDetailForm(id);
                    }
                }
            });

            modalInstance.result.then(function (selectedItem) {
                $scope.selected = selectedItem;
            }, function () {
                $log.info('Modal dismissed at: ' + new Date());
            });
        };

//    $scope.$watch('docform.docon_birthday', function (newValue) {
//     $scope.birthday = $filter('date')(newValue, 'dd/MM/yyyy'); 
// });
});




