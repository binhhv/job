app.filter('startFrom', function() {
    return function(input, start) {
        if(input) {
            start = +start; //parse to int
            return input.slice(start);
        }
        return [];
    }
})
app.controller('contactController', function (contactService,$scope, $http, $timeout,cfpLoadingBar,$modal,$log,$window,$filter) {
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

    $scope.getContacts = function(){
    	//$scope.pagedItems =[];
        $scope.start();
        console.log("start call service");
       contactService.getListContact(function(data){
       	 console.log("start get data");
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
      $("#contactTable").removeClass('hide');
      $("#div-data-loading").addClass('hide');
    };
    $scope.reloadContact = function(){
    	$scope.getContacts();
    };

    $scope.openModalRead = function (size,contact) {
            
            var modalInstance = $modal.open({
                animation: false,//$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-read-contact.php',
                controller: function ($scope, $modalInstance, contact,view){
                    $scope.contact = contact;
                   
                    $scope.ok = function () {
                        $modalInstance.close($scope.contact);

                        //$scope.getForms();
                    };

                    $scope.cancel = function () {
                    	$scope.getContacts();
                        $modalInstance.dismiss('cancel');
                    };

                },
                size: size,
                resolve: {
                    contact: function () {
                        return contact;
                    },
                    view:function(){
                    	return contactService.updateContactView(contact.cont_id);
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

        
        $scope.openModalReply = function (size,contact) {
            
            var modalInstance = $modal.open({
                animation: false,//$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-reply-contact.php',
                controller: function ($scope, $modalInstance, contact,csrf){
                    $scope.contact = contact;
                    $scope.contact.subjectRep = 'Trả lời [' + contact.cont_subject +']';
                    $scope.contact.messageRep ='';
                   	$scope.contact.csrf = csrf;
                    $scope.ok = function () {
                        $modalInstance.close($scope.contact);
                        $scope.getContacts();
                        //$scope.getForms();
                    };

                    $scope.cancel = function () {
                        $modalInstance.dismiss('cancel');
                    };

                },
                size: size,
                resolve: {
                    contact: function () {
                        return contact;
                    },
                    csrf:function(){
                    	return contactService.getToken();
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

        $scope.replyContact = function (contact){
        	$scope.disabled_modal = true;
        	if(contact){
        		contactService.replyContact(angular.toJson(contact),function(data){
        			if(data){
        				alertSendSuccess();
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

        self.alertErrors = function(){
        $(".alert-message-errors").removeClass('hide');
                    $(".alert-message-errors").alert();
                    window.setTimeout(function() { $(".alert-message-errors").addClass('hide').fadeOut(); }, 1500);
    };

    self.alertSendSuccess = function(){
        $(".alert-message-sendmail").removeClass('hide');
                    $(".alert-message-errors").alert();
                    window.setTimeout(function() { $(".alert-message-sendmail").addClass('hide').fadeOut(); }, 1500);
    };

        $scope.openModalDelete = function (size,contact) {
            
            var modalInstance = $modal.open({
                animation: false,//$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-delete-contact.php',
                controller: function ($scope, $modalInstance, contact,csrf){
                    $scope.contact = contact;
                   $scope.contact.csrf = csrf;
                    $scope.ok = function () {
                        $modalInstance.close($scope.contact);
                        $scope.getContacts();
                        //$scope.getForms();
                    };

                    $scope.cancel = function () {
                        $modalInstance.dismiss('cancel');
                    };

                },
                size: size,
                resolve: {
                    contact: function () {
                        return contact;
                    },
                    csrf:function(){
                    	return contactService.getToken();
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

        $scope.deleteContact = function(contact){
        	$scope.disabled_modal = true;
        	if(contact){
        		contactService.deleteContact(angular.toJson(contact),function(data){
        			if(data){
        				$scope.disabled_modal = false;
        				$scope.ok();
        			}
        			else{
        				$scope.cancel();
        			}
        		});
        	}
        }

    });