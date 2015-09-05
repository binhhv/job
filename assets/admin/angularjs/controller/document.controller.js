// app.filter('startFrom', function() {
//     return function(input, start) {
//         if(input) {
//             start = +start; //parse to int
//             return input.slice(start);
//         }
//         return [];
//     }
// });

app.filter('propsFilter', function() {
  return function(items, props) {
    var out = [];

    if (angular.isArray(items)) {
      var keys = Object.keys(props);
        
      items.forEach(function(item) {
        var itemMatches = false;

        for (var i = 0; i < keys.length; i++) {
          var prop = keys[i];
          var text = props[prop].toLowerCase();
          if (item[prop].toString().toLowerCase().indexOf(text) !== -1) {
            itemMatches = true;
            break;
          }
        }

        if (itemMatches) {
          out.push(item);
        }
      });
    } else {
      // Let the output be the input untouched
      out = items;
    }

    return out;
  };
}).filter('startFrom', function() {
    return function(input, start) {
        if(input) {
            start = +start; //parse to int
            return input.slice(start);
        }
        return [];
    }
})

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
        $window.location.href = url +data.userid+'/'+data.doccv_file_tmp+'/'+data.doccv_file_name+'/'+data.doccv_type;
    }

    $scope.modalUpdateForm = function (size,selectedform,country) {
            documentService.getToken(function(data){
                var obToken = JSON.parse(angular.toJson(data));
               //$log.info(obToken['name']);
                selectedform.csrf_name = obToken['name'];
                selectedform.csrf_hash = obToken['hash'];
            });
            documentService.getListHealthy(function(data){
                selectedform.listHealthy = data;

                
            });
           
            //if(selectedform.numprovince >= 5){
                 //console.log("trtetre");
                 
           //}
            var modalInstance = $modal.open({
                animation: $scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-update-form.php',
                controller: function ($scope, $modalInstance, docform,provinceform,listProvinces,listCountries,listLevels,listCareers){
                    $scope.docform = docform;
                   $scope.docform.object_docon_healthy = {healthy_id:docform.docon_healthy,healthy_type:docform.healthy_type};
                    //$scope.docform.docon_healthy = $scope.getValueHealthy($scope.docform.healthy_id,$scope.docform.listHealthy);
                    $scope.docform.docon_birthday = new Date(docform.docon_birthday);
                    $scope.docform.object_level = {ljob_id:selectedform.ljob_id,ljob_level:selectedform.ljob_level};
                    $scope.docform.object_career = {career_id:selectedform.docon_career,career_name:selectedform.career_name};
                    $scope.docform.listLevels = listLevels;
                    $scope.docform.listCountries = listCountries;
                    $scope.docform.object_country = selectedform.docon_map_country;
                    $scope.docform.provinceSelected = (provinceform) ? provinceform : [];
                    $scope.docform.listProvinces = listProvinces;
                    $scope.docform.listCareers = listCareers;
                    //$("#select-Province").addClass('hide');
                    console.log(selectedform.docon_map_country);
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
                    },
                    provinceform:function(){
                        return documentService.getListProvinceDocument(selectedform.docon_id,selectedform.docon_map_country);
                    },
                    listProvinces:function(){
                        return documentService.getListProvinceCountry(selectedform.docon_map_country);
                    },
                    listCountries:function(){
                        return documentService.getListCountry();
                    },
                    listLevels:function(){
                        return documentService.getListLevel();
                    },
                    listCareers:function(){
                        return documentService.getListCareer();
                    }
                },
                scope:$scope,
                backdrop:'static'

            });

            modalInstance.result.then(function (selectedItem) {
                $scope.selected = selectedItem;

            }, function () {
                $log.info('Modal dismissed at: ' + new Date());
            });
        };

         $scope.changeProvinceCreate = function(){
        var numSelected = $scope.docform.provinceSelected.length;
        console.log(numSelected);
        if(numSelected >= 5){
           //$scope.rec.provinceSelected.splice(5,1);
             //$scope.isFull = false;
             //console.log($scope.rec.provinceSelected);
             if(numSelected == 6){
                $scope.docform.provinceSelected.shift();
             }
             $("#select-Province").addClass('hide');
        }
        else {
            $("#select-Province").removeClass('hide');
            
        }

       };

       $scope.changeCountry = function(){
            var idcountry = $scope.docform.object_country;
            console.log(idcountry);
          documentService.getListProvinceCountry(idcountry).then(function(data){
                $scope.docform.listProvinces = data;
                 //$scope.docform.provinceSelected =$scope.docform.listProvinces[0];
            });
            $scope.docform.provinceSelected = [];
           
           documentService.getListProvinceDocument($scope.docform.docon_id,idcountry).then(function(data){
               $scope.docform.provinceSelected =data;
               //console.log($scope.rec['rec_id'] + idcountry);
               console.log(data);
           });
            
        }
 
    $scope.updateForm = function(docform){
         $scope.disabled_modal = true;
        documentService.updateForm(angular.toJson(docform),function(data){
                if(data){
                    $scope.alertEditSuccess();
                $scope.disabled_modal = false;
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
    };

    
    $scope.openModalCreateForm = function (size,country) {
      
            var modalInstance = $modal.open({
                animation: $scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-create-form.php',
                controller: function ($scope, $modalInstance,listProvinces,listCountries,listLevels,csrf,listHealthy,listCareers){
                    $scope.docform = {};
                  // $scope.docform.object_docon_healthy = {healthy_id:docform.docon_healthy,healthy_type:docform.healthy_type};
                    //$scope.docform.docon_healthy = $scope.getValueHealthy($scope.docform.healthy_id,$scope.docform.listHealthy);
                    $scope.docform.docon_birthday = new Date("1990-01-01T12:00:00");
                    $scope.docform.object_level = listLevels[0];//{ljob_id:selectedform.ljob_id,ljob_level:selectedform.ljob_level};
                    $scope.docform.listHealthy = listHealthy;
                    $scope.docform.csrf = csrf;
                    $scope.docform.listLevels = listLevels;
                    $scope.docform.listCountries = listCountries;
                    $scope.docform.object_country = country;
                    $scope.docform.provinceSelected = [];
                    $scope.docform.listProvinces = listProvinces;
                    $scope.docform.object_docon_healthy = listHealthy[0];
                    $scope.docform.listCareers = listCareers;
                    $scope.docform.object_career = listCareers[0];
                    //$("#select-Province").addClass('hide');
                    //console.log(selectedform.docon_map_country);
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
                   
                    listProvinces:function(){
                        return documentService.getListProvinceCountry(country);
                    },
                    listCountries:function(){
                        return documentService.getListCountry();
                    },
                    listLevels:function(){
                        return documentService.getListLevel();
                    },
                    csrf:function(){
                        return documentService.getTokenNoRT();
                    },
                    listHealthy: function(){
                        return documentService.getListHealthyNoRT();
                    },
                    listCareers:function(){
                        return documentService.getListCareer();
                    }

                },
                scope:$scope,
                backdrop:'static'

            });

            modalInstance.result.then(function (selectedItem) {
                $scope.selected = selectedItem;

            }, function () {
                $log.info('Modal dismissed at: ' + new Date());
            });
        };

    $scope.changeProvinceCreateForm = function(){
        var numSelected = $scope.docform.provinceSelected.length;
        console.log(numSelected);
        if(numSelected >= 5){
           //$scope.rec.provinceSelected.splice(5,1);
             //$scope.isFull = false;
             //console.log($scope.rec.provinceSelected);
             if(numSelected == 6){
                $scope.docform.provinceSelected.shift();
             }
             $("#select-Province").addClass('hide');
        }
        else {
            $("#select-Province").removeClass('hide');
            
        }

       };

       $scope.changeCountryCreateForm = function(){
            var idcountry = $scope.docform.object_country;
            console.log(idcountry);
          documentService.getListProvinceCountry(idcountry).then(function(data){
                $scope.docform.listProvinces = data;
                $scope.docform.provinceSelected = data[0];
                 //$scope.docform.provinceSelected =$scope.docform.listProvinces[0];
            });
            //$scope.docform.provinceSelected = [];
           
           //documentService.getListProvinceDocument($scope.docform.docon_id,idcountry).then(function(data){
               //$scope.docform.provinceSelected =data;
               //console.log($scope.rec['rec_id'] + idcountry);
               //console.log(data);
           //});
            
        }
        $scope.createForm = function(docform){
            console.log(docform.docon_skill);
            $scope.disabled_modal = true;
            if(docform){
                documentService.createForm(angular.toJson(docform),function(data){
                    if(data){
                        alertCreateSuccess();
                    $scope.disabled_modal = false;
                        $scope.ok();
                    }
                    else{
                        alertErrors();
                        $scope.cancel();
                    }
                });
            }
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

    $scope.modalDetailForm = function (size,id,type) {
           
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
                         return documentService.getDetailForm(id,type);
                    }
                }
            });

            modalInstance.result.then(function (selectedItem) {
                $scope.selected = selectedItem;
            }, function () {
                $log.info('Modal dismissed at: ' + new Date());
            });
        };


    $scope.openModalUploadCV = function(size){
        var modalInstance = $modal.open({
                animation: $scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-upload-cv.php',
                controller: function ($scope, $modalInstance,csrf){
                   // $scope.documentJobseeker = documentJobseeker;
                   $scope.cv = {}
                   $scope.cv.csrf = csrf;
                   $scope.cv.fileDocument ='';
                   $scope.cv.fileTypeValidate = false;
                    $scope.ok = function () {
                        $modalInstance.close($scope.jobseeker);
                    };

                    $scope.cancel = function () {
                        $modalInstance.dismiss('cancel');
                    };

                },
                size: size,
                resolve: {
                    csrf:function(){
                        return documentService.getTokenNoRT();
                    }
                },
                scope:$scope,
                backdrop:'static'
            });

            modalInstance.result.then(function (selectedItem) {
                $scope.selected = selectedItem;
            }, function () {
                $log.info('Modal dismissed at: ' + new Date());
            });
    };

    $scope.uploadFile = function(files) {
        $scope.cv.fileTypeValidate = false;
        if(files){
        var type = files[0].type; //MIME type
        var size = files[0].size;
        if(type.indexOf("application/pdf") == -1
            && type.indexOf("application/msword") == -1 
            &&  type.indexOf("application/vnd.openxmlformats-officedocument.wordprocessingml.document") == -1){
            $scope.cv.fileTypeValidate = true;
        console.log("adasd");
        } //File size in bytes
        
        console.log(files[0].type);
        $scope.cv.fileDocument = files[0].name;
        $scope.cv.file = files[0];
    }
        //$scope.employer.logoExtension = files[0].type;
    }; 

    $scope.uploadCV = function(cv){
        if(cv){
            documentService.uploadCV(angular.toJson(cv),function(data){
                if(data){

                }
                else{

                }
            });
        }
    }


//    $scope.$watch('docform.docon_birthday', function (newValue) {
//     $scope.birthday = $filter('date')(newValue, 'dd/MM/yyyy'); 
// });
});


app.directive('onlyDigits', function () {

    return {
        restrict: 'A',
        require: '?ngModel',
        link: function (scope, element, attrs, ngModel) {
            if (!ngModel) return;
            ngModel.$parsers.unshift(function (inputValue) {
                var digits = inputValue.split('').filter(function (s) { return (!isNaN(s) && s != ' '); }).join('');
                ngModel.$viewValue = digits;
                ngModel.$render();
                return digits;
            });
        }
    };
});



