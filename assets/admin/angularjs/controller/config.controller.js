app.filter('startFrom', function() {
    return function(input, start) {
        if(input) {
            start = +start; //parse to int
            return input.slice(start);
        }
        return [];
    }
}).filter('cut', function () {
        return function (value, wordwise, max, tail) {
            if (!value) return '';

            max = parseInt(max, 10);
            if (!max) return value;
            if (value.length <= max) return value;

            value = value.substr(0, max);
            if (wordwise) {
                var lastspace = value.lastIndexOf(' ');
                if (lastspace != -1) {
                    value = value.substr(0, lastspace);
                }
            }

            return value + (tail || ' …');
        };
    }).filter('jsonFile',function(){
        return function (value,type){
            var objectJson = $.parseJSON(value);
            if(type){
                return objectJson.file_name;
            }
            else return objectJson.file_tmp;
        }
    });
app.controller('logoController', function (logoService,configService,$scope, $http, $timeout,cfpLoadingBar,$modal,$log,$window,$filter) {
    $scope.base_url = config.base_url;
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

    $scope.getLogo = function(){
        //$scope.pagedItems =[];
        $scope.start();
        console.log("start call service");
       logoService.getListLogo(function(data){
         console.log(data);
        //$http.get(pathWebsite + 'admin/manager/getListManager').success(function(data){
        $scope.pagedItems = data;    
        console.log(data);
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
      $("#logoDiv").removeClass('hide');
      $("#div-data-loading").addClass('hide');
    };
    $scope.reloadLogo = function(){
        $scope.getLogo();
    };

    $scope.openModalUploadLogo = function(size){
        var modalInstance = $modal.open({
                animation: false,//$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-upload-logo.php',
                controller: function ($scope, $modalInstance,csrf){
                    $scope.logo = {};
                    $scope.logo.logoName='';
                    $scope.logo.logoExtension='';
                    $scope.logoObject ={};
                    $scope.logo.csrf = csrf;
                    $scope.ok = function () {
                        //$scope.message="changed";
                         
                        $modalInstance.close();
                       $scope.getLogo();
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
                      return configService.getToken();
                    }
                },
                backdrop:'static',
                 windowClass: "modal fade in"


            });

            modalInstance.result.then(function (selectedItem) {
                $scope.selected = selectedItem;
            }, function () {
                $log.info('Modal dismissed at: ' + new Date());
            });
    };
    $scope.uploadLogo = function(logo,logoObject){
        $scope.disabled_modal = true;
        logoService.uploadLogo(angular.toJson(logo),logoObject,function(data){
            if(data){
                alertCreateSuccess();
                $scope.ok();
                $scope.disabled_modal = false;
                //$scope.getemployers();
                //$scope.pagedItems[$scope.pagedItems.length] = data;

            }
            else{
                alertErrors();
                 $scope.cancel();
            }
        });

         
    };

    $scope.uploadFile = function(files) {
        $scope.fileTypeValidate = false;
        $scope.fileSizeValidate = false;
        var type = files[0].type; //MIME type
        var size = files[0].size;
        if(type.indexOf("image/") == -1){
            $scope.fileTypeValidate = true;
        } //File size in bytes
        if(parseInt(size) > 2097152 ){
            $scope.fileSizeValidate = true;
        }
        console.log(files[0].name);
        $scope.logo.logoName = files[0].name;
        //$scope.employer.logoExtension = files[0].type;
    }; 
    $scope.openModalActiveDelete = function(size,type,logo){
        var modalInstance = $modal.open({
                animation: false,//$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-active-delete-logo.php',
                controller: function ($scope, $modalInstance,logo,csrf){
                    $scope.logo = logo;
                    if(type == '0'){
                         $scope.titleModal ='Bạn có muốn sử dụng hình này làm logo website không ?';
                         $scope.titleButton ='Sử dụng';
                    }
                    else{
                         $scope.titleModal ='Bạn có muốn xóa logo này không ?';
                         $scope.titleButton ='Xóa';
                    }
                    $scope.logo.typeAction = type;
                    $scope.logo.csrf = csrf;
                    $scope.ok = function () {
                        $modalInstance.close();
                       $scope.getLogo();
                    };

                    $scope.cancel = function () {
                        $modalInstance.dismiss('cancel');
                    };

                },
                size: size,
                scope:$scope,
                resolve: {
                    csrf: function () {
                      return configService.getToken();
                    },
                    logo:function(){
                        return logo;
                    }
                },
                backdrop:'static',
                 windowClass: "modal fade in"


            });

            modalInstance.result.then(function (selectedItem) {
                $scope.selected = selectedItem;
            }, function () {
                $log.info('Modal dismissed at: ' + new Date());
            });
    };
    $scope.activeDelete = function(logo){
        $scope.disabled_modal = true;
        logoService.activeDelete(angular.toJson(logo),function(data){
            if(data){
               // alertCreateSuccess();
                $scope.ok();
                $scope.disabled_modal = false;
            }
            else{
                alertErrors();
                 $scope.cancel();
            }
        });
    }
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
});

// app.directive("fileread", [function () {
//     return {
//         scope: {
//             fileread: "="
//         },
//         link: function (scope, element, attributes) {
//             element.bind("change", function (changeEvent) {
//                 var reader = new FileReader();
//                 reader.onload = function (loadEvent) {
//                     $('#logo_tmp').attr('src', loadEvent.target.result);
//                     scope.$apply(function () {
//                         scope.fileread = loadEvent.target.result;
//                          // $("#employer_logo_tmp").src = loadEvent.target.result;
//                     });
//                     //$("#employer_logo_tmp").src = reader.result;
//                 }
//                // reader.onloadend = function () {
                
//              // }
//                reader.readAsDataURL(changeEvent.target.files[0]);
//               //  reader.onloadend = function () {
//               //   $("#employer_logo_tmp").src = reader.result;
//               // }
//             });
//         }
//     }
// }]);

//slide controller
app.controller('slideController', function (slideService,configService,$scope, $http, $timeout,cfpLoadingBar,$modal,$log,$window,$filter) {
    $scope.base_url = config.base_url;
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
    $scope.slideActive = [];
    // $scope.getSlideActive = function(dataSlide){
    //     // for (var i = 0; i < data.length; i++) {
    //     //     if(data[i].config_is_active == 1)
    //     //         $scope.slideActive.push(data[i]);
    //     // };
    //     // for( var i in dataSlide ) {
    //     //     if(dataSlide[i].config_is_active == 1)
    //     //          $scope.slideActive.push(dataSlide[i]);
    //     // }
    //     // console.log(dataSlide.length);
    // }
    $scope.getSlide = function(typeOption){
        $scope.slideActive = [];
        //$scope.pagedItems =[];
        $scope.start();
        console.log("start call service");
        slideService.getListSlide(typeOption,function(data){
        //console.log(data.length);
         for (var i = 0; i < data.length; i++) {
            if(data[i].config_is_active == true)
                $scope.slideActive.push(data[i]);
        };
        //console.log($scope.slideActive);
        //$scope.getSlideActive(data);
        //$http.get(pathWebsite + 'admin/manager/getListManager').success(function(data){
        $scope.pagedItems = data;    
        //console.log(data);
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
      $("#slideTable").removeClass('hide');
      $("#slideActiveDiv").removeClass('hide');
      $("#div-data-loading").addClass('hide');
    };
    $scope.reloadSlide = function(typeOption){
        $scope.getSlide(typeOption);
    };

    $scope.openModalUploadSlide = function(type,size){
        var modalInstance = $modal.open({
                animation: false,//$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-upload-image-slide.php',
                controller: function ($scope, $modalInstance,csrf,typeOption){
                    $scope.slide = {};
                    $scope.typeOption = typeOption;
                    $scope.slide.slideName='';
                    $scope.slide.slideExtension='';
                    $scope.slideObject ={};
                    $scope.slide.csrf = csrf;
                    $scope.ok = function () {
                        //$scope.message="changed";
                         
                        $modalInstance.close();
                       $scope.getSlide(type);
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
                      return configService.getToken();
                    },
                    typeOption:function(){
                        return type;
                    }
                },
                backdrop:'static',
                 windowClass: "modal fade in"


            });

            modalInstance.result.then(function (selectedItem) {
                $scope.selected = selectedItem;
            }, function () {
                $log.info('Modal dismissed at: ' + new Date());
            });
    };
    $scope.uploadSlide = function(type,slide,slideObject){
        $scope.disabled_modal = true;
        console.log(slideObject);
        slideService.uploadSlide(type,angular.toJson(slide),slideObject,function(data){
            if(data){
                alertCreateSuccess();
                $scope.ok();
                $scope.disabled_modal = false;
                //$scope.getemployers();
                //$scope.pagedItems[$scope.pagedItems.length] = data;

            }
            else{
                alertErrors();
                 $scope.cancel();
            }
        });

         
    };

    $scope.uploadFileSlide = function(files) {
        $scope.fileTypeValidate = false;
        $scope.fileSizeValidate = false;
        var type = files[0].type; //MIME type
        var size = files[0].size;
        if(type.indexOf("image/") == -1){
            $scope.fileTypeValidate = true;
        } //File size in bytes
        if(parseInt(size) > 2097152 ){
            $scope.fileSizeValidate = true;
        }
        console.log(files[0].name);
        $scope.slide.slideName = files[0].name;
        //$scope.employer.slideExtension = files[0].type;
    }; 
    $scope.selectedSlide = function(type,slide){
        slideService.activeSlide(type,slide.config_id,function(data){
            if(data){
                slide.disabledAction = true;
                $scope.slideActive.push(slide);
                // $scope.slideActive =[];
               // $scope.slideActive.push(slide);
               //$scope.getSlide();
            }
        });
       

    }
    $scope.removeSlide = function(type,slide){
        console.log(slide.config_id);
        slideService.deactiveSlide(type,slide.config_id,function(data){
            if(data){
                //slide.disabledAction = false;
                //$scope.slideActive =[];
               // $scope.slideActive.push(slide);
               //$scope.getSlide();
               $scope.removeObjectArray(slide);
               $scope.disabledButton(slide);
            }
        });
    }
    $scope.removeObjectArray = function (slide){
        $.each($scope.slideActive, function(i){
            if($scope.slideActive[i] === slide) {
                $scope.slideActive.splice(i,1);
                return false;
            }
        });
    }
    $scope.disabledButton = function(slide){
        //console.log("slide" + slide);
        //console.log("slide list" + $scope.pagedItems);
        $.each($scope.pagedItems, function(i){
            if($scope.pagedItems[i].config_id === slide.config_id) {
                $scope.pagedItems[i].disabledAction = false;
                $scope.pagedItems[i].config_is_active = false;
                console.log("disabled");
                return false;
            }
        });
    }
    $scope.openModalDeleteSlide = function(type,size,slide){
        var modalInstance = $modal.open({
                animation: false,//$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-delete-slide.php',
                controller: function ($scope, $modalInstance,slide,csrf,typeOption){
                    $scope.slide = slide;
                    $scope.typeOption = typeOption;
                    // if(type == '0'){
                    //      $scope.titleModal ='Bạn có muốn sử dụng hình này làm slide website không ?';
                    //      $scope.titleButton ='Sử dụng';
                    // }
                    // else{
                    //      $scope.titleModal ='Bạn có muốn xóa slide này không ?';
                    //      $scope.titleButton ='Xóa';
                    // }
                    // $scope.slide.typeAction = type;
                    $scope.slide.csrf = csrf;
                    $scope.ok = function () {
                        $modalInstance.close();
                       $scope.getSlide(type);
                    };

                    $scope.cancel = function () {
                        $modalInstance.dismiss('cancel');
                    };

                },
                size: size,
                scope:$scope,
                resolve: {
                    csrf: function () {
                      return configService.getToken();
                    },
                    slide:function(){
                        return slide;
                    },
                    typeOption:function(){
                        return type;
                    }
                },
                backdrop:'static',
                 windowClass: "modal fade in"


            });

            modalInstance.result.then(function (selectedItem) {
                $scope.selected = selectedItem;
            }, function () {
                $log.info('Modal dismissed at: ' + new Date());
            });
    };
    $scope.deleteSlide = function(type,slide){
        $scope.disabled_modal = true;
        slideService.deleteSlide(type,angular.toJson(slide),function(data){
            if(data){
               // alertCreateSuccess();
                $scope.ok();
                $scope.disabled_modal = false;
            }
            else{
                alertErrors();
                 $scope.cancel();
            }
        });
    }
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
});

app.controller('titleSiteController', function (titleSiteService,configService,$scope, $http, $timeout,cfpLoadingBar,$modal,$log,$window,$filter) {
    $scope.formatDate = function(date){
          var dateOut = new Date(date);
          return dateOut;
    };



    $scope.filteredItems =  [];
    $scope.groupedItems  =  [];
    $scope.itemsPerPage  =  5;
    $scope.pagedItems    =  [];
    $scope.currentPage   =  0;
    $scope.messageProcess = true;
    $scope.reloadTitleSite = function(){
        $scope.getTitleSite();
    };
    
    $scope.getTitleSite = function(){
        //console.log("start get datta");
        $scope.start();
        titleSiteService.getListTitleSite(function(data){
        $scope.pagedItems = data;    
        //console.log(data);
        $scope.search='';
        //$scope.itemsPerPage  =  5;
        $scope.currentPage = 1; //current page
        $scope.entryLimit = 20; //max no of items to display in a page
        $scope.filteredItems = $scope.pagedItems.length; //Initially for no filter  
        $scope.totalItems = $scope.pagedItems.length;
        //console.log("get data finish");
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
      $("#siteTable").removeClass('hide');
      $("#div-data-loading").addClass('hide');
    }


    $scope.openModalCreateTitleSite = function(size){
        var modalInstance = $modal.open({
                animation: false,///$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-create-title-site.php',
                controller: function ($scope, $modalInstance,csrf){
                    $scope.site = {};
                    $scope.site.csrf = csrf;
                    
                    $scope.ok = function () {
                        $modalInstance.close($scope.site);

                        $scope.getTitleSite();
                    };

                    $scope.cancel = function () {
                        $modalInstance.dismiss('cancel');
                        //console.log(ddToDms($("#latitude").text(),$("#longitude").text()));
                    };

                },
                size: size,
                resolve: {
                    csrf:function(){
                        return configService.getToken();
                    }
                },
                scope:$scope,
                backdrop:'static',
                 windowClass: "modal fade in"

            });

            modalInstance.result.then(function (selectedItem) {
                $scope.selected = selectedItem;

            }, function () {
                $log.info('Modal dismissed at: ' + new Date());
            });
    };
    $scope.createTitleSite = function(site){
        $scope.disabled_modal = true;
             if(site){
                titleSiteService.createTitleSite(angular.toJson(site),function(data){
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
    $scope.activeSite = function(data,active){
         titleSiteService.selectedTitleSite(data.config_id,active,function(data){
            if(data){
                //slide.disabledAction = true;
                ///$scope.slideActive.push(slide);
                // $scope.slideActive =[];
               // $scope.slideActive.push(slide);
               //$scope.getSlide();
               //data.config_is_active = (active == 1) ? 0 : 1;
               //console.log(data);
               $scope.getTitleSite();
            }
        });
    }
    
    $scope.openModalDeleteTitleSite = function(size,site){
        var modalInstance = $modal.open({
                animation: false,///$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-delete-title-site.php',
                controller: function ($scope, $modalInstance, site,csrf){
                    $scope.site = site;
                    $scope.site.csrf = csrf;
                    //$scope.province.objectRegion = {region_id:province.province_map_region,region_name:province.region_name};
                    //console.log($scope.province.objectRegion);
                    //$scope.province.regions = regions;
                    $scope.ok = function () {
                        $modalInstance.close($scope.site);

                        $scope.getTitleSite();
                    };

                    $scope.cancel = function () {
                        $modalInstance.dismiss('cancel');
                        //console.log(ddToDms($("#latitude").text(),$("#longitude").text()));
                    };

                },
                size: size,
                resolve: {
                    site: function () {
                        return site;
                    },
                    csrf:function(){
                        return provinceService.getToken();
                    }
                },
                scope:$scope,
                backdrop:'static',
                 windowClass: "modal fade in"

            });

            modalInstance.result.then(function (selectedItem) {
                $scope.selected = selectedItem;

            }, function () {
                $log.info('Modal dismissed at: ' + new Date());
            });
    };
    $scope.deleteTitleSite = function(site){
        $scope.disabled_modal = true;
             if(site){
                titleSiteService.deleteTitleSite(angular.toJson(site),function(data){
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

});

app.directive("fileread", [function () {
    return {
        scope: {
            fileread: "="
        },
        link: function (scope, element, attributes) {
            element.bind("change", function (changeEvent) {
                var reader = new FileReader();
                reader.onload = function (loadEvent) {
                    $('#logo_tmp').attr('src', loadEvent.target.result);
                    scope.$apply(function () {
                        scope.fileread = loadEvent.target.result;
                         // $("#employer_logo_tmp").src = loadEvent.target.result;
                    });
                    //$("#employer_logo_tmp").src = reader.result;
                }
               // reader.onloadend = function () {
                
             // }
               reader.readAsDataURL(changeEvent.target.files[0]);
              //  reader.onloadend = function () {
              //   $("#employer_logo_tmp").src = reader.result;
              // }
            });
        }
    }
}]);
// app.directive("fileslide", [function () {
//     return {
//         scope: {
//             fileread: "="
//         },
//         link: function (scope, element, attributes) {
//             element.bind("change", function (changeEvent) {
//                 var reader = new FileReader();
//                 reader.onload = function (loadEvent) {
//                     $('#logo_tmp').attr('src', loadEvent.target.result);
//                     scope.$apply(function () {
//                         scope.fileread = loadEvent.target.result;
//                          // $("#employer_logo_tmp").src = loadEvent.target.result;
//                     });
//                     //$("#employer_logo_tmp").src = reader.result;
//                 }
//                // reader.onloadend = function () {
                
//              // }
//                reader.readAsDataURL(changeEvent.target.files[0]);
//               //  reader.onloadend = function () {
//               //   $("#employer_logo_tmp").src = reader.result;
//               // }
//             });
//         }
//     }
// }]);