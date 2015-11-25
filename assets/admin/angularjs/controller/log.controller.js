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
app.controller('logController', function (logService,$scope, $http, $timeout,cfpLoadingBar,$modal,$log,$window,$filter) {
    $scope.filteredItems =  [];
    $scope.groupedItems  =  [];
    $scope.itemsPerPage  =  4;
    $scope.pagedItems    =  [];
    $scope.currentPage   =  0;

    $scope.getLogs = function(){
        $scope.start();
        logService.getLogs(function(data){
        $scope.pagedItems = data;    
        $scope.search='';
        $scope.currentPage = 1; //current page
        $scope.entryLimit = 20; //max no of items to display in a page
        $scope.filteredItems = $scope.pagedItems.length; //Initially for no filter  
        $scope.totalItems = $scope.pagedItems.length;
        console.log(data);
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
      $("#logTable").removeClass('hide');
     
    }
    $scope.reload = function(){
        $scope.getLogs();
    }
    $scope.loadLogin = function(size,adminId,adminEmail){
         var modalInstance = $modal.open({
                animation: false,///$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-password-log.php',
                controller: function ($scope, $modalInstance,adminId,adminEmail,csrf){
                    $scope.admin = {};
                    $scope.ok = function () {
                        $modalInstance.close($scope.admin);
                    };

                    $scope.cancel = function () {
                        $modalInstance.dismiss('cancel');
                        //console.log(ddToDms($("#latitude").text(),$("#longitude").text()));
                    };

                },
                size: 'xs',
                resolve: {
                    adminId: function () {
                        return adminId;
                    },
                    adminEmail: function () {
                        return adminEmail;
                    },
                    csrf:function(){
                        return logService.getToken();
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
});