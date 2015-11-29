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
app.controller('blogCategoryController', function (blogService,$scope, $http, $timeout,cfpLoadingBar,$modal,$log,$window,$filter) {
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

    $scope.getBlogCategory = function(){
        //$scope.pagedItems =[];
        $scope.start();
        console.log("start call service");
       blogService.getBlogCategory(function(data){
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
      $("#blogCategoryTable").removeClass('hide');
      $("#div-data-loading").addClass('hide');
    };
    $scope.reloadBlogCategory = function(){
        $scope.getBlogCategory();
    };


    $scope.openModalUpdateBlogCategory = function(size,category){
        var modalInstance = $modal.open({
                animation: false,///$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-update-blog-category.php',
                controller: function ($scope, $modalInstance, category,csrf){
                    $scope.category = category;
                    $scope.category.csrf = csrf;
                    
                    $scope.ok = function () {
                        $modalInstance.close($scope.category);
                        $scope.getBlogCategory();
                    };

                    $scope.cancel = function () {
                        $modalInstance.dismiss('cancel');
                    };

                },
                size: size,
                resolve: {
                    category: function () {
                        return category;
                    },
                    csrf:function(){
                        return blogService.getToken();
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


    $scope.updateBlogCategory = function(category){
        if(category){
            blogService.updateBlogCategory(angular.toJson(category),function(data){
                console.log(data);
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

    $scope.openModalDeleteBlogCategory = function(size,category){
        var modalInstance = $modal.open({
                animation: false,///$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-delete-blog-category.php',
                controller: function ($scope, $modalInstance, category,csrf){
                    $scope.category = category;
                    $scope.category.csrf = csrf;
                    
                    $scope.ok = function () {
                        $modalInstance.close($scope.category);
                        $scope.getBlogCategory();
                    };

                    $scope.cancel = function () {
                        $modalInstance.dismiss('cancel');
                    };

                },
                size: size,
                resolve: {
                    category: function () {
                        return category;
                    },
                    csrf:function(){
                        return blogService.getToken();
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
    $scope.deleteBlogCategory = function(category){
        $scope.disabled_modal = true;
        if(category){
            blogService.deleteBlogCategory(angular.toJson(category),function(data){
                if(data){
                    alertDeleteSuccess();
                    $scope.ok();
                }
                else{
                    alertErrors();
                    $scope.cancel();
                }
            });
        }
    };
    $scope.openModalCreateBlogCategory = function(size){
         var modalInstance = $modal.open({
                animation: false,///$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-create-blog-category.php',
                controller: function ($scope, $modalInstance,csrf){
                    $scope.category = {};
                    $scope.category.csrf = csrf;
                    
                    $scope.ok = function () {
                        $modalInstance.close($scope.category);
                        $scope.getBlogCategory();
                    };

                    $scope.cancel = function () {
                        $modalInstance.dismiss('cancel');
                    };

                },
                size: size,
                resolve: {
                    csrf:function(){
                        return blogService.getToken();
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
    $scope.createBlogCategory = function(category){
        //$scope.disabled_modal = true;
        if(category){
            blogService.createBlogCategory(angular.toJson(category),function(data){
                if(data){
                    alertCreateSuccess();
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
        };

     self.alertErrors = function(){
            $(".alert-message-errors").removeClass('hide');
                        $(".alert-message-errors").alert();
                        window.setTimeout(function() { $(".alert-message-errors").addClass('hide').fadeOut(); }, 1500);
        };
          self.alertDeleteSuccess = function(){
        $(".alert-message-delete").removeClass('hide');
                    $(".alert-message-delete").alert();
                    window.setTimeout(function() { $(".alert-message-delete").addClass('hide').fadeOut(); }, 1500);
    };
     self.alertCreateSuccess = function(){
        $(".alert-message-create").removeClass('hide');
                    $(".alert-message-create").alert();
                    window.setTimeout(function() { $(".alert-message-create").addClass('hide').fadeOut(); }, 1500);
    }

});

app.controller('blogController', function (blogService,$scope, $http, $timeout,cfpLoadingBar,$modal,$log,$window,$filter) {
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

    $scope.getBlog = function(){
        //$scope.pagedItems =[];
        $scope.start();
        console.log("start call service");
       blogService.getBlog(function(data){
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
      $("#blogTable").removeClass('hide');
      $("#div-data-loading").addClass('hide');
    };
    $scope.reloadBlog = function(){
        $scope.getBlog();
    };


    $scope.getImageBlogSrc = function(data){
        return pathWebsite + 'uploads/blog/'+data.blog_id + '/' + data.blog_image_tmp;
    }

    $scope.openModalDeleteBlog = function(size,blog){
        var modalInstance = $modal.open({
                animation: false,///$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-delete-blog.php',
                controller: function ($scope, $modalInstance,blog,csrf){
                    $scope.blog = blog;
                    $scope.blog.csrf = csrf;
                    
                    $scope.ok = function () {
                        $modalInstance.close($scope.blog);
                        $scope.getBlog();
                    };

                    $scope.cancel = function () {
                        $modalInstance.dismiss('cancel');
                    };

                },
                size: size,
                resolve: {
                    blog:function(){
                        return blog;
                    },
                    csrf:function(){
                        return blogService.getToken();
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

    $scope.deleteBlog = function(blog){
        console.log(blog);
        $scope.disabled_modal = true;
        if(blog){
            blogService.deleteBlog(angular.toJson(blog),function(data){
                if(data){
                    alertDeleteSuccess();
                    $scope.ok();
                }
                else{
                    alertErrors();
                    $scope.cancel();
                }
            });
        }
    };

    $scope.openModalDisabledBlog = function(size,blog){
         var modalInstance = $modal.open({
                animation: false,///$scope.animationsEnabled,
                templateUrl: pathWebsite + 'assets/admin/partial/modal-disabled-blog.php',
                controller: function ($scope, $modalInstance,blog,csrf){
                    $scope.blog = blog;
                    $scope.blog.csrf = csrf;
                    
                    $scope.ok = function () {
                        $modalInstance.close($scope.blog);
                        $scope.getBlog();
                    };

                    $scope.cancel = function () {
                        $modalInstance.dismiss('cancel');
                    };

                },
                size: size,
                resolve: {
                    blog:function(){
                        return blog;
                    },
                    csrf:function(){
                        return blogService.getToken();
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

    $scope.disabledBlog = function(blog){
        if(blog){
            blogService.disabledBlog(angular.toJson(blog),function(data){
                if(data){
                    alertEditSuccess();
                    $scope.ok();
                }
                else{
                    alertErrors();
                    $scope.cancel();
                }
            })
        }
    }

     self.alertEditSuccess = function(){
        $(".alert-message").removeClass('hide');
                    $(".alert-message").alert();
                    window.setTimeout(function() { $(".alert-message").addClass('hide').fadeOut(); }, 1500);
        };

     self.alertErrors = function(){
            $(".alert-message-errors").removeClass('hide');
                        $(".alert-message-errors").alert();
                        window.setTimeout(function() { $(".alert-message-errors").addClass('hide').fadeOut(); }, 1500);
        };
          self.alertDeleteSuccess = function(){
        $(".alert-message-delete").removeClass('hide');
                    $(".alert-message-delete").alert();
                    window.setTimeout(function() { $(".alert-message-delete").addClass('hide').fadeOut(); }, 1500);
    };
     self.alertCreateSuccess = function(){
        $(".alert-message-create").removeClass('hide');
                    $(".alert-message-create").alert();
                    window.setTimeout(function() { $(".alert-message-create").addClass('hide').fadeOut(); }, 1500);
    }
});

