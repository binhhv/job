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
app.controller('mailJobseekerController', function (mailJobseekerService,$scope, $http, $timeout,cfpLoadingBar,$modal,$log,$window,$filter) {
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
    $scope.reloadMailJobseeker = function(){
        $scope.getMailJobseeker();
    };
    
    $scope.getMailJobseeker = function(){
        //console.log("start get datta");
        $scope.start();
        mailJobseekerService.getListMailJobseeker(function(data){
        $scope.pagedItems = data;    
        $scope.pagedItems.forEach(function(v){ 
            v.active = 0;
        });
        //console.log(data);
        $scope.search='';
        //$scope.itemsPerPage  =  5;
        $scope.currentPage = 1; //current page
        $scope.entryLimit = 15; //max no of items to display in a page
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
      $("#mailJobseekerTable").removeClass('hide');
      $("#div-data-loading").addClass('hide');
    }

    //$scope.mailto='';
    $scope.arrMailto =[{
        mailto:'',
        mailtofull:''
    }];
    $scope.removeInputMail = function(mail,$event){
            //var index = $scope.arrMailto.indexOf(mail);
            //$scope.arrMailto.splice(index, 1);
            if(mail.mailto.length == 0)
            {
               //console.log($event.currentTarget);//.addClass('hide');
               $.each($scope.arrMailto, function(i){
                 if($scope.arrMailto[i].mailto.length == 0) {
                     $scope.arrMailto.splice(index, 1);
                    return false;
                }
                });
            }
            else{
                 var index = $scope.arrMailto.indexOf(mail);
                 $scope.arrMailto.splice(index, 1);
                 $.each($scope.pagedItems, function(i){
                 if($scope.pagedItems[i].email === mail.mailto) {
                    $scope.pagedItems[i].active = 0;
                   // $scope.pagedItems[i].config_is_active = false;
                    console.log("disabled");
                    return false;
                }
                });
            }
     
    }
    $scope.selectedEmail = function(mail,typeOption){
        console.log($scope.arrMailto);
        //var mailto = '<input class="form-control margin-top-5" placeholder="To:" ng-model="mailto">';
        //$("#input-mail-to").append(mailto);
        if(typeOption == 0){
            mail.active = 0;
            var index = $scope.arrMailto.indexOf(mail);
            $scope.arrMailto.splice(index, 1);
           
            //$scope.arrMailto.push({mailto:mail.email});
        }
        else {
            mail.active = 1;
            $scope.arrMailto.push({mailto:mail.email,mailtofull:'('+mail.firstname + mail.lastname+')' + mail.email});
        }
      
    };

    $scope.addMailTo = function(){
         $scope.arrMailto.push({mailto:'',mailtofull:''});
    }

});


app.controller('mailEmployerController', function (mailEmployerService,$scope, $http, $timeout,cfpLoadingBar,$modal,$log,$window,$filter) {
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
    $scope.reloadMailJobseeker = function(){
        $scope.getMailJobseeker();
    };
    
    $scope.getMailJobseeker = function(){
        //console.log("start get datta");
        $scope.start();
        mailEmployerService.getListMailEmployer(function(data){
        $scope.pagedItems = data;    
        $scope.pagedItems.forEach(function(v){ 
            v.active = 0;
        });
        //console.log(data);
        $scope.search='';
        //$scope.itemsPerPage  =  5;
        $scope.currentPage = 1; //current page
        $scope.entryLimit = 15; //max no of items to display in a page
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
      $("#mailJobseekerTable").removeClass('hide');
      $("#div-data-loading").addClass('hide');
    }

    //$scope.mailto='';
    $scope.arrMailto =[{
        mailto:'',
        mailtofull:''
    }];
    $scope.removeInputMail = function(mail,$event){
            //var index = $scope.arrMailto.indexOf(mail);
            //$scope.arrMailto.splice(index, 1);
            if(mail.mailto.length == 0)
            {
               //console.log($event.currentTarget);//.addClass('hide');
               $.each($scope.arrMailto, function(i){
                 if($scope.arrMailto[i].mailto.length == 0) {
                     $scope.arrMailto.splice(index, 1);
                    return false;
                }
                });
            }
            else{
                 var index = $scope.arrMailto.indexOf(mail);
                 $scope.arrMailto.splice(index, 1);
                 $.each($scope.pagedItems, function(i){
                 if($scope.pagedItems[i].email === mail.mailto) {
                    $scope.pagedItems[i].active = 0;
                   // $scope.pagedItems[i].config_is_active = false;
                    console.log("disabled");
                    return false;
                }
                });
            }
     
    }
    $scope.selectedEmail = function(mail,typeOption){
        console.log($scope.arrMailto);
        //var mailto = '<input class="form-control margin-top-5" placeholder="To:" ng-model="mailto">';
        //$("#input-mail-to").append(mailto);
        if(typeOption == 0){
            mail.active = 0;
            var index = $scope.arrMailto.indexOf(mail);
            $scope.arrMailto.splice(index, 1);
           
            //$scope.arrMailto.push({mailto:mail.email});
        }
        else {
            mail.active = 1;
            $scope.arrMailto.push({mailto:mail.email,mailtofull:'('+mail.firstname + mail.lastname+')' + mail.email});
        }
      
    };

    $scope.addMailTo = function(){
         $scope.arrMailto.push({mailto:'',mailtofull:''});
    }

});