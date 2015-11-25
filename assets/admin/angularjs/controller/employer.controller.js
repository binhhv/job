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
app.controller('employerController', function (employerService,employerRecruitmentService,$scope, $http, $timeout,cfpLoadingBar,$modal,$log,$window) {
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
    $scope.checkCompareDate = function(dateCompare){
        var dateNow = new Date(Date.now());
        var dNow = dateNow.getDate();
        var mNow = (dateNow.getMonth()) +1;
        var yNow = dateNow.getFullYear();

        var d = dateCompare.substring(0,10);//new Date(date);
        d = d.split("-");
       if(d[0].length < 4){
            var temp = d[0];
            d[0] = d[2];
            d[2] = temp;
       }
       var result = true;
        //d.reverse();
          //console.log(d[2]);
        if(parseInt(d[0].trim()) < parseInt(yNow)){
            result = false;
            // console.log('y');
        }
        else if(d[1] < mNow){
            result =  false;
             //console.log('m');
        }
        else if(d[2] < dNow){
            result =  false;
             //console.log('d');
        }
       
        return result;
        //return d[0]+'/'+d[1]+'/'+d[2]; d[0]: ngày d[1]:tháng d[2]:năm

    }
    $scope.modalSwitchSearch = function(size,employer){
        var modalInstance = $modal.open({
                animation: false,//$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-switch-search-employer.php',
                controller: function ($scope, $modalInstance, employer,csrf){
                    $scope.employer = employer;
                    $scope.employer.csrf =  csrf;
                    if($scope.checkCompareDate(employer.employer_exp_search_rs) == 0 ){
                        $scope.employer.employer_is_search_rs = 0;
                    }
                    $scope.employer.employer_exp_search_rs = $scope.formatDateSearch(employer.employer_exp_search_rs);
                    $scope.ok = function () {
                        $modalInstance.close($scope.employer);

                        //$scope.getEmployers();
                    };

                    $scope.cancel = function () {
                        $modalInstance.dismiss('cancel');
                    };

                },
                size: size,
                resolve: {
                    employer: function () {
                        return employer;
                    },
                    csrf: function () {
                      return employerService.getTokenReturn();
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
    $scope.getSwitchImage = function(data){
        if(data){
            return base_url + 'assets/admin/dist/img/icons/switch_on.png';
        }
        else{
            return base_url + 'assets/admin/dist/img/icons/switch_off.png';
        }
    };
    $scope.switchSearch = function(employer){
        //employer.employer_is_search_rs == !employer.employer_is_search_rs;
        console.log(employer.employer_exp_search_rs);
        employer.employer_is_search_rs =  (employer.employer_is_search_rs == 1) ?  0 : 1;
        //console.log("click" + employer.employer_is_search_rs);
    }
    $scope.formatDateSearch = function(value){
         var d = value.substring(0,10);//new Date(date);
         //d = d.split("-");
         //d.reverse();
         //var newD = new Date(d[2],d[1],d[0]);
         //return newD;
        var dateParts = d.split("-");
        console.log(dateParts);
        if(dateParts[0].length >= 4){
             var jsDate = dateParts[2] + "-" +(dateParts[1])+ "-"+dateParts[0];
        }
        else{
             var jsDate = dateParts[0]+ "-" +(dateParts[1])+ "-"+ dateParts[2];
        }
       
        
        return jsDate;
    }
    $scope.setDateExpSearch = function(employer){
        console.log(employer.employer_exp_search_rs);
        if($scope.checkCompareDate(employer.employer_exp_search_rs) == 0 ){
                        $scope.employer.employer_is_search_rs = 0;
        }
        //console.log(employer.employer_exp_search_rs);
    }
    $scope.changeSwitchSearch = function(employer){
        if(employer){
            employerService.changeSwitchSearch(angular.toJson(employer),function(data){
                 if(data){
                    alertEditSuccess();
                     //$scope.disabled_modal = false;
                    $scope.ok();
                }
                else{
                    alertErrors();
                     $scope.cancel();
                }
            });
        }
    }
    $scope.modalUpdateEmployer = function (size,selectedemployer) {
            employerService.getToken(function(data){
                var obToken = JSON.parse(angular.toJson(data));
               //$log.info(obToken['name']);
                selectedemployer.csrf_name = obToken['name'];
                selectedemployer.csrf_hash = obToken['hash'];
            });
            //alert(data);
            var modalInstance = $modal.open({
                animation: false,//$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-update-employer.php',
                controller: function ($scope, $modalInstance, employer,listCountrys,listProvinces){
                    $scope.employer = employer;
                    $scope.employer.account_password = '';
                    $scope.employer.pathWebsite = pathWebsite;
                    $scope.employer.listCountrys = listCountrys;
                    $scope.employer.listProvinces = jQuery.parseJSON((JSON.stringify(listProvinces.data)));;
                    $scope.employer.provinceSelected = {province_id:employer.employer_map_province,province_name:employer.province_name};
                    $scope.employer.logoName='';
                    $scope.employer.logoExtension='';
                    $scope.logo ={};
                    console.log($scope.employer.provinceSelected);
                    $scope.ok = function () {
                        $modalInstance.close($scope.employer);

                        $scope.getEmployers();
                    };

                    $scope.cancel = function () {
                        $modalInstance.dismiss('cancel');
                    };

                },
                size: size,
                resolve: {
                    employer: function () {
                        return selectedemployer;
                    },
                    listCountrys:function(){
                        return employerRecruitmentService.getListCountryR();
                    },
                    listProvinces:function(){
                        return employerRecruitmentService.getListProvinceCountry(selectedemployer['employer_map_country']);
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
        $scope.file_changed = function(element) {

            $scope.$apply(function(scope) {
                 var photofile = element.files[0];
                 var reader = new FileReader();
                 reader.onload = function(e) {
                    console.log("ádasd");
                 };
                 reader.readAsDataURL(photofile);
                 console.log(photofile);
             });
        };
        $scope.updateEmployer = function(employer,logo){
             $scope.disabled_modal = true;
            console.log(employer);
         employerService.updateEmployer(angular.toJson(employer),logo,function(data){
                console.log(data);
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
    };
        $scope.changeCountryUpdateEmployer = function(){
            var idcountry = $scope.employer.employer_map_country;
            console.log(idcountry);
          employerRecruitmentService.getListProvinceCountry(idcountry).success(function(data){
                $scope.employer.listProvinces = data;
                 $scope.employer.provinceSelected =$scope.employer.listProvinces[0];
            });
            //$scope.employer.provinceSelected = [];
           
          //  employerRecruitmentService.getListProvinceRecruitmentChange($scope.rec['rec_id'],idcountry).success(function(data){
          //      $scope.rec.provinceSelected =data;
          //      console.log($scope.rec['rec_id'] + idcountry);
          //      console.log(data);
          //  });
            
        }
        $scope.modalDelete = function (size,selectedemployer) {

            employerService.getToken(function(data){
                var obToken = JSON.parse(angular.toJson(data));
               //$log.info(obToken['name']);
                selectedemployer.csrf_name = obToken['name'];
                selectedemployer.csrf_hash = obToken['hash'];
            });
            //alert(data);
            var modalInstance = $modal.open({
                animation: false,//$scope.animationsEnabled,
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
                        $scope.getEmployers();
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
                backdrop: 'static',
                 windowClass: "modal fade in"
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

    $scope.modalCreateEmployer = function (size,countrySelected) {

            
            var modalInstance = $modal.open({
                animation: false,//$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-create-employer.php',
                controller: function ($scope, $modalInstance,csrf,listCountrys,listProvinces){
                    $scope.employer = {};
                    $scope.employer.account_password = '';
                    $scope.employer.pathWebsite = pathWebsite;
                    $scope.employer.listCountrys = listCountrys;
                    $scope.employer.employer_map_country = listCountrys[0]['country_id'];
                    $scope.employer.listProvinces = jQuery.parseJSON((JSON.stringify(listProvinces.data)));;
                    var provincetmp = $scope.employer.listProvinces[0];
                    $scope.employer.provinceSelected =  {province_id:provincetmp['province_id'],province_name:provincetmp['province_name']};// listProvinces[0];
                    $scope.employer.logoName='';
                    $scope.employer.logoExtension='';
                    $scope.logo ={};
                    console.log($scope.employer.listProvinces[0]);
                    $scope.employer.csrf = csrf;
                    $scope.ok = function () {
                        //$scope.message="changed";
                         
                        $modalInstance.close();
                       $scope.getEmployers();
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
                    },
                    listCountrys:function(){
                        return employerRecruitmentService.getListCountryR();
                    },
                    listProvinces:function(){
                        return employerRecruitmentService.getListProvinceCountry(countrySelected);
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


    $scope.createEmployer = function(employer,logo){
        console.log("logoo==>"+ employer.logoName);
        $scope.disabled_modal = true;
        employerService.createEmployer(angular.toJson(employer),logo,function(data){
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
    $scope.reload = function(){
    $scope.getEmployers();
    }
    $scope.checkEmailEmployer = function(emailEmployer){
       //console.log(employerService.checkEmailExits(emailemployer));
       $timeout(function() {
            console.log(employerService.checkEmailExits(emailEmployer));
       }, 100);
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
        $scope.employer.logoName = files[0].name;
        //$scope.employer.logoExtension = files[0].type;
    }; 


      $scope.openCalendar = function($event) {
      $event.preventDefault();
      $event.stopPropagation();

      $scope.opened = true;
    };

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
                animation: false,//$scope.animationsEnabled,
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
                 windowClass: "modal fade in",
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
                animation: false,//$scope.animationsEnabled,
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
                animation: false,//$scope.animationsEnabled,
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
                 windowClass: "modal fade in",
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
    $scope.welfareSelected=[];
    $scope.getEmployerRecruitments = function(idemployer){
        //$scope.rec.welfareSelected =  null;
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




$scope.modalDetailEmployerRecruitment = function (size,idrec) {
            // jobseekerService.getToken(function(data){
            //     var obToken = JSON.parse(angular.toJson(data));
            //    //$log.info(obToken['name']);
            //     selecteduseremployer.csrf_name = obToken['name'];
            //     selecteduseremployer.csrf_hash = obToken['hash'];
            // });
            //alert(data);
           // console.log(selecteduseremployer);
           // $scope.listWelfares = [];
            var modalInstance = $modal.open({
                animation: false,//$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-detail-employer-recruitment.php',
                controller: function ($scope, $modalInstance, rec){
                    $scope.rec = rec;
                    $scope.rec.welfares = $.parseJSON($scope.rec.welfares);
                    $scope.rec.provinces = $.parseJSON($scope.rec.provinces);
                    //$scope.rec.listWelfares =rec.listWelfares;
                    //$scope.listWelfares = $scope.rec.welfares;
                    //$scope.welfares =JSON.parse(JSON.stringify($scope.rec.welfares));
                   console.log("==========="+$scope.rec.provinces);
                    //$scope.jobseeker.account_password = '';
                    $scope.ok = function () {
                        $modalInstance.close($scope.rec);
                       //var employerid = $scope.jobseeker['emac_map_employer'];
                       //$scope.getEmployerUsers(employerid);
                    };

                    $scope.cancel = function () {
                        $modalInstance.dismiss('cancel');
                    };

                },
                size: size,
                 windowClass: "modal fade in",
                resolve: {
                    rec: function () {
                        return employerRecruitmentService.getDetailEmployerRecruitment(idrec);
                    }
                }
            });

            modalInstance.result.then(function (selectedItem) {
                $scope.selected = selectedItem;
            }, function () {
                $log.info('Modal dismissed at: ' + new Date());
            });
        };

        //$scope.listProvinces = [];
//$scope.multipleDemo = {};
        $scope.modalUpdateEmployerRecruitment = function (size,selectedrecruitment) {
            employerUserService.getToken(function(data){
                var obToken = JSON.parse(angular.toJson(data));
               //$log.info(obToken['name']);
                selectedrecruitment.csrf_name = obToken['name'];
                selectedrecruitment.csrf_hash = obToken['hash'];
            });
            employerRecruitmentService.getListWelfare(function(data){
                selectedrecruitment.listWelfares = data;
            });
            employerRecruitmentService.getListForm(function(data){
                selectedrecruitment.listForms = data;
            });
            employerRecruitmentService.getListFormChild(function(data){
                selectedrecruitment.listFormChilds = data;
            });
            employerRecruitmentService.getListLevel(function(data){
                selectedrecruitment.listLevels = data;
            });
            employerRecruitmentService.getListContactForm(function(data){
                selectedrecruitment.listContactForms = data;
            });
            employerRecruitmentService.getListCountry(function(data){
                selectedrecruitment.listCountrys = data;
            });
            //selectedrecruitment.listProvinces = [];
            
            selectedrecruitment.listProvinces = [];
            employerRecruitmentService.getListProvinceCountry(selectedrecruitment['rec_job_map_country']).success(function(data){
                selectedrecruitment.listProvinces = data;
            });
           
            console.log( selectedrecruitment.listProvinces );

            selectedrecruitment.welfareSelected = [];
            $scope.getListWelfareEmployerRecruitment(selectedrecruitment['rec_id'],function(data){
                selectedrecruitment.welfareSelected = data;
            });
            selectedrecruitment.provinceSelected = [];
            employerRecruitmentService.getListProvinceRecruitment(selectedrecruitment['rec_id']).success(function(data){
               selectedrecruitment.provinceSelected =data;
               if(data.length >= 5){
                       $("#select-Province").addClass('hide');
                    }
           });
           

            
            console.log(selectedrecruitment.welfareSelected);
            
            var modalInstance = $modal.open({
                animation: false,//$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-update-employer-recruitment.php',
                controller: function ($scope, $modalInstance, rec,listCareers,listSalaries){
                    $scope.rec = rec;
                    console.log(rec);
                    $scope.rec.rec_job_time = new Date(rec.rec_job_time);
                    $scope.rec.welfareSelected = rec.welfareSelected;
                    $scope.rec.object_contact_form = {contact_form_id:rec.rec_contact_form,contact_form_type:rec.contact_form_type};
                    $scope.rec.object_form = {fjob_id:rec.rec_job_map_form,fjob_type:rec.fjob_typpe};
                    $scope.rec.object_form_child = {jcform_id:rec.rec_job_map_form_child,jcform_type:rec.jcform_type};
                    $scope.rec.object_level = {ljob_id:rec.rec_job_map_level,ljob_level:rec.ljob_level};
                    $scope.rec.object_career = {career_id:rec.rec_job_map_career,career_name:rec.career_name};
                    $scope.rec.object_salary ={salary_id:rec.salary_id,salary_value:rec.salary_value};
                    $scope.rec.listCareers = listCareers;
                    $scope.rec.listSalaries = listSalaries;
                    console.log(rec.provinceSelected.length);
                    
                    $scope.ok = function () {
                        $modalInstance.close($scope.rec);
                        
                       $scope.getEmployerRecruitments(rec['rec_map_employer']);
                    };

                    $scope.cancel = function () {
                        $modalInstance.dismiss('cancel');
                        //$scope.rec.welfareSelected = null;
                    };

                },
                size: size,
                resolve: {
                    rec: function () {
                        return selectedrecruitment;
                    },
                    listCareers:function(){
                        return employerRecruitmentService.getListCareer();
                    },
                    listSalaries:function(){
                        return employerRecruitmentService.getListSalary();
                    }
                },
                scope:$scope,
                backdrop: 'static',
                 windowClass: "modal fade in"
            });

            modalInstance.result.then(function (selectedItem) {
                $scope.selected = selectedItem;
            }, function () {
                $log.info('Modal dismissed at: ' + new Date());
            });
        };
        

        $scope.toggleSelection = function toggleSelection(welfareid) {
             var idx = $scope.rec.welfareSelected.indexOf(welfareid);

             // is currently selected
             if (idx > -1) {
               $scope.rec.welfareSelected.splice(idx, 1);
             }

             // is newly selected
             else {
               $scope.rec.welfareSelected.push(welfareid);
             }
             console.log($scope.rec.welfareSelected);
           };
        $scope.getListWelfareEmployerRecruitment = function(id,callback){
            employerRecruitmentService.getListWelfareEmployerRecruitment(id,function(data){
                var obj = data;
                var objarray = [];
                angular.forEach(obj, function(value, key) {
                  //console.log(key + ': ' + value['recmj_map_welfare']);
                  objarray.push(value['recmj_map_welfare']);
                });
                //objarray = data;
                callback(objarray);
            });
        };
        $scope.getListProvinceCountry = function(id,callback){
            employerRecruitmentService.getListProvinceCountry(id,function(data){
                var obj = data;
                var objarray = [];
                angular.forEach(obj, function(value, key) {
                  //console.log(key + ': ' + value['recmj_map_welfare']);
                  objarray.push(value['recmj_map_welfare']);
                });
                //objarray = data;
                callback(objarray);
            });
        }
        $scope.getListProvinceRecruitment = function(id,callback){
            employerRecruitmentService.getListProvinceRecruitment(id,function(data){
                //var obj = data;
                var objarray = [];
               // objarray = data;
               angular.forEach(data, function(value, key) {
                       //console.log("key :" + key + "value :" + value['province_name']);
                        objarray.push({province_id:value['province_id'],province_name:value['province_name']});//(selectedrecruitment.listProvinces[getIndexIfObjWithOwnAttr(selectedrecruitment.listProvinces,'province_id',value['province_id'])]);//
                    });
                callback(objarray);
            });
        }
        $scope.updateEmployerRecruitment = function(rec){
            console.log(rec);
            $scope.disabled_modal = true;
            if(rec){
            employerRecruitmentService.updateEmployerRecruitment(angular.toJson(rec),function(data){
                $scope.alertEditSuccess();
               $scope.disabled_modal = false;
                $scope.ok();
                console.log(data);
            });
            }
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
                animation: false,//$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-delete-employer-recruitment.php',
                controller: function ($scope, $modalInstance, recruitment){
                    $scope.recruitment = recruitment;
                    //$scope.jobseeker.account_password = '';
                    $scope.ok = function () {
                        $modalInstance.close($scope.recruitment);
                        $scope.getEmployerRecruitments(recruitment['rec_map_employer']);
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
                scope:$scope,
                 backdrop: 'static',
                  windowClass: "modal fade in"
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


        var getIndexIfObjWithOwnAttr = function(array, attr, value) {
                for(var i = 0; i < array.length; i++) {
                    if(array[i].hasOwnProperty(attr) && array[i][attr] === value) {
                        return i;
                    }
                }
                return -1;
            }

        
       $scope.changeCountry = function(){
         var idcountry = $scope.rec.rec_job_map_country;
          employerRecruitmentService.getListProvinceCountry(idcountry).success(function(data){
                $scope.rec.listProvinces = data;
            });
          $scope.rec.provinceSelected =[];
           employerRecruitmentService.getListProvinceRecruitmentChange($scope.rec['rec_id'],idcountry).success(function(data){
               $scope.rec.provinceSelected =data;
               console.log($scope.rec['rec_id'] + idcountry);
               console.log(data);
           });

       }
       $scope.changeCountryCreate = function(){
         var idcountry = $scope.rec.rec_job_map_country;
         console.log(idcountry);
          employerRecruitmentService.getListProvinceCountry(idcountry).success(function(data){
                $scope.rec.listProvinces = data;
            });
            $scope.rec.provinceSelected =[];
          //  employerRecruitmentService.getListProvinceRecruitmentChange($scope.rec['rec_id'],idcountry).success(function(data){
          //      $scope.rec.provinceSelected =data;
          //      console.log($scope.rec['rec_id'] + idcountry);
          //      console.log(data);
          //  });

       }
       //$scope.isFull = true;
       $scope.changeProvince = function(){
        var numSelected = $scope.rec.provinceSelected.length;
        if(numSelected >= 5){
           //$scope.rec.provinceSelected.splice(5,1);
             //$scope.isFull = false;
             //console.log($scope.rec.provinceSelected);
             $("#select-Province").addClass('hide');
        }
        else {
            $("#select-Province").removeClass('hide');
            //$scope.isFull = true;
            // $scope.listProvinces = [];
             //$scope.rec.provinceSelected = 
            //employerRecruitmentService.getListProvinceCountry($scope.rec.rec_job_map_country).success(function(data){
                //$scope.listProvinces = data;
           // });
            //$scope.rec.provinceSelected = $scope.rec.provinceSelected;
             //$scope.rec.provinceSelected = $scope.rec.provinceSelected;
            //var arrTmp = $scope.rec.listProvinces;
            //$scope.rec.listProvinces = []
            //$scope.rec.listProvinces = $scope.removeObjectInArray(arrTmp,$scope.rec.provinceSelected);
            //console.log($scope.rec.listProvinces);
        }

       }
       $scope.clickSelect = function(){
        console.log("click");
       }
       $scope.removeObjectInArray = function(arrParent,arrChild){
            var arrResult = arrParent;
            for(var i = 0 ; i < arrChild.length; i ++){
                  arrResult = $scope.removeFunction(arrResult,"province_id",arrChild[i]["province_id"]);  
                  //console.log(arrResult);
            }
            console.log("array remove" + arrResult.length);
            return arrResult;
       }
       $scope.removeFunction = function(myObjects,prop,valu)
        {
             return myObjects.filter(function (val) {
              return val[prop] !== valu;
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
    self.alertApproveSuccess = function(){
        $(".alert-message-approve").removeClass('hide');
                    $(".alert-message-approve").alert();
                    window.setTimeout(function() { $(".alert-message-approve").addClass('hide').fadeOut(); }, 1500);
    };

    ///create employer recruitment createEmployerRecruitment
     $scope.recruitmentCreate = {};
    $scope.modalCreateEmployerRecruitment = function (size,idemployer,countryGET) {
          
           
             console.log("call service");
           
            
            var modalInstance = $modal.open({
                animation: false,//$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-create-employer-recruitment.php',
                controller: function ($scope, $modalInstance,idemployer,csrf,listWelfares,listCountrys,listContactForms,listForms,listFormChilds,listLevels,listProvinces,listCareers,listSalaries){
                    //$log.info("get object");
                    console.log(listSalaries);
                    recruitmentCreate = {};
                    recruitmentCreate.provinceSelected = [];
                    recruitmentCreate.welfareSelected = [];
                    recruitmentCreate.csrf =csrf;
                    recruitmentCreate.listWelfares = listWelfares;
                    recruitmentCreate.listContactForms = listContactForms;
                    recruitmentCreate.listForms = listForms;
                    recruitmentCreate.listCountrys = listCountrys;
                    recruitmentCreate.listLevels = listLevels;
                    recruitmentCreate.listFormChilds = listFormChilds;
                    recruitmentCreate.listProvinces = jQuery.parseJSON((JSON.stringify(listProvinces.data)));
                    recruitmentCreate.listSalaries = listSalaries;
                    recruitmentCreate.csrf = csrf;
                    recruitmentCreate.idemployer = idemployer;
                    recruitmentCreate.listCareers = listCareers;
                    console.log(recruitmentCreate.listCountrys);
                    recruitmentCreate.rec_job_time = new Date();
                    //rec.welfareSelected = rec.welfareSelected;
                    recruitmentCreate.object_contact_form = (recruitmentCreate.listContactForms) ? recruitmentCreate.listContactForms[0] : {};//{contact_form_id:rec.rec_contact_form,contact_form_type:rec.contact_form_type};
                    recruitmentCreate.object_form = (recruitmentCreate.listForms) ?  recruitmentCreate.listForms[0] : [];//rec.listForms[0];//{fjob_id:rec.rec_job_map_form,fjob_type:rec.fjob_typpe};
                     recruitmentCreate.object_form_child = ( recruitmentCreate.listFormChilds) ? recruitmentCreate.listFormChilds[0] :{};//rec.listFormChilds[0];//{jcform_id:rec.rec_job_map_form_child,jcform_type:rec.jcform_type};
                     recruitmentCreate.object_level = ( recruitmentCreate.listLevels ) ? recruitmentCreate.listLevels[0] : {};//rec.listLevels[0];//{ljob_id:rec.rec_job_map_level,ljob_level:rec.ljob_level};
                    recruitmentCreate.rec_job_map_country =( recruitmentCreate.listCountrys) ? (recruitmentCreate.listCountrys[0]['country_id'] ): {};
                    recruitmentCreate.object_career = (recruitmentCreate.listCareers) ? (recruitmentCreate.listCareers[0]) : {};
                    recruitmentCreate.object_salary =(recruitmentCreate.listSalaries) ? (recruitmentCreate.listSalaries[0]) : {};
                    $scope.rec =recruitmentCreate;

                  
                    $scope.ok = function () {
                        $modalInstance.close($scope.recruitmentCreate);
                        
                       $scope.getEmployerRecruitments(idemployer);
                    };

                    $scope.cancel = function () {
                        $modalInstance.dismiss('cancel');
                        //$scope.rec.welfareSelected = null;
                    };

                },
                size: size,
                resolve: {
                    idemployer: function () {
                        return idemployer;
                    },
                    csrf: function(){
                        return employerRecruitmentService.getTokenReturn();
                    },
                    listWelfares: function(){
                        return employerRecruitmentService.getListWelfareR();
                    },
                    listForms:function(){
                        return employerRecruitmentService.getListFormR();
                    },
                    listFormChilds:function(){
                        return employerRecruitmentService.getListFormChildR();
                    },
                    listCountrys:function(){
                        return employerRecruitmentService.getListCountryR();
                    },
                    listLevels:function(){
                        return employerRecruitmentService.getListLevelR();
                    },
                    listProvinces:function(){
                        return employerRecruitmentService.getListProvinceCountry(countryGET);
                    },
                    listContactForms:function(){
                        return employerRecruitmentService.getListContactFormR();
                    },
                    listCareers:function(){
                        return employerRecruitmentService.getListCareer();
                    },
                    listSalaries:function(){
                        return employerRecruitmentService.getListSalary();
                    }

                    // recCreate:function(){
                    //     return selectedrecruitment;
                    // }
                },
                scope:$scope,
                backdrop: 'static',
                 windowClass: "modal fade in"
            });

            modalInstance.result.then(function (selectedItem) {
                $scope.selected = selectedItem;
            }, function () {
                $log.info('Modal dismissed at: ' + new Date());
            });
        };

        $scope.createEmployerRecruitment = function(rec){
            $scope.disabled_modal = true;
            if(rec){
                employerRecruitmentService.createEmployerRecruitment(angular.toJson(rec),function(data){
                    if(data){
                        alertCreateSuccess();
                        $scope.ok();
                        $scope.disabled_modal = false;
                    }
                    else{
                        alertErrors();
                        $scope.cancel();
                    }
                });
            }
        };
        $scope.changeProvinceCreate = function(){
        var numSelected = $scope.rec.provinceSelected.length;
        if(numSelected >= 5){
           //$scope.rec.provinceSelected.splice(5,1);
             //$scope.isFull = false;
             //console.log($scope.rec.provinceSelected);
             $("#select-Province").addClass('hide');
        }
        else {
            $("#select-Province").removeClass('hide');
            
        }

       };

       $scope.modalApproveRecruitment = function(size,selectedrecruitment){
            employerUserService.getToken(function(data){
                var obToken = JSON.parse(angular.toJson(data));
               //$log.info(obToken['name']);
                selectedrecruitment.csrf_name = obToken['name'];
                selectedrecruitment.csrf_hash = obToken['hash'];
            });
            //alert(data);
            //console.log(selectedrecruitment);
            var modalInstance = $modal.open({
                animation: false,//$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-approve-recruitment.php',
                controller: function ($scope, $modalInstance, recruitment){
                    $scope.recruitment = recruitment;
                    //$scope.jobseeker.account_password = '';
                    $scope.ok = function () {
                        $modalInstance.close($scope.recruitment);
                        $scope.getEmployerRecruitments(recruitment['rec_map_employer']);
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
                scope:$scope,
                 backdrop: 'static',
                  windowClass: "modal fade in"
            });

            modalInstance.result.then(function (selectedItem) {
                $scope.selected = selectedItem;
            }, function () {
                $log.info('Modal dismissed at: ' + new Date());
            });
       };
       $scope.approveRecruitment = function(rec){
         $scope.disabled_modal = true;
        if(rec){
            employerRecruitmentService.approveRecruitment(angular.toJson(rec),function(data){
                if(data){
                    alertApproveSuccess();
                    $scope.disabled_modal = true;
                    $scope.ok();
                }
                else{
                    alertErrors();
                    $scope.cancel();
                }
            });
        }
        else{
            $scope.cancel();
        }
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

app.directive("fileread", [function () {
    return {
        scope: {
            fileread: "="
        },
        link: function (scope, element, attributes) {
            element.bind("change", function (changeEvent) {
                var reader = new FileReader();
                reader.onload = function (loadEvent) {
                    $('#employer_logo_tmp').attr('src', loadEvent.target.result);
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

/*app.directive('datepicker', function() {
    return {
        restrict: 'A',
        require : 'ngModel',
        link : function (scope, element, attrs, ngModelCtrl) {
            $(function(){
                element.datepicker({
                    dateFormat:'dd/mm/yy',
                    onSelect:function (date) {
                        scope.$apply(function () {
                            ngModelCtrl.$setViewValue(date);
                        });
                    }
                });
            });
        }
    }
});*/


// app.directive("datepicker", function () {
//   return {
//     restrict: "A",
//     require: "ngModel",
//     link: function (scope, elem, attrs, ngModelCtrl) {
//       var updateModel = function (dateText) {
//         scope.$apply(function () {
//           ngModelCtrl.$setViewValue(dateText);
//         });
//       };
//       var options = {
//         dateFormat: "dd/mm/yy",
//         onSelect: function (dateText) {
//           updateModel(dateText);
//         }
//       };
//       elem.datepicker(options);
//     }
//   }
// });
// app.directive('jqdatepicker', function () {
//     return {
//         restrict: 'A',
//         require: 'ngModel',
//          link: function (scope, element, attrs, ngModelCtrl) {
//             element.datepicker({
//                 dateFormat: 'dd/mm/yy',
//                 onSelect: function (date) {   
//                     var ar=date.split("/");
//                     date=new Date(ar[2]+"-"+ar[1]+"-"+ar[0]);
//                     ngModelCtrl.$setViewValue(date.getTime());
//                 //    scope.course.launchDate = date;
//                     scope.$apply();
//                 }
//             });

//         }
//     };
// });

app.directive('bDatepicker', function () {
    return {
        restrict: 'A',
        link: function (scope, el, attr) {
            el.datepicker({ dateFormat: 'dd-mm-yy' });
            var component = el.siblings('[data-toggle="datepicker"]');
            if (component.length) {
                component.on('click', function () {
                    el.trigger('focus');
                });
            }
        }
    };
});