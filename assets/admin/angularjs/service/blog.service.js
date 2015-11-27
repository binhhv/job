app.factory('blogService' ,function ($http,$q,$timeout){
	var _blogService ={};

	_blogService.getToken = function(){
			var temp = {};
			    var defer = $q.defer();
			    $http.get(pathWebsite + 'admin/jobseeker/getToken').success(function(data){
			            temp =data;
			             $timeout(function(){
					      defer.resolve(data);
					    }, 750) 

			    });
			    return defer.promise;
	};
	_blogService.getBlogCategory = function(callback){
 		return $http.get(pathWebsite + 'admin/blog/get-blog-category').success(callback);
 	}
 	_blogService.updateBlogCategory = function(category,callback){
 		var objectCategory = JSON.parse(category);
			var csrf_name = objectCategory['csrf']['name'];
			var csrf_hash = objectCategory['csrf']['hash'];
			var postData = $.param({'csrf_test_name': csrf_hash,'category':category});
			$http.post(pathWebsite + 'admin/blog/updateBlogCategory', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
	
 	}
 	_blogService.deleteBlogCategory = function(category,callback){
 		var objectCategory = JSON.parse(category);
			var csrf_name = objectCategory['csrf']['name'];
			var csrf_hash = objectCategory['csrf']['hash'];
			var postData = $.param({'csrf_test_name': csrf_hash,'category':category});
			$http.post(pathWebsite + 'admin/blog/deleteBlogCategory', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
	
 	}
 	_blogService.createBlogCategory = function(category,callback){
 		var objectCategory = JSON.parse(category);
			var csrf_name = objectCategory['csrf']['name'];
			var csrf_hash = objectCategory['csrf']['hash'];
			var postData = $.param({'csrf_test_name': csrf_hash,'category':category});
			$http.post(pathWebsite + 'admin/blog/createBlogCategory', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
	
 	}
 	_blogService.getBlog = function(callback){
 		return $http.get(pathWebsite + 'admin/blog/get-blog').success(callback);
 	}
 	_blogService.deleteBlog = function(blog,callback){
 		var objectBlog = JSON.parse(blog);
			var csrf_name = objectBlog['csrf']['name'];
			var csrf_hash = objectBlog['csrf']['hash'];
			var postData = $.param({'csrf_test_name': csrf_hash,'blog':blog});
			$http.post(pathWebsite + 'admin/blog/deleteBlog', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
	
 	}
 	_blogService.disabledBlog = function(blog,callback){
 		var objectBlog = JSON.parse(blog);
			var csrf_name = objectBlog['csrf']['name'];
			var csrf_hash = objectBlog['csrf']['hash'];
			var postData = $.param({'csrf_test_name': csrf_hash,'blog':blog});
			$http.post(pathWebsite + 'admin/blog/disabledBlog', postData, {headers : {'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
	
 	}
	return _blogService;
});