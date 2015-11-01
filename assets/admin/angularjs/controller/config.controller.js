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
    }).filter('convertJson',function(){
        return function (value,keyWord){
            var objectJson = $.parseJSON(value);
            //if(type){
                console.log('keyWord'+keyWord);
            return objectJson[keyWord];
            //}
            //else return objectJson.file_tmp;
        }
    }).filter('formatDateFilter',function(){
        return function(value){
            var d = value.substring(0,10);//new Date(date);
           d = d.split("-");
           d.reverse();
           return d[0]+'/'+d[1]+'/'+d[2];
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
        if(parseInt(size) > 10097152 ){
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
          var d = date.substring(0,10);//new Date(date);
           d = d.split("-");
           d.reverse();
           return d[0]+'/'+d[1]+'/'+d[2];
    };



    $scope.filteredItems =  [];
    $scope.groupedItems  =  [];
    $scope.itemsPerPage  =  5;
    $scope.pagedItems    =  [];
    $scope.currentPage   =  0;
    $scope.messageProcess = true;
    $scope.reloadTitleSite = function(option){
        $scope.getTitleSite(option);
    };
    
    $scope.getTitleSite = function(option){
        //console.log("start get datta");
        $scope.start();
        titleSiteService.getListTitleSite(option,function(data){
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


    $scope.openModalCreateTitleSite = function(size,option){
        var modalInstance = $modal.open({
                animation: false,///$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-create-title-site.php',
                controller: function ($scope, $modalInstance,csrf,option){
                    $scope.site = {};
                    $scope.site.csrf = csrf;
                    $scope.option = option;
                    if(!option){
                        $scope.site.titleModal = 'Tạo mới slogan site.';
                    }
                    else{
                        $scope.site.titleModal = 'Tạo mới tiêu đề site.';
                    }
                    $scope.ok = function () {
                        $modalInstance.close($scope.site);

                        $scope.getTitleSite(option);
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
                    },
                    option:function(){
                        return option;
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
    $scope.createTitleSite = function(site,option){
        console.log('option'+option);
        $scope.disabled_modal = true;
             if(site){
                titleSiteService.createTitleSite(angular.toJson(site),option,function(data){
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
    $scope.activeSite = function(data,active,option){
         titleSiteService.selectedTitleSite(data.config_id,active,option,function(data){
            if(data){
                //slide.disabledAction = true;
                ///$scope.slideActive.push(slide);
                // $scope.slideActive =[];
               // $scope.slideActive.push(slide);
               //$scope.getSlide();
               //data.config_is_active = (active == 1) ? 0 : 1;
               //console.log(data);
               $scope.getTitleSite(option);
            }
        });
    }
    
    $scope.openModalDeleteTitleSite = function(size,site,option){
        var modalInstance = $modal.open({
                animation: false,///$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-delete-title-site.php',
                controller: function ($scope, $modalInstance, site,csrf,option){
                    $scope.site = site;
                    $scope.site.csrf = csrf;
                    $scope.option = option;
                    //$scope.province.objectRegion = {region_id:province.province_map_region,region_name:province.region_name};
                    //console.log($scope.province.objectRegion);
                    //$scope.province.regions = regions;
                    $scope.ok = function () {
                        $modalInstance.close($scope.site);

                        $scope.getTitleSite(option);
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
                        return configService.getToken();
                    },
                    option:function(){
                        return option;
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
    $scope.deleteTitleSite = function(site,option){
        $scope.disabled_modal = true;
             if(site){
                titleSiteService.deleteTitleSite(angular.toJson(site),option,function(data){
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



app.controller('adwordsController', function (adwordsService,configService,$scope, $http, $timeout,cfpLoadingBar,$modal,$log,$window,$filter) {
    $scope.formatDate = function(date){
          var d = date.substring(0,10);//new Date(date);
           d = d.split("-");
           d.reverse();
           return d[0]+'/'+d[1]+'/'+d[2];
    };
    $scope.filteredItems =  [];
    //$scope.groupedItems  =  [];
    //$scope.itemsPerPage  =  5;
    $scope.adwords    =  [];
   // $scope.currentPage   =  0;
    //$scope.messageProcess = true;
    //$scope.reloadTitleSite = function(option){
        //$scope.getTitleSite(option);
    //};
    
    $scope.getAdwords = function(option){
        //console.log("start get datta");
        $scope.start();
        adwordsService.getListAdwords(function(data){
        $scope.adwords = data;    
        //console.log(data);
       // $scope.search='';
        //$scope.itemsPerPage  =  5;
        //$scope.currentPage = 1; //current page
        //$scope.entryLimit = 20; //max no of items to display in a page
        $scope.filteredItems = $scope.adwords.length; //Initially for no filter  
        //$scope.totalItems = $scope.pagedItems.length;
        //console.log("get data finish");
        if($scope.filteredItems == 0){
           $("#div-no-data-loading").removeClass('hide');
        }

        
        //console.log("height"+$scope.getHeightPlan());
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
      $("#adwords").removeClass('hide');
      $("#div-data-loading").addClass('hide');
      console.log("loadfinish");
      //$(".plan").css("height",$scope.getHeightPlan());
    }
    $scope.editAdwords = function(id){
        $scope.adword.header="sida";
        console.log("sida");
    }
    $scope.openModalEditAdword = function(size,adword){
         var modalInstance = $modal.open({
                animation: false,///$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-update-adwords.php',
                controller: function ($scope, $modalInstance,csrf,adword){
                    $scope.adword = {};
                    $scope.adword = adword;
                    var objectJson = $.parseJSON(adword.config_data_json);
                    $scope.adword.csrf = csrf;
                    $scope.adword.title = objectJson.title;
                    $scope.adword.type = objectJson.type;
                    $scope.adword.view = objectJson.view;
                    $scope.adword.expDate = objectJson.expDate;
                    $scope.adword.price = objectJson.price;
                    $scope.adword.highlight = objectJson.highlight;
                    
                    $scope.ok = function () {
                        $modalInstance.close($scope.adword);
                        $scope.getAdwords();
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
                    },
                    adword:function(){
                        return adword;
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
    }
    // $scope.openModalCreateTitleSite = function(size,option){
    //    
    // };
    $scope.updateAdword = function(adword){
        //console.log('option'+option);
        $scope.disabled_modal = true;
        console.log(adword);
             if(adword){
                adwordsService.updateAdword(angular.toJson(adword),function(data){
                    if(data){
                        alertEditSuccess();
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
app.controller('memberController', function (memberService,configService,$scope, $http, $timeout,cfpLoadingBar,$modal,$log,$window,$filter) {
    $scope.formatDate = function(date){
          var d = date.substring(0,10);//new Date(date);
           d = d.split("-");
           d.reverse();
           return d[0]+'/'+d[1]+'/'+d[2];
    };
    $scope.base_url = config.base_url;
    $scope.filteredItems =  [];
    $scope.groupedItems  =  [];
    $scope.membersActive = [];
    $scope.itemsPerPage  =  5;
    $scope.pagedItems    =  [];
    $scope.currentPage   =  0;
    $scope.messageProcess = true;
    $scope.reloadMember = function(option){
        $scope.getMembers();
    };
    
    $scope.getMembers = function(option){
        //console.log("start get datta");
        $scope.membersActive = [];
        $scope.start();
        memberService.getListMember(function(data){
        $scope.pagedItems = data;    
        for (var i = 0; i < data.length; i++) {
            if(data[i].config_is_active == true){
                $scope.membersActive.push(data[i]);
            }
        };
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


    //$scope.addPosition = function(){
        //var element = '<div class="col-sm-3 col-xs-12 margin-top-5"> <div class="member"></div></div>';
        // var objectPosition = {
        //     config_id:-1,
        //     config_code:'',
        //     config_content:'',
        //     config_data_json:'{"file":"member_default.png","file_tmp":"member_default.png","name":"","position":"","facebook":"","email":"","twitter":"","skype":"","phone":""}',
        //     config_is_active:0,
        //     config_is_delete:0,
        //     config_created_at:''
        // };
        // $scope.membersActive.push(objectPosition);

    //}
    $scope.addPosition = function(size){
         var modalInstance = $modal.open({
                animation: false,///$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-choice-member.php',
                controller: function ($scope, $modalInstance,members){
                    $scope.members = getMemberNotActive(members);
                    $scope.addOrChange = 0;
                    console.log($scope.members);
               
                    
                    $scope.ok = function () {
                        $modalInstance.close($scope.adword);
                        //$scope.getAdwords();
                        $scope.getMembers();
                    };

                    $scope.cancel = function () {
                        $modalInstance.dismiss('cancel');
                        //console.log(ddToDms($("#latitude").text(),$("#longitude").text()));
                    };

                },
                size: size,
                resolve: {
                    members:function(){
                        return $scope.pagedItems;
                    }
                },
                scope:$scope,
               
                windowClass: "modal fade in"

            });

            modalInstance.result.then(function (selectedItem) {
                $scope.selected = selectedItem;

            }, function () {
                $log.info('Modal dismissed at: ' + new Date());
            });
    }
    $scope.choiceMember = function(member){
       // $scope.membersActive.push(member);
        $scope.disabled_modal = true;
        //console.log(adword);
             if(member){
                memberService.choiceMember(member.config_id,function(data){
                    if(data){
                        //alertEditSuccess();
                        $scope.disabled_modal = false;
                        $scope.ok();
                    }
                    else{
                        alertErrors();
                        $scope.cancel();
                    }
                });
             }
        //$scope.ok();
    }
    $scope.changeMember = function(memberOld,memberNew){
        $scope.disabled_modal = true;
        //console.log(adword);
             if(memberOld && memberNew){
                console.log("start");
                memberService.changeMember(memberOld.config_id,memberNew.config_id,function(data){
                    console.log("data"+data);
                    if(data){
                        //alertEditSuccess();
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
    $scope.deleteMemberPosition = function(member){
        if(member){
                memberService.unchoiceMember(member.config_id,function(data){
                    if(data){
                        //alertEditSuccess();
                        //$scope.disabled_modal = false;
                        //$scope.ok();
                        $scope.getMembers();
                    }
                    else{
                        alertErrors();
                        //$scope.cancel();
                    }
                });
        }
    }
    $scope.changeMemberPosition = function(size,member){
        var modalInstance = $modal.open({
                animation: false,///$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-choice-member.php',
                controller: function ($scope, $modalInstance,members,member){
                    $scope.members = getMemberNotActive(members);
                    $scope.memberChange = member;
                    $scope.addOrChange = 1;
                    console.log($scope.members);
               
                    
                    $scope.ok = function () {
                        $modalInstance.close($scope.adword);
                        //$scope.getAdwords();
                        $scope.getMembers();
                    };

                    $scope.cancel = function () {
                        $modalInstance.dismiss('cancel');
                        //console.log(ddToDms($("#latitude").text(),$("#longitude").text()));
                    };

                },
                size: size,
                resolve: {
                    members:function(){
                        return $scope.pagedItems;
                    },
                    member:function(){
                        return member;
                    }
                },
                scope:$scope,
               
                windowClass: "modal fade in"

            });

            modalInstance.result.then(function (selectedItem) {
                $scope.selected = selectedItem;

            }, function () {
                $log.info('Modal dismissed at: ' + new Date());
            });
    }
    $scope.openModalCreateMember = function(size){
         var modalInstance = $modal.open({
                animation: false,///$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-create-member.php',
                controller: function ($scope, $modalInstance,csrf){
                    $scope.member = {};
                    $scope.member.csrf = csrf;
                    $scope.member.isActive = false;
                    $scope.member.avatarName='';
                    $scope.member.avatarExtension='';
                    $scope.avatarMemberObject ={};
                    $scope.ok = function () {
                        $modalInstance.close($scope.adword);
                        //$scope.getAdwords();
                        $scope.getMembers();
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
               
                windowClass: "modal fade in"

            });

            modalInstance.result.then(function (selectedItem) {
                $scope.selected = selectedItem;

            }, function () {
                $log.info('Modal dismissed at: ' + new Date());
            });
    }
    $scope.uploadAvatarMember = function(files) {
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
        $scope.member.avatarName = files[0].name;
        //$scope.employer.slideExtension = files[0].type;
    }; 
    $scope.createMember = function(member,avatarObject){
        $scope.disabled_modal = true;
        memberService.createMember(angular.toJson(member),avatarObject,function(data){
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
    }
    $scope.openModalEditMember = function(size,member){
         var modalInstance = $modal.open({
                animation: false,///$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-update-member.php',
                controller: function ($scope, $modalInstance,member,csrf){
                    $scope.member = member;
                    $scope.member.csrf = csrf;
                    var objectJson =  $.parseJSON(member.config_data_json);
                    $scope.member.name = objectJson['name'];
                    $scope.member.position = objectJson['position'];
                    $scope.member.mail = objectJson['email'];
                    $scope.member.phone = objectJson['phone'];
                    $scope.member.avatar_member = objectJson['file_tmp'];
                    $scope.member.file = objectJson['file_name'];
                    $scope.member.file_tmp =objectJson['file_tmp'];
                    $scope.member.avatarName='';
                    $scope.member.avatarExtension='';
                    $scope.avatarMemberObject ={};
                    console.log($scope.member.avatar_member);
                    $scope.ok = function () {
                        $modalInstance.close($scope.member);
                        //$scope.getAdwords();
                        $scope.getMembers();
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
                    },
                    member:function(){
                        return member;
                    }

                },
                scope:$scope,
               
                windowClass: "modal fade in"

            });

            modalInstance.result.then(function (selectedItem) {
                $scope.selected = selectedItem;

            }, function () {
                $log.info('Modal dismissed at: ' + new Date());
            });
    }
    $scope.updateMember = function(member,avatarObject){
        $scope.disabled_modal = true;
        memberService.updateMember(angular.toJson(member),avatarObject,function(data){
            if(data){
                alertEditSuccess();
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
    }
    $scope.openModalDeleteMember = function(size,member){
        var modalInstance = $modal.open({
                animation: false,///$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-delete-member.php',
                controller: function ($scope, $modalInstance,member,csrf){
                    $scope.member = member;
                    $scope.member.csrf = csrf;
                    //$scope.addOrChange = 1;
                    //console.log($scope.members);
               
                    
                    $scope.ok = function () {
                        $modalInstance.close($scope.adword);
                        //$scope.getAdwords();
                        $scope.getMembers();
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
                    },
                    member:function(){
                        return member;
                    }

                },
                scope:$scope,
               
                windowClass: "modal fade in"

            });

            modalInstance.result.then(function (selectedItem) {
                $scope.selected = selectedItem;

            }, function () {
                $log.info('Modal dismissed at: ' + new Date());
            });
    }
    $scope.deleteMember = function(member){
        $scope.disabled_modal = true;
        //console.log(adword);
             if(member){
               // console.log("start");
                memberService.deleteMember(angular.toJson(member),function(data){
                    console.log("data"+data);
                    if(data){
                        //alertEditSuccess();
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
    var getMemberNotActive = function(data){
        var arr = [];
        for (var i = 0; i < data.length; i++) {
            if(data[i].config_is_active == false){
                arr.push(data[i]);
            }
        };
        return arr;
    }
    $scope.complete = function () {
      cfpLoadingBar.complete();
      $("#memberTable").removeClass('hide');
      $("#div-data-loading").addClass('hide');
      $(".row-member").removeClass('hide');
    }
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


app.controller('videoController', function (videoService,configService,$scope, $http, $timeout,cfpLoadingBar,$modal,$log,$window,$filter) {
    $scope.formatDate = function(date){
          var d = date.substring(0,10);//new Date(date);
           d = d.split("-");
           d.reverse();
           return d[0]+'/'+d[1]+'/'+d[2];
    };

   $scope.base_url = config.base_url;
    $scope.filteredItems =  [];
    $scope.groupedItems  =  [];
   // $scope.membersActive = [];
    $scope.itemsPerPage  =  5;
    $scope.pagedItems    =  [];
    $scope.currentPage   =  0;
    $scope.messageProcess = true;
    // $scope.reloadMember = function(option){
    //     $scope.getMembers();
    // };
    $scope.getIframeSrc = function (video) {
        var objectJson = $.parseJSON(video.config_data_json);
        return $scope.base_url + 'uploads/config/video/' + objectJson['file_tmp'];
    };
    $scope.getVideos = function(){
        //console.log("start get datta");
        $scope.membersActive = [];
        $scope.start();
        videoService.getListVideos(function(data){
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
      $("#logoDiv").removeClass('hide');
      $("#div-data-loading").addClass('hide');
     // $(".row-member").removeClass('hide');
    }

    $scope.openModalActiveDelete = function(size,type,video){
        var modalInstance = $modal.open({
                animation: false,//$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-active-delete-video.php',
                controller: function ($scope, $modalInstance,video,csrf){
                    $scope.video = video;
                    if(type == '0'){
                         $scope.titleModal ='Bạn có muốn sử dụng video này không ?';
                         $scope.titleButton ='Sử dụng';
                    }
                    else{
                         $scope.titleModal ='Bạn có muốn xóa video này không ?';
                         $scope.titleButton ='Xóa';
                    }
                    $scope.video.typeAction = type;
                    $scope.video.csrf = csrf;
                    
                    $scope.ok = function () {
                        $modalInstance.close($scope.video);
                       $scope.getVideos();
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
                    video:function(){
                        return video;
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
    $scope.activeDeleteVideo = function(video){
        $scope.disabled_modal = true;
        videoService.activeDelete(angular.toJson(video),function(data){
            if(data){
               // alertCreateSuccess();
               //console.log(data);
                $scope.ok();
                $scope.disabled_modal = false;
            }
            else{
                alertErrors();
                 $scope.cancel();
            }
        });
    }

});

app.controller('numberRecruitmentController', function (numberRecruitmentService,configService,$scope, $http, $timeout,cfpLoadingBar,$modal,$log,$window,$filter) {
    $scope.formatDate = function(date){
          var d = date.substring(0,10);//new Date(date);
           d = d.split("-");
           d.reverse();
           return d[0]+'/'+d[1]+'/'+d[2];
    };

    $scope.base_url = config.base_url;
    $scope.filteredItems =  [];
    $scope.configRecruitments  =  [];
   // $scope.membersActive = [];
    // $scope.itemsPerPage  =  5;
    // $scope.pagedItems    =  [];
    $scope.reloadConfigNumRecruitment = function(){
        $scope.getConfigNumRecruitment();
    }
    $scope.getConfigNumRecruitment = function(){
        //console.log("start get datta");
        //$scope.membersActive = [];
        $scope.start();
        numberRecruitmentService.getConfigNumRecruitment(function(data){
        $scope.configRecruitments = data;    
        //console.log(data);
        //$scope.search='';
        //$scope.itemsPerPage  =  5;
        //$scope.currentPage = 1; //current page
        //$scope.entryLimit = 20; //max no of items to display in a page
        $scope.filteredItems = $scope.configRecruitments.length; //Initially for no filter  
       // $scope.totalItems = $scope.pagedItems.length;
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
      $("#configRecruitmentTable").removeClass('hide');
      $("#div-data-loading").addClass('hide');
     // $(".row-member").removeClass('hide');
    }

    $scope.openModalEditNumRecruitment = function(size,configRecruitment){
        var modalInstance = $modal.open({
                animation: false,//$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-config-number-recruitment.php',
                controller: function ($scope, $modalInstance,configRecruitment,csrf){
                    $scope.configRecruitment = configRecruitment;
                    $scope.configRecruitment.number = ($.parseJSON(configRecruitment.config_data_json)['number']);
                    $scope.configRecruitment.csrf = csrf;
                    
                    $scope.ok = function () {
                        $modalInstance.close($scope.configRecruitment);
                       $scope.getConfigNumRecruitment();
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
                    configRecruitment:function(){
                        return configRecruitment;
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
    $scope.updateConfigNumRecruitment = function(configRecruitment){
        $scope.disabled_modal = true;
        numberRecruitmentService.updateConfigNumRecruitment(angular.toJson(configRecruitment),function(data){
            if(data){
               // alertCreateSuccess();
               //console.log(data);
                $scope.ok();
                $scope.disabled_modal = false;
            }
            else{
                alertErrors();
                 $scope.cancel();
            }
        });
    }

});


app.controller('imageRecruitmentController', function (imageRecruitmentService,configService,$scope, $http, $timeout,cfpLoadingBar,$modal,$log,$window,$filter) {
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
    $scope.imageRecActive = [];
   
    $scope.getImageRecSrc = function (imageRec) {
        var objectJson = $.parseJSON(imageRec.config_data_json);
        return $scope.base_url + 'uploads/config/imgRecruitment/' + objectJson['file_tmp'];
    };
    $scope.getImageRec = function(){
        $scope.imageRecActive = [];
        //$scope.pagedItems =[];
        $scope.start();
        console.log("start call service");
        imageRecruitmentService.getImageRec(function(data){
        //console.log(data.length);
         for (var i = 0; i < data.length; i++) {
            if(data[i].config_is_active == true){
              $scope.imageRecActive.push(data[i]);
            }
        };
        //console.log($scope.imageRecActive);
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
      $("#imageRecTable").removeClass('hide');
      $("#imageRecActive").removeClass('hide');
      $("#div-data-loading").addClass('hide');
    };
    $scope.reloadImageRec = function(){
        $scope.getImageRec();
    };

    $scope.openModalUploadImageRec = function(size){
        var modalInstance = $modal.open({
                animation: false,//$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-upload-image-rec.php',
                controller: function ($scope, $modalInstance,csrf){
                    $scope.imageRec = {};
                    //$scope.typeOption = typeOption;
                    $scope.imageRec.imageRecName='';
                    $scope.imageRec.imageRecExtension='';
                    $scope.imageRecObject ={};
                    $scope.imageRec.csrf = csrf;
                    $scope.ok = function () {
                        //$scope.message="changed";
                         
                        $modalInstance.close();
                       $scope.getImageRec();
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
    $scope.uploadImageRec = function(imageRec,imageRecObject){
        $scope.disabled_modal = true;
        //console.log(slideObject);
        imageRecruitmentService.uploadImageRec(angular.toJson(imageRec),imageRecObject,function(data){
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

    $scope.uploadFileImageRec= function(files) {
        $scope.fileTypeValidate = false;
        $scope.fileSizeValidate = false;
        var type = files[0].type; //MIME type
        var size = files[0].size;
        if(type.indexOf("image/") == -1){
            $scope.fileTypeValidate = true;
        } //File size in bytes
        if(parseInt(size) > 10097152 ){
            $scope.fileSizeValidate = true;
        }
        console.log(files[0].name);
        $scope.imageRec.imageRecName = files[0].name;
        //$scope.employer.slideExtension = files[0].type;
    }; 
    $scope.selectedImageRec = function(imageRec){
        imageRecruitmentService.activeImageRec(imageRec.config_id,function(data){
            if(data){
                imageRec.disabledAction = true;
                $scope.imageRecActive= [];
                // $scope.slideActive =[];
               $scope.imageRecActive.push(imageRec);
               //$scope.getSlide();
            }
        });
       

    }
    $scope.removeImageRec= function(imageRec){
        //console.log(slide.config_id);
        imageRecruitmentService.deactiveImageRec(imageRec.config_id,function(data){
            if(data){
                imageRec.disabledAction = false;
                //$scope.slideActive =[];
               // $scope.slideActive.push(slide);
               //$scope.getSlide();
               $scope.imageRecActive = {};
               //$scope.disabledButton(slide);
            }
        });
    }
   
    $scope.openModalDeleteImageRec = function(size,imageRec){
        var modalInstance = $modal.open({
                animation: false,//$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-delete-image-rec.php',
                controller: function ($scope, $modalInstance,imageRec,csrf){
                    $scope.imageRec = imageRec;
                   // $scope.typeOption = typeOption;
                    $scope.imageRec.csrf = csrf;
                    $scope.ok = function () {
                        $modalInstance.close();
                       $scope.getImageRec();
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
                    imageRec:function(){
                        return imageRec;
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
    $scope.deleteImageRec = function(imageRec){
        $scope.disabled_modal = true;
        imageRecruitmentService.deleteImageRec(angular.toJson(imageRec),function(data){
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