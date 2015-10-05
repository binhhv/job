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
    });
app.controller('provinceController', function (provinceService,$scope, $http, $timeout,cfpLoadingBar,$modal,$log,$window,$filter) {
    
    $scope.filteredItems =  [];
    $scope.groupedItems  =  [];
    $scope.itemsPerPage  =  5;
    $scope.pagedItems    =  [];
    $scope.currentPage   =  0;
    $scope.messageProcess = true;
    $scope.reloadProvince = function(){
        $scope.getProvinces($scope.country);
    };
    $scope.getCountry = function (){
        provinceService.getListCountry(function(data){
            if(data.length > 0){
                $scope.country = data[0].country_id;
                $scope.getProvinces(data[0].country_id);
            }
    });
    };
    $scope.changeCountry = function(country){
        //console.log("Da"+   $scope.country);
        $scope.getProvinces(country);
    };
    $scope.getProvinces = function(country){
        //console.log("start get datta");
        $scope.start();
        provinceService.getListProvinceCountry(country,function(data){
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
      $("#provinceTable").removeClass('hide');
      $("#div-data-loading").addClass('hide');
    }

    $scope.modalUpdateProvince = function (size,selectedform) {
            // documentService.getToken(function(data){
            //     var obToken = JSON.parse(angular.toJson(data));
            //     selectedform.csrf_name = obToken['name'];
            //     selectedform.csrf_hash = obToken['hash'];
            // });
            var modalInstance = $modal.open({
                animation: false,///$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-update-province.php',
                controller: function ($scope, $modalInstance, province,regions,csrf){
                    $scope.province = province;
                    $scope.province.csrf = csrf;
                    $scope.province.objectRegion = {region_id:province.province_map_region,region_name:province.region_name};
                    console.log($scope.province.objectRegion);
                    $scope.province.regions = regions;
                    $scope.ok = function () {
                        $modalInstance.close($scope.province);

                        $scope.getProvinces($scope.country);
                    };

                    $scope.cancel = function () {
                        $modalInstance.dismiss('cancel');
                        //console.log(ddToDms($("#latitude").text(),$("#longitude").text()));
                    };

                },
                size: size,
                resolve: {
                    province: function () {
                        return selectedform;
                    },
                    regions:function(){
                        return provinceService.getListRegionCountry($scope.country);
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
        
        $scope.updateProvince = function(province){
            $scope.disabled_modal = true;
            if(province){
                var longitude = $("#longitude").text();
                var latitude = $("#latitude").text();
                var latlongDD = $("#province_long_lat").val();
                //alert(longitude);
                if(longitude.length > 0 && latitude.length > 0){
                    province.province_long = longitude;
                    province.province_lat = latitude;
                    province.province_long_lat = latlongDD;
                }
                provinceService.updateProvince(angular.toJson(province),function(data){
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

        $scope.openModalCreateProvince = function(size){
            var modalInstance = $modal.open({
                animation: false,///$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-create-province.php',
                controller: function ($scope, $modalInstance,regions,csrf){
                    $scope.province = {};
                    $scope.province.csrf = csrf;
                    $scope.province.province_type="Tỉnh";
                    if($scope.country == 1){
                        $scope.province.province_lat = '21.0314';
                        $scope.province.province_long='105.853';
                        $scope.province.province_long_lat='21 01 53N, 105 51 09E';
                    }
                    else{
                        $scope.province.province_lat = '35.673343';
                        $scope.province.province_long='139.710388';
                        $scope.province.province_long_lat='35 39 10.1952 N, 139 50 22.1208 E';    
                    }
                    $scope.province.objectRegion = (regions.length > 0) ? regions[0] : {} ;//{region_id:province.province_map_region,region_name:province.region_name};
                    //console.log($scope.province.objectRegion);
                    $scope.province.regions = regions;
                    $scope.ok = function () {
                        $modalInstance.close($scope.province);

                        $scope.getProvinces($scope.country);
                    };

                    $scope.cancel = function () {
                        $modalInstance.dismiss('cancel');
                        //console.log(ddToDms($("#latitude").text(),$("#longitude").text()));
                    };

                },
                size: size,
                resolve: {
                    regions:function(){
                        return provinceService.getListRegionCountry($scope.country);
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
        $scope.createProvince = function(province){
            $scope.disabled_modal = true;
            if(province){
                var longitude = $("#longitude").text();
                var latitude = $("#latitude").text();
                var latlongDD = $("#province_long_lat").val();
                //alert(longitude);
                if(longitude.length > 0 && latitude.length > 0){
                    province.province_long = longitude;
                    province.province_lat = latitude;
                    province.province_long_lat = latlongDD;
                }
                province.province_map_country = $scope.country;
                provinceService.createProvince(angular.toJson(province),function(data){
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
        };
        $scope.modalDeleteProvince = function(size,province){
            var modalInstance = $modal.open({
                animation: false,///$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-delete-province.php',
                controller: function ($scope, $modalInstance,province,csrf){
                    $scope.province = province;
                    $scope.province.csrf = csrf;
                    $scope.ok = function () {
                        $modalInstance.close($scope.province);

                        $scope.getProvinces($scope.country);
                    };

                    $scope.cancel = function () {
                        $modalInstance.dismiss('cancel');
                        //console.log(ddToDms($("#latitude").text(),$("#longitude").text()));
                    };

                },
                size: size,
                resolve: {
                    province: function () {
                        return province;
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
        $scope.deleteProvince = function(province){
             $scope.disabled_modal = true;
             if(province){
                provinceService.deleteProvince(angular.toJson(province),function(data){
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

app.controller('healthController', function (healthService,provinceService,$scope, $http, $timeout,cfpLoadingBar,$modal,$log,$window,$filter) {
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
    $scope.reloadHealth = function(){
        $scope.getHealth();
    };
    
    $scope.getHealth = function(){
        //console.log("start get datta");
        $scope.start();
        healthService.getListHealth(function(data){
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
      $("#healthTable").removeClass('hide');
      $("#div-data-loading").addClass('hide');
    }


    $scope.openModalCreateHealth = function(size){
        var modalInstance = $modal.open({
                animation: false,///$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-create-health.php',
                controller: function ($scope, $modalInstance,csrf){
                    $scope.health = {};
                    $scope.health.csrf = csrf;
                    
                    $scope.ok = function () {
                        $modalInstance.close($scope.health);

                        $scope.getHealth();
                    };

                    $scope.cancel = function () {
                        $modalInstance.dismiss('cancel');
                        //console.log(ddToDms($("#latitude").text(),$("#longitude").text()));
                    };

                },
                size: size,
                resolve: {
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
    $scope.createHealth = function(health){
        $scope.disabled_modal = true;
             if(health){
                healthService.createHealth(angular.toJson(health),function(data){
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
    $scope.openModalUpdateHealth = function(size,health){
        var modalInstance = $modal.open({
                animation: false,///$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-update-health.php',
                controller: function ($scope, $modalInstance, health,csrf){
                    $scope.health = health;
                    $scope.health.csrf = csrf;
                    //$scope.province.objectRegion = {region_id:province.province_map_region,region_name:province.region_name};
                    //console.log($scope.province.objectRegion);
                    //$scope.province.regions = regions;
                    $scope.ok = function () {
                        $modalInstance.close($scope.health);

                        $scope.getHealth();
                    };

                    $scope.cancel = function () {
                        $modalInstance.dismiss('cancel');
                        //console.log(ddToDms($("#latitude").text(),$("#longitude").text()));
                    };

                },
                size: size,
                resolve: {
                    health: function () {
                        return health;
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
    $scope.updateHealth = function(health){
        $scope.disabled_modal = true;
             if(health){
                healthService.updateHealth(angular.toJson(health),function(data){
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
    $scope.openModalDeleteHealth = function(size,health){
        var modalInstance = $modal.open({
                animation: false,///$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-delete-health.php',
                controller: function ($scope, $modalInstance, health,csrf){
                    $scope.health = health;
                    $scope.health.csrf = csrf;
                    //$scope.province.objectRegion = {region_id:province.province_map_region,region_name:province.region_name};
                    //console.log($scope.province.objectRegion);
                    //$scope.province.regions = regions;
                    $scope.ok = function () {
                        $modalInstance.close($scope.health);

                        $scope.getHealth();
                    };

                    $scope.cancel = function () {
                        $modalInstance.dismiss('cancel');
                        //console.log(ddToDms($("#latitude").text(),$("#longitude").text()));
                    };

                },
                size: size,
                resolve: {
                    health: function () {
                        return health;
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
    $scope.deleteHealth = function(health){
        $scope.disabled_modal = true;
             if(health){
                healthService.deleteHealth(angular.toJson(health),function(data){
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


//form of category controller
app.controller('formController', function (formService,provinceService,$scope, $http, $timeout,cfpLoadingBar,$modal,$log,$window,$filter) {
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
    $scope.reloadForm = function(){
        $scope.getForm();
    };
    
    $scope.getForm = function(){
        //console.log("start get datta");
        $scope.start();
        formService.getListForm(function(data){
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
      $("#formTable").removeClass('hide');
      $("#div-data-loading").addClass('hide');
    }


    $scope.openModalCreateForm = function(size){
        var modalInstance = $modal.open({
                animation: false,///$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-create-job-form.php',
                controller: function ($scope, $modalInstance,csrf){
                    $scope.jobForm = {};
                    $scope.jobForm.csrf = csrf;
                    
                    $scope.ok = function () {
                        $modalInstance.close($scope.jobForm);

                        $scope.getForm();
                    };

                    $scope.cancel = function () {
                        $modalInstance.dismiss('cancel');
                        //console.log(ddToDms($("#latitude").text(),$("#longitude").text()));
                    };

                },
                size: size,
                resolve: {
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
    $scope.createForm = function(jobForm){
        $scope.disabled_modal = true;
             if(jobForm){
                formService.createForm(angular.toJson(jobForm),function(data){
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
    $scope.openModalUpdateForm = function(size,jobForm){
        var modalInstance = $modal.open({
                animation: false,///$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-update-job-form.php',
                controller: function ($scope, $modalInstance, jobForm,csrf){
                    $scope.jobForm = jobForm;
                    $scope.jobForm.csrf = csrf;
                    //$scope.province.objectRegion = {region_id:province.province_map_region,region_name:province.region_name};
                    //console.log($scope.province.objectRegion);
                    //$scope.province.regions = regions;
                    $scope.ok = function () {
                        $modalInstance.close($scope.jobForm);

                        $scope.getForm();
                    };

                    $scope.cancel = function () {
                        $modalInstance.dismiss('cancel');
                        //console.log(ddToDms($("#latitude").text(),$("#longitude").text()));
                    };

                },
                size: size,
                resolve: {
                    jobForm: function () {
                        return jobForm;
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
    $scope.updateForm = function(jobForm){
        $scope.disabled_modal = true;
             if(jobForm){
                formService.updateForm(angular.toJson(jobForm),function(data){
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
    $scope.openModalDeleteForm = function(size,jobForm){
        var modalInstance = $modal.open({
                animation: false,///$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-delete-job-form.php',
                controller: function ($scope, $modalInstance, jobForm,csrf){
                    $scope.jobForm = jobForm;
                    $scope.jobForm.csrf = csrf;
                    //$scope.province.objectRegion = {region_id:province.province_map_region,region_name:province.region_name};
                    //console.log($scope.province.objectRegion);
                    //$scope.province.regions = regions;
                    $scope.ok = function () {
                        $modalInstance.close($scope.jobForm);

                        $scope.getForm();
                    };

                    $scope.cancel = function () {
                        $modalInstance.dismiss('cancel');
                        //console.log(ddToDms($("#latitude").text(),$("#longitude").text()));
                    };

                },
                size: size,
                resolve: {
                    jobForm: function () {
                        return jobForm;
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
    $scope.deleteForm = function(jobForm){
        $scope.disabled_modal = true;
             if(jobForm){
                formService.deleteForm(angular.toJson(jobForm),function(data){
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


//level controller

//form of category controller
app.controller('levelController', function (levelService,provinceService,$scope, $http, $timeout,cfpLoadingBar,$modal,$log,$window,$filter) {
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
    $scope.reloadLevel = function(){
        $scope.getLevel();
    };
    
    $scope.getLevel = function(){
        //console.log("start get datta");
        $scope.start();
        levelService.getListLevel(function(data){
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
      $("#levelTable").removeClass('hide');
      $("#div-data-loading").addClass('hide');
    }


    $scope.openModalCreateLevel = function(size){
        var modalInstance = $modal.open({
                animation: false,///$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-create-job-level.php',
                controller: function ($scope, $modalInstance,csrf){
                    $scope.jobLevel = {};
                    $scope.jobLevel.csrf = csrf;
                    
                    $scope.ok = function () {
                        $modalInstance.close($scope.jobLevel);

                        $scope.getLevel();
                    };

                    $scope.cancel = function () {
                        $modalInstance.dismiss('cancel');
                        //console.log(ddToDms($("#latitude").text(),$("#longitude").text()));
                    };

                },
                size: size,
                resolve: {
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
    $scope.createLevel = function(jobLevel){
        $scope.disabled_modal = true;
             if(jobLevel){
                levelService.createLevel(angular.toJson(jobLevel),function(data){
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
    $scope.openModalUpdateLevel = function(size,jobLevel){
        var modalInstance = $modal.open({
                animation: false,///$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-update-job-level.php',
                controller: function ($scope, $modalInstance, jobLevel,csrf){
                    $scope.jobLevel = jobLevel;
                    $scope.jobLevel.csrf = csrf;
                    //$scope.province.objectRegion = {region_id:province.province_map_region,region_name:province.region_name};
                    //console.log($scope.province.objectRegion);
                    //$scope.province.regions = regions;
                    $scope.ok = function () {
                        $modalInstance.close($scope.jobLevel);

                        $scope.getLevel();
                    };

                    $scope.cancel = function () {
                        $modalInstance.dismiss('cancel');
                        //console.log(ddToDms($("#latitude").text(),$("#longitude").text()));
                    };

                },
                size: size,
                resolve: {
                    jobLevel: function () {
                        return jobLevel;
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
    $scope.updateLevel = function(jobLevel){
        $scope.disabled_modal = true;
             if(jobLevel){
                levelService.updateLevel(angular.toJson(jobLevel),function(data){
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
    $scope.openModalDeleteLevel = function(size,jobLevel){
        var modalInstance = $modal.open({
                animation: false,///$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-delete-job-level.php',
                controller: function ($scope, $modalInstance, jobLevel,csrf){
                    $scope.jobLevel = jobLevel;
                    $scope.jobLevel.csrf = csrf;
                    //$scope.province.objectRegion = {region_id:province.province_map_region,region_name:province.region_name};
                    //console.log($scope.province.objectRegion);
                    //$scope.province.regions = regions;
                    $scope.ok = function () {
                        $modalInstance.close($scope.jobLevel);

                        $scope.getLevel();
                    };

                    $scope.cancel = function () {
                        $modalInstance.dismiss('cancel');
                        //console.log(ddToDms($("#latitude").text(),$("#longitude").text()));
                    };

                },
                size: size,
                resolve: {
                    jobLevel: function () {
                        return jobLevel;
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
    $scope.deleteLevel = function(jobLevel){
        $scope.disabled_modal = true;
             if(jobLevel){
                levelService.deleteLevel(angular.toJson(jobLevel),function(data){
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



//faq controller
app.controller('faqController', function (faqService,provinceService,$scope, $http, $timeout,cfpLoadingBar,$modal,$log,$window,$filter) {
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
    $scope.reloadFAQ = function(){
        $scope.getFAQ();
    };
    
    $scope.getFAQ = function(){
        //console.log("start get datta");
        $scope.start();
        faqService.getListFAQ(function(data){
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
      $("#faqTable").removeClass('hide');
      $("#div-data-loading").addClass('hide');
    }


    $scope.openModalCreateFAQ = function(size){
        var modalInstance = $modal.open({
                animation: false,///$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-create-faq.php',
                controller: function ($scope, $modalInstance,csrf){
                    $scope.faq = {};
                    $scope.faq.csrf = csrf;
                    
                    $scope.ok = function () {
                        $modalInstance.close($scope.faq);

                        $scope.getFAQ();
                    };

                    $scope.cancel = function () {
                        $modalInstance.dismiss('cancel');
                        //console.log(ddToDms($("#latitude").text(),$("#longitude").text()));
                    };

                },
                size: size,
                resolve: {
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
    $scope.createFAQ = function(faq){
        $scope.disabled_modal = true;
             if(faq){
                faqService.createFAQ(angular.toJson(faq),function(data){
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
    $scope.openModalUpdateFAQ = function(size,faq){
        var modalInstance = $modal.open({
                animation: false,///$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-update-faq.php',
                controller: function ($scope, $modalInstance, faq,csrf){
                    $scope.faq = faq;
                    $scope.faq.csrf = csrf;
                    //$scope.province.objectRegion = {region_id:province.province_map_region,region_name:province.region_name};
                    //console.log($scope.province.objectRegion);
                    //$scope.province.regions = regions;
                    $scope.ok = function () {
                        $modalInstance.close($scope.faq);

                        $scope.getFAQ();
                    };

                    $scope.cancel = function () {
                        $modalInstance.dismiss('cancel');
                        //console.log(ddToDms($("#latitude").text(),$("#longitude").text()));
                    };

                },
                size: size,
                resolve: {
                    faq: function () {
                        return faq;
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
    $scope.updateFAQ = function(faq){
        $scope.disabled_modal = true;
             if(faq){
                faqService.updateFAQ(angular.toJson(faq),function(data){
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
    $scope.openModalDeleteFAQ = function(size,faq){
        var modalInstance = $modal.open({
                animation: false,///$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-delete-faq.php',
                controller: function ($scope, $modalInstance, faq,csrf){
                    $scope.faq = faq;
                    $scope.faq.csrf = csrf;
                    //$scope.province.objectRegion = {region_id:province.province_map_region,region_name:province.region_name};
                    //console.log($scope.province.objectRegion);
                    //$scope.province.regions = regions;
                    $scope.ok = function () {
                        $modalInstance.close($scope.faq);

                        $scope.getFAQ();
                    };

                    $scope.cancel = function () {
                        $modalInstance.dismiss('cancel');
                        //console.log(ddToDms($("#latitude").text(),$("#longitude").text()));
                    };

                },
                size: size,
                resolve: {
                    faq: function () {
                        return faq;
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
    $scope.deleteFAQ = function(faq){
        $scope.disabled_modal = true;
             if(faq){
                faqService.deleteFAQ(angular.toJson(faq),function(data){
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

//career controller
app.controller('careerController', function (careerService,provinceService,$scope, $http, $timeout,cfpLoadingBar,$modal,$log,$window,$filter) {
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
    $scope.reloadCareer = function(){
        $scope.getCareer();
    };
    
    $scope.getCareer = function(){
        //console.log("start get datta");
        $scope.start();
        careerService.getListCareer(function(data){
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
      $("#careerTable").removeClass('hide');
      $("#div-data-loading").addClass('hide');
    }


    $scope.openModalCreateCareer = function(size){
        var modalInstance = $modal.open({
                animation: false,///$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-create-career.php',
                controller: function ($scope, $modalInstance,csrf){
                    $scope.career = {};
                    $scope.career.csrf = csrf;
                    
                    $scope.ok = function () {
                        $modalInstance.close($scope.career);

                        $scope.getCareer();
                    };

                    $scope.cancel = function () {
                        $modalInstance.dismiss('cancel');
                        //console.log(ddToDms($("#latitude").text(),$("#longitude").text()));
                    };

                },
                size: size,
                resolve: {
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
    $scope.createCareer = function(career){
        $scope.disabled_modal = true;
             if(career){
                careerService.createCareer(angular.toJson(career),function(data){
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
    $scope.openModalUpdateCareer = function(size,career){
        var modalInstance = $modal.open({
                animation: false,///$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-update-career.php',
                controller: function ($scope, $modalInstance, career,csrf){
                    $scope.career = career;
                    $scope.career.csrf = csrf;
                    //$scope.province.objectRegion = {region_id:province.province_map_region,region_name:province.region_name};
                    //console.log($scope.province.objectRegion);
                    //$scope.province.regions = regions;
                    $scope.ok = function () {
                        $modalInstance.close($scope.career);

                        $scope.getCareer();
                    };

                    $scope.cancel = function () {
                        $modalInstance.dismiss('cancel');
                        //console.log(ddToDms($("#latitude").text(),$("#longitude").text()));
                    };

                },
                size: size,
                resolve: {
                    career: function () {
                        return career;
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
    $scope.updateCareer = function(career){
        $scope.disabled_modal = true;
             if(career){
                careerService.updateCareer(angular.toJson(career),function(data){
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
    $scope.openModalDeleteCareer = function(size,career){
        var modalInstance = $modal.open({
                animation: false,///$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-delete-career.php',
                controller: function ($scope, $modalInstance, career,csrf){
                    $scope.career = career;
                    $scope.career.csrf = csrf;
                    //$scope.province.objectRegion = {region_id:province.province_map_region,region_name:province.region_name};
                    //console.log($scope.province.objectRegion);
                    //$scope.province.regions = regions;
                    $scope.ok = function () {
                        $modalInstance.close($scope.career);

                        $scope.getCareer();
                    };

                    $scope.cancel = function () {
                        $modalInstance.dismiss('cancel');
                        //console.log(ddToDms($("#latitude").text(),$("#longitude").text()));
                    };

                },
                size: size,
                resolve: {
                    career: function () {
                        return career;
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
    $scope.deleteCareer = function(career){
        $scope.disabled_modal = true;
             if(career){
                careerService.deleteCareer(angular.toJson(career),function(data){
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



//contact form controller
app.controller('contactFormController', function (contactFormService,provinceService,$scope, $http, $timeout,cfpLoadingBar,$modal,$log,$window,$filter) {
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
    $scope.reloadContactForm = function(){
        $scope.getContactForm();
    };
    
    $scope.getContactForm = function(){
        //console.log("start get datta");
        $scope.start();
        contactFormService.getListContactForm(function(data){
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
      $("#contactFormTable").removeClass('hide');
      $("#div-data-loading").addClass('hide');
    }


    $scope.openModalCreateContactForm = function(size){
        var modalInstance = $modal.open({
                animation: false,///$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-create-contact-form.php',
                controller: function ($scope, $modalInstance,csrf){
                    $scope.contactform = {};
                    $scope.contactform.csrf = csrf;
                    
                    $scope.ok = function () {
                        $modalInstance.close($scope.contactform);

                        $scope.getContactForm();
                    };

                    $scope.cancel = function () {
                        $modalInstance.dismiss('cancel');
                        //console.log(ddToDms($("#latitude").text(),$("#longitude").text()));
                    };

                },
                size: size,
                resolve: {
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
    $scope.createContactForm = function(contactform){
        $scope.disabled_modal = true;
             if(contactform){
                contactFormService.createContactForm(angular.toJson(contactform),function(data){
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
    $scope.openModalUpdateContactForm = function(size,contactform){
        var modalInstance = $modal.open({
                animation: false,///$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-update-contact-form.php',
                controller: function ($scope, $modalInstance, contactform,csrf){
                    $scope.contactform = contactform;
                    $scope.contactform.csrf = csrf;
                    //$scope.province.objectRegion = {region_id:province.province_map_region,region_name:province.region_name};
                    //console.log($scope.province.objectRegion);
                    //$scope.province.regions = regions;
                    $scope.ok = function () {
                        $modalInstance.close($scope.contactform);

                        $scope.getContactForm();
                    };

                    $scope.cancel = function () {
                        $modalInstance.dismiss('cancel');
                        //console.log(ddToDms($("#latitude").text(),$("#longitude").text()));
                    };

                },
                size: size,
                resolve: {
                    contactform: function () {
                        return contactform;
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
    $scope.updateContactForm = function(contactform){
        $scope.disabled_modal = true;
             if(contactform){
                contactFormService.updateContactForm(angular.toJson(contactform),function(data){
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
    $scope.openModalDeleteContactForm = function(size,contactform){
        var modalInstance = $modal.open({
                animation: false,///$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-delete-contact-form.php',
                controller: function ($scope, $modalInstance, contactform,csrf){
                    $scope.contactform = contactform;
                    $scope.contactform.csrf = csrf;
                    //$scope.province.objectRegion = {region_id:province.province_map_region,region_name:province.region_name};
                    //console.log($scope.province.objectRegion);
                    //$scope.province.regions = regions;
                    $scope.ok = function () {
                        $modalInstance.close($scope.contactform);

                        $scope.getContactForm();
                    };

                    $scope.cancel = function () {
                        $modalInstance.dismiss('cancel');
                        //console.log(ddToDms($("#latitude").text(),$("#longitude").text()));
                    };

                },
                size: size,
                resolve: {
                    contactform: function () {
                        return contactform;
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
    $scope.deleteContactForm = function(contactform){
        $scope.disabled_modal = true;
             if(contactform){
                contactFormService.deleteContactForm(angular.toJson(contactform),function(data){
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


//salary controller
app.controller('salaryController', function (salaryService,provinceService,$scope, $http, $timeout,cfpLoadingBar,$modal,$log,$window,$filter) {
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
    $scope.reloadSalary= function(){
        $scope.getSalary();
    };
    
    $scope.getSalary = function(){
        //console.log("start get datta");
        $scope.start();
        salaryService.getListSalary(function(data){
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
      $("#salaryTable").removeClass('hide');
      $("#div-data-loading").addClass('hide');
    }


    $scope.openModalCreateSalary = function(size){
        var modalInstance = $modal.open({
                animation: false,///$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-create-salary.php',
                controller: function ($scope, $modalInstance,csrf){
                    $scope.salary = {};
                    $scope.salary.csrf = csrf;
                    
                    $scope.ok = function () {
                        $modalInstance.close($scope.salary);

                        $scope.getSalary();
                    };

                    $scope.cancel = function () {
                        $modalInstance.dismiss('cancel');
                        //console.log(ddToDms($("#latitude").text(),$("#longitude").text()));
                    };

                },
                size: size,
                resolve: {
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
    $scope.createSalary = function(salary){
        $scope.disabled_modal = true;
             if(salary){
                salaryService.createSalary(angular.toJson(salary),function(data){
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
    $scope.openModalUpdateSalary = function(size,salary){
        var modalInstance = $modal.open({
                animation: false,///$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-update-salary.php',
                controller: function ($scope, $modalInstance, salary,csrf){
                    $scope.salary = salary;
                    $scope.salary.csrf = csrf;
                    //$scope.province.objectRegion = {region_id:province.province_map_region,region_name:province.region_name};
                    //console.log($scope.province.objectRegion);
                    //$scope.province.regions = regions;
                    $scope.ok = function () {
                        $modalInstance.close($scope.salary);

                        $scope.getSalary();
                    };

                    $scope.cancel = function () {
                        $modalInstance.dismiss('cancel');
                        //console.log(ddToDms($("#latitude").text(),$("#longitude").text()));
                    };

                },
                size: size,
                resolve: {
                    salary: function () {
                        return salary;
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
    $scope.updateSalary = function(salary){
        $scope.disabled_modal = true;
             if(salary){
                salaryService.updateSalary(angular.toJson(salary),function(data){
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
    $scope.openModalDeleteSalary = function(size,salary){
        var modalInstance = $modal.open({
                animation: false,///$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-delete-salary.php',
                controller: function ($scope, $modalInstance, salary,csrf){
                    $scope.salary = salary;
                    $scope.salary.csrf = csrf;
                    //$scope.province.objectRegion = {region_id:province.province_map_region,region_name:province.region_name};
                    //console.log($scope.province.objectRegion);
                    //$scope.province.regions = regions;
                    $scope.ok = function () {
                        $modalInstance.close($scope.salary);

                        $scope.getSalary();
                    };

                    $scope.cancel = function () {
                        $modalInstance.dismiss('cancel');
                        //console.log(ddToDms($("#latitude").text(),$("#longitude").text()));
                    };

                },
                size: size,
                resolve: {
                    salary: function () {
                        return salary;
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
    $scope.deleteSalary = function(salary){
        $scope.disabled_modal = true;
             if(salary){
                salaryService.deleteSalary(angular.toJson(salary),function(data){
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



//welfare controller
app.controller('welfareController', function (welfareService,provinceService,$scope, $http, $timeout,cfpLoadingBar,$modal,$log,$window,$filter) {
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
    $scope.reloadWelfare= function(){
        $scope.getWelfare();
    };
    
    $scope.getWelfare = function(){
        //console.log("start get datta");
        $scope.start();
        welfareService.getListWelfare(function(data){
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
      $("#welfareTable").removeClass('hide');
      $("#div-data-loading").addClass('hide');
    }


    $scope.openModalCreateWelfare = function(size){
        var modalInstance = $modal.open({
                animation: false,///$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-create-welfare.php',
                controller: function ($scope, $modalInstance,csrf,icons){
                    $scope.welfare = {};
                    $scope.welfare.csrf = csrf;
                    $scope.welfare.icons = icons;
                    $scope.ok = function () {
                        $modalInstance.close($scope.welfare);

                        $scope.getWelfare();
                    };

                    $scope.cancel = function () {
                        $modalInstance.dismiss('cancel');
                        //console.log(ddToDms($("#latitude").text(),$("#longitude").text()));
                    };

                },
                size: size,
                resolve: {
                    csrf:function(){
                        return provinceService.getToken();
                    },
                    icons:function(){
                        return welfareService.getListIcon();
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
    $scope.createWelfare = function(welfare){
        $scope.disabled_modal = true;
             if(welfare){
                welfareService.createWelfare(angular.toJson(welfare),function(data){
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
    $scope.openModalUpdateWelfare = function(size,welfare){
        var modalInstance = $modal.open({
                animation: false,///$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-update-welfare.php',
                controller: function ($scope, $modalInstance, welfare,csrf,icons){
                    $scope.welfare = welfare;
                    $scope.welfare.csrf = csrf;
                    $scope.welfare.icons = icons;
                    //$scope.province.objectRegion = {region_id:province.province_map_region,region_name:province.region_name};
                    //console.log($scope.province.objectRegion);
                    //$scope.province.regions = regions;
                    $scope.ok = function () {
                        $modalInstance.close($scope.welfare);

                        $scope.getWelfare();
                    };

                    $scope.cancel = function () {
                        $modalInstance.dismiss('cancel');
                        //console.log(ddToDms($("#latitude").text(),$("#longitude").text()));
                    };

                },
                size: size,
                resolve: {
                    welfare: function () {
                        return welfare;
                    },
                    csrf:function(){
                        return provinceService.getToken();
                    },
                    icons:function(){
                        return welfareService.getListIcon();
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
    $scope.updateWelfare = function(welfare){
        $scope.disabled_modal = true;
             if(welfare){
                welfareService.updateWelfare(angular.toJson(welfare),function(data){
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
    $scope.openModalDeleteWelfare = function(size,welfare){
        var modalInstance = $modal.open({
                animation: false,///$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-delete-welfare.php',
                controller: function ($scope, $modalInstance, welfare,csrf){
                    $scope.welfare = welfare;
                    $scope.welfare.csrf = csrf;
                    //$scope.province.objectRegion = {region_id:province.province_map_region,region_name:province.region_name};
                    //console.log($scope.province.objectRegion);
                    //$scope.province.regions = regions;
                    $scope.ok = function () {
                        $modalInstance.close($scope.welfare);

                        $scope.getWelfare();
                    };

                    $scope.cancel = function () {
                        $modalInstance.dismiss('cancel');
                        //console.log(ddToDms($("#latitude").text(),$("#longitude").text()));
                    };

                },
                size: size,
                resolve: {
                    welfare: function () {
                        return welfare;
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
    $scope.deleteWelfare = function(welfare){
        $scope.disabled_modal = true;
             if(welfare){
                welfareService.deleteWelfare(angular.toJson(welfare),function(data){
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


