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
}).filter('nl2br', function($sce){
    return function(msg,is_xhtml) { 
        var is_xhtml = is_xhtml || true;
        var breakTag = (is_xhtml) ? '<br />' : '<br>';
        var msg = (msg + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1'+ breakTag +'$2');
        return $sce.trustAsHtml(msg);
    }
}).filter('trusted_html', ['$sce', function($sce){
    return function(text) {
        return $sce.trustAsHtml(text);
    };
}]).filter('cut', function () {
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
app.controller('recruitmentCreateController', function (recruitmentService,employerRecruitmentService,jobseekerService,$scope, $http, $timeout,cfpLoadingBar,$modal,$log,$window,$filter) {
    
    $scope.rec = {};
    recruitmentCreate = {};
    $scope.listProvinces = [];
    $scope.listEmployers = [];
     recruitmentCreate.provinceSelected=[];
     $scope.show_form = false;
    $scope.getDataRecruitmentCreate = function(countryGET){
      employerRecruitmentService.getTokenReturn().then(function(data){
        recruitmentCreate.csrf = data;
          return employerRecruitmentService.getListWelfareR();
      }).then(function(data){
          recruitmentCreate.listWelfares = data;
          return employerRecruitmentService.getListContactFormR();
      }).then(function(data){
          recruitmentCreate.listContactForms = data;
          return employerRecruitmentService.getListSalary();
      }).then(function(data){
          recruitmentCreate.listSalaries = data;
          return employerRecruitmentService.getListFormR();
      }).then(function(data){
          recruitmentCreate.listForms = data;
          return employerRecruitmentService.getListCountryR();
      }).then(function(data){
          recruitmentCreate.listCountrys = data;
          return employerRecruitmentService.getListLevelR();
      }).then(function(data){
        recruitmentCreate.listLevels = data;
        return employerRecruitmentService.getListFormChildR();
      }).then(function(data){
        recruitmentCreate.listFormChilds = data;
        return employerRecruitmentService.getListCareer();
      }).then(function(data){
        recruitmentCreate.listCareers = data;
        return employerRecruitmentService.getListProvinceCountry(countryGET);
      }).then(function(data){
          
       $scope.listProvinces =data.data;
       return recruitmentService.getListEmployer();
     }).then(function(data){
        $scope.listEmployers = data.data;
        recruitmentCreate.welfareSelected = [];
        recruitmentCreate.object_contact_form = (recruitmentCreate.listContactForms) ? recruitmentCreate.listContactForms[0] : {};//{contact_form_id:rec.rec_contact_form,contact_form_type:rec.contact_form_type};
        recruitmentCreate.object_form = (recruitmentCreate.listForms) ?  recruitmentCreate.listForms[0] : [];//rec.listForms[0];//{fjob_id:rec.rec_job_map_form,fjob_type:rec.fjob_typpe};
        recruitmentCreate.object_form_child = ( recruitmentCreate.listFormChilds) ? recruitmentCreate.listFormChilds[0] :{};//rec.listFormChilds[0];//{jcform_id:rec.rec_job_map_form_child,jcform_type:rec.jcform_type};
        recruitmentCreate.object_level = ( recruitmentCreate.listLevels ) ? recruitmentCreate.listLevels[0] : {};//rec.listLevels[0];//{ljob_id:rec.rec_job_map_level,ljob_level:rec.ljob_level};
        recruitmentCreate.object_salary =(recruitmentCreate.listSalaries) ? recruitmentCreate.listSalaries[0] :{};
        recruitmentCreate.rec_job_map_country =( recruitmentCreate.listCountrys) ? (recruitmentCreate.listCountrys[0]['country_id'] ): {};
        recruitmentCreate.rec_job_time = new Date();
        recruitmentCreate.object_employer =($scope.listEmployers.length > 0 ) ? $scope.listEmployers[0] : {};
        recruitmentCreate.object_career = (recruitmentCreate.listCareers.length > 0) ? recruitmentCreate.listCareers[0] : {};
        console.log(recruitmentCreate.object_contact_form);
        $scope.rec =recruitmentCreate;
        console.log($scope.listCareers);
        
          $("#message-load-data").addClass('hide');
          $("#recruitmentCreateForm").removeClass('hide');
            $scope.show_form = true;
      });
      
      
      
     
     
      
    };
    

        $scope.changeCountry = function(){

         var idcountry = $scope.rec.rec_job_map_country;
         console.log("change"+idcountry);
          employerRecruitmentService.getListProvinceCountry(idcountry).success(function(data){
                $scope.listProvinces = data;
            });
          $scope.rec.provinceSelected =[];
          
       };

       $scope.createRecruitment = function(rec){
          if(rec){
            recruitmentService.createRecruitment(angular.toJson(rec),function(data){
                if(data){
                  $("#recruitment-create-success").removeClass('hide');
                    $scope.show_form = false;
                }
                else{
                  $("#recruitment-create-error").removeClass('hide');
                    $scope.show_form = false;
                }
            });
          }
       }
       $scope.items =[];
       $scope.filter = function (){
        $timeout(function() { 
          if($scope.items.length > 0){
              $scope.rec.object_employer = $scope.items[0];
          }
          
        }, 10);
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

});

app.controller('recruitmentController', function (recruitmentService,employerRecruitmentService,employerUserService,jobseekerService,$scope, $http, $timeout,cfpLoadingBar,$modal,$log,$window,$filter) {
      
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
    $scope.typeRecruitment = 0;
    $scope.getRecruitments = function(type){
        //console.log("ádasdasd");
        //$scope.rec.welfareSelected =  null;
        $scope.typeRecruitment = type;
        $scope.start();
       recruitmentService.getListRecruitments(type,function(data){
           // console.log(data);
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
      $("#recruitmentTable").removeClass('hide');
     // $("#managerTable").removeClass('hide');
      $("#div-data-loading").addClass('hide');
      console.log("addhide");
    };
    $scope.reload = function(type){
      $scope.getRecruitments(type);
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
                templateUrl: pathWebsite + 'assets/admin/partial/modal-detail-recruitment.php',
                controller: function ($scope, $modalInstance, rec){
                   // rec.controller = "recruitmentActiveController";
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
                templateUrl: pathWebsite + 'assets/admin/partial/modal-update-recruitment.php',
                controller: function ($scope, $modalInstance, rec,listCareers,listSalaries){
                    $scope.rec = rec;

                    console.log(rec);
                    $scope.rec.rec_job_time = new Date(rec.rec_job_time);
                    $scope.rec.listSalaries = listSalaries;
                    $scope.rec.listCareers = listCareers;
                    $scope.rec.welfareSelected = rec.welfareSelected;
                    $scope.rec.object_contact_form = {contact_form_id:rec.rec_contact_form,contact_form_type:rec.contact_form_type};
                    $scope.rec.object_form = {fjob_id:rec.rec_job_map_form,fjob_type:rec.fjob_typpe};
                    $scope.rec.object_form_child = {jcform_id:rec.rec_job_map_form_child,jcform_type:rec.jcform_type};
                    $scope.rec.object_level = {ljob_id:rec.rec_job_map_level,ljob_level:rec.ljob_level};
                    $scope.rec.object_career = {career_id:rec.rec_job_map_career,career_name:rec.career_name};
                    $scope.rec.object_salary ={salary_id:rec.rec_map_salary,salary_value:rec.salary_value};
                   // if($scope.rec.provinceSelected.length >= 5){
                       // $("#select-Province").addClass('hide');
                    //}
                    console.log(rec.provinceSelected.length);
                    //console.log($scope.rec.listContactForms);
                    //$scope.listProvinces = rec.listProvinces;
                   // $scope.rec.provinceSelectd = rec.provinceSelectd;
                    //$scope.multipleDemo = {};
                    //$scope.rec.listProvinces =  rec.listProvinces;
                    //$scope.rec.selectedProvince = rec.provinceSelected;
                    //console.log("====="+  rec.provinceSelected);
                    //$scope.welfareSelected = $.welfareSelected;
                    //$scope.jobseeker.account_password = '';
                    $scope.ok = function () {
                        $modalInstance.close($scope.rec);
                        //$scope.rec.welfareSelected = null;
                       //var employerid = $scope.jobseeker['emac_map_employer'];
                       //$scope.getEmployerUsers(employerid);
                      // $scope.getEmployerRecruitments();
                       $scope.getRecruitments($scope.typeRecruitment);
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
                 windowClass: "modal fade in",
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
                templateUrl: pathWebsite + 'assets/admin/partial/modal-delete-recruitment.php',
                controller: function ($scope, $modalInstance, recruitment){
                    $scope.recruitment = recruitment;
                    //$scope.jobseeker.account_password = '';
                    $scope.ok = function () {
                        $modalInstance.close($scope.recruitment);
                        $scope.getRecruitments($scope.typeRecruitment);
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
                  windowClass: "modal fade in",
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




        // $scope.reloadEmployerRecruitment = function(employerid){
        //     $scope.getRecruitments();
        // }


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
                templateUrl: pathWebsite + 'assets/admin/partial/modal-set-approve-recruitment.php',
                controller: function ($scope, $modalInstance, recruitment){
                    $scope.recruitment = recruitment;
                    //$scope.jobseeker.account_password = '';
                    $scope.ok = function () {
                        $modalInstance.close($scope.recruitment);
                        $scope.getRecruitments($scope.typeRecruitment);
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
                  windowClass: "modal fade in",
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
       };

       $scope.openModalViewApply = function(size,idrecruitment){
        //getRecruitmentApply
            var modalInstance = $modal.open({
                animation: false,//$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-apply-recruitment.php',
                controller: function ($scope, $modalInstance, idrecruitment,listApply){
                    //$scope.rec = {}
                     $scope.listApply = listApply;
                     $scope.idrecruitment = idrecruitment;
                    //$scope.rec.pathWebsite = pathWebsite;
                    console.log(listApply);
                    $scope.ok = function () {
                        $modalInstance.close($scope.rec);
                        //$scope.getRecruitments($scope.typeRecruitment);
                    };

                    $scope.cancel = function () {
                        $modalInstance.dismiss('cancel');
                    };

                },
                size: size,
                resolve: {
                    idrecruitment: function () {
                        return idrecruitment;
                    },
                    listApply: function(){
                      return recruitmentService.getRecruitmentApply(idrecruitment);
                    }

                },
                scope:$scope,
                 backdrop: 'static',
                  windowClass: "modal fade in",
            });

            modalInstance.result.then(function (selectedItem) {
                $scope.selected = selectedItem;
            }, function () {
                $log.info('Modal dismissed at: ' + new Date());
            });
       };

       $scope.downloadCV = function(data){
        console.log(data);
        var userid =0;
        if(data.doccv_map_user == 0){
          userid = data.doccv_map_jobseeker;
        }
        else{
          userid = data.doccv_map_user;
        }
        $window.location.href = pathWebsite +'downloadcv/' +userid+'/'+data.doccv_file_tmp+'/'+data.doccv_file_name+'/'+data.doccv_type;
    };
    $scope.viewDocumentOnline = function(iddoc){
      $window.location.href = pathWebsite +'admin/document/detail/'+iddoc;
    }


    $scope.openModalEditShowRecruitment = function(size,recruitment){
       var modalInstance = $modal.open({
                animation: false,//$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-edit-show-recruitment.php',
                controller: function ($scope, $modalInstance, recruitment,csrf){
                    $scope.recruitment = recruitment;
                    $scope.recruitment.csrf = csrf;
                    //$scope.jobseeker.account_password = '';
                    $scope.ok = function () {
                        $modalInstance.close($scope.recruitment);
                        $scope.getRecruitments($scope.typeRecruitment);
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
                        return recruitment;
                    },
                    csrf: function(){
                      return recruitmentService.getToken();
                    }
                },
                scope:$scope,
                 backdrop: 'static',
                  windowClass: "modal fade in",
            });

            modalInstance.result.then(function (selectedItem) {
                $scope.selected = selectedItem;
            }, function () {
                $log.info('Modal dismissed at: ' + new Date());
            });
    }

    $scope.editShowRecruitment = function(recruitment){
      $scope.disabled_modal = true;
        recruitmentService.editShowRecruitment(angular.toJson(recruitment),function(data){
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

    $scope.modalDisabledEmployerRecruitment = function(size,recruitment,option){
       var modalInstance = $modal.open({
                animation: false,//$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-disabled-recruitment.php',
                controller: function ($scope, $modalInstance, recruitment,csrf,option){
                    $scope.recruitment = recruitment;
                    $scope.recruitment.csrf = csrf;
                    $scope.recruitment.option = option;
                    //$scope.jobseeker.account_password = '';
                    $scope.ok = function () {
                        $modalInstance.close($scope.recruitment);
                        $scope.getRecruitments($scope.typeRecruitment);
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
                        return recruitment;
                    },
                    csrf: function(){
                      return recruitmentService.getToken();
                    },
                    option:function(){
                      return option;
                    }
                },
                scope:$scope,
                 backdrop: 'static',
                  windowClass: "modal fade in",
            });

            modalInstance.result.then(function (selectedItem) {
                $scope.selected = selectedItem;
            }, function () {
                $log.info('Modal dismissed at: ' + new Date());
            });
    }
    $scope.disabledRecruitment = function(recruitment){
      $scope.disabled_modal = true;
        recruitmentService.disabledRecruitment(angular.toJson(recruitment),function(data){
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


});


app.controller('recruitmentHLController', function (recruitmentService,employerRecruitmentService,employerUserService,jobseekerService,$scope, $http, $timeout,cfpLoadingBar,$modal,$log,$window,$filter) {


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
