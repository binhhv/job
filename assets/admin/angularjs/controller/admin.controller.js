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
app.controller('adminController', function (adminService,$scope, $http, $timeout,cfpLoadingBar,$modal,$log,$window,$filter) {

    $scope.modalChangePassword = function(size,adminId,adminEmail,option){
          var modalInstance = $modal.open({
                animation: false,///$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-change-password-admin.php',
                controller: function ($scope, $modalInstance,adminId,adminEmail,option,csrf){
                    $scope.admin = {};
                    $scope.admin.adminId = adminId;
                    $scope.admin.adminEmail = adminEmail;
                    $scope.admin.option = option;
                    $scope.admin.csrf = csrf;
                    $scope.admin.password = '';
                    $scope.admin.passwordConfirm ='';
                    //$scope.disabled_modal = true;
                    $scope.ok = function () {
                        $modalInstance.close($scope.admin);
                    };

                    $scope.cancel = function () {
                        $modalInstance.dismiss('cancel');
                        //console.log(ddToDms($("#latitude").text(),$("#longitude").text()));
                    };

                },
                size: size,
                resolve: {
                    adminId: function () {
                        return adminId;
                    },
                    adminEmail: function () {
                        return adminEmail;
                    },
                    option:function(){
                        return option;
                    },
                    csrf:function(){
                        return adminService.getToken();
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

    $scope.changePassword = function(admin){
       // console.log(admin);
        if(admin){
            adminService.changePassword(angular.toJson(admin),function(data){
                if(data){
                    alertEditSuccess();
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
    }

});
  
app.directive('match',['$parse', function ($parse) {
    return {
        require: 'ngModel',
        restrict: 'A',
        link: function(scope, elem, attrs, ctrl) {
//This part does the matching
            scope.$watch(function() {
                return (ctrl.$pristine && angular.isUndefined(ctrl.$modelValue)) || $parse(attrs.match)(scope) === ctrl.$modelValue;
            }, function(currentValue) {
                ctrl.$setValidity('match', currentValue);
            });

//This part is supposed to check the strength
            ctrl.$parsers.unshift(function(viewValue) {
                var pwdValidLength, pwdHasLetter, pwdHasNumber;
                
                pwdValidLength = (viewValue && viewValue.length >= 8 ? true : false);
                pwdHasLetter =  (viewValue && /[A-z]/.test(viewValue)) ? true : false;
                pwdHasNumber = (viewValue && /\d/.test(viewValue)) ? true : false;
                
                if( pwdValidLength && pwdHasLetter && pwdHasNumber ) {
                    ctrl.$setValidity('pwd', true);
                } else {
                    ctrl.$setValidity('pwd', false);                    
                }
                return viewValue;
            });
        },
    };
}]);