$(window).load(function(){
	var id = $("input:hidden[name=blog_id]").val();
	  $.ajax({
	  method: "GET",
	  url: config.base_url + 'admin/blog/getContentBlog/'+id,
	  // data:querystring,
	  success: function(msg)
	   {
	     CKEDITOR.instances['blog_content'].setData(msg);
	   }
	  });
})
