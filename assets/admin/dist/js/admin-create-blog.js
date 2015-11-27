$(function(){
	$("#fCreateBlog").submit(function(event) {
        event.preventDefault();
       var content = CKEDITOR.instances.blog_content.getData();
       console.log(content);
        var url = config.base_url;
        if($("input[name=isDraft]:hidden").val() == 1){
            url +="admin/blog/post-draft";
        }
        else{
             url +="admin/blog/post-create";
        }
        // alert();
        // console.log(url);
        var dataOb = {'csrf_test_name':$('input:hidden[name=csrf_test_name]').val(),
                    'blog_title':$('input[name=blog_title]').val(),
                    'file_name':$('input:hidden[name=file_name]').val(),
                    'file-tmp':$('input:hidden[name=file-tmp]').val(),
                    'blog-category':$('select[name=blog-category]').val(),
                    'blog_introduce':$('input[name=blog_introduce]').val(),
                    'blog_content':content
                    };
       $.ajax({
            type: "POST", // HTTP method POST or GET
            url: url,//base_website + "employer/recruitment/create", //Where to make Ajax calls
            dataType: "json", // Data type, HTML, json etc.
            data: dataOb,//$(this).serialize() ,//+ '&content=' + JSON.stringify(content), //Form variables
            success: function(response) {
                // var objs = $.parseJSON(response);

                var status = response.status;
                console.log(status);
                if (status == 'errvalid') {

                    var checkError = response.contenterror;

                    if(checkError)
                    {
                        $(".error-all").removeClass('hide');
                    }
                    else{
                	$(".error-blog-title").empty();
                	$(".error-blog-introduce").empty();
                	$(".error-blog-image").empty();
                    $(".error-blog-content").empty();
                
                    var blog_title = response.content.blog_title;//(typeof response.content.account_email === 'undefined' || response.content.account_email === null) ? response.content.account_email :'';
                    var blog_introduce = response.content.blog_introduce;//(typeof response.content.account_password === 'undefined' || response.content.account_password === null) ? response.content.account_password : '';
                    var blog_image = response.content.blog_image;//(typeof response.content.confirm_password === 'undefined' || response.content.confirm_password === null) ? response.content.confirm_password : '';
                    var blog_content = response.content.blog_content;//(typeof response.content.employer_name === 'undefined' || response.content.employer_name === null) ? response.content.employer_name : '';
                  
                    var csrf_name = response.content.name;
                    var csrf_hash = response.content.hash;

                    // (account_last_name.length  > 0) ? $(".error-account-last-name").removeClass('hide').append(account_last_name) : null;
                    // (account_first_name.length  > 0) ? $(".error-account-first-name").removeClass('hide').append(account_first_name) : null;

                    (blog_title.length  > 0) ? $(".error-blog-title").removeClass('hide').append(blog_title) : null;
                    (blog_introduce.length  > 0) ? $(".error-blog-introduce").removeClass('hide').append(blog_introduce) : null;
                    (blog_image.length  > 0) ? $(".error-blog-image").removeClass('hide').append(blog_image) : null;
                    (blog_content.length  > 0) ? $(".error-blog-content").removeClass('hide').append(blog_content) : null;
                     }
                   	getTokenEditInfo(addTokenInputEditInfo);

                   // getCaptcha();
                } else if (status == 'success') {
                    window.location.href = config.base_url+ 'admin/blog'; //redirec to home page jobseeker
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError);
            }
        });
		
    })


    //form submit edit
    $("#fEditBlog").submit(function(event) {
        event.preventDefault();
       
        var url = config.base_url;
        if($("input[name=isDraft]:hidden").val() == 1){
            url +="admin/blog/post-update-draft";
        }
        else{
             url +="admin/blog/post-update";
        }
        console.log(url);
        $.ajax({
            type: "POST", // HTTP method POST or GET
            url: url,//base_website + "employer/recruitment/create", //Where to make Ajax calls
            dataType: "json", // Data type, HTML, json etc.
            data: $(this).serialize(), //Form variables
            success: function(response) {
                // var objs = $.parseJSON(response);

                var status = response.status;
                console.log(status);
                if (status == 'errvalid') {

                    var checkError = response.contenterror;

                    if(checkError)
                    {
                        $(".error-all").removeClass('hide');
                    }
                    else{
                        $(".error-blog-title").empty();
                        $(".error-blog-introduce").empty();
                        $(".error-blog-image").empty();
                        $(".error-blog-content").empty();
                    
                        var blog_title = response.content.blog_title;//(typeof response.content.account_email === 'undefined' || response.content.account_email === null) ? response.content.account_email :'';
                        var blog_introduce = response.content.blog_introduce;//(typeof response.content.account_password === 'undefined' || response.content.account_password === null) ? response.content.account_password : '';
                        var blog_image = response.content.blog_image;//(typeof response.content.confirm_password === 'undefined' || response.content.confirm_password === null) ? response.content.confirm_password : '';
                        var blog_content = response.content.blog_content;//(typeof response.content.employer_name === 'undefined' || response.content.employer_name === null) ? response.content.employer_name : '';
                      
                        var csrf_name = response.content.name;
                        var csrf_hash = response.content.hash;

                        // (account_last_name.length  > 0) ? $(".error-account-last-name").removeClass('hide').append(account_last_name) : null;
                        // (account_first_name.length  > 0) ? $(".error-account-first-name").removeClass('hide').append(account_first_name) : null;

                        (blog_title.length  > 0) ? $(".error-blog-title").removeClass('hide').append(blog_title) : null;
                        (blog_introduce.length  > 0) ? $(".error-blog-introduce").removeClass('hide').append(blog_introduce) : null;
                        (blog_image.length  > 0) ? $(".error-blog-image").removeClass('hide').append(blog_image) : null;
                        (blog_content.length  > 0) ? $(".error-blog-content").removeClass('hide').append(blog_content) : null;
                        
                    }
                    
                    getTokenEditInfo(addTokenInputEditInfo);

                } else if (status == 'success') {
                     window.location.href = config.base_url+ 'admin/blog';
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError);
            }
        });
        //}
    })
});

var getTokenEditInfo = function(callback){
    	 $.ajax({
        url: config.base_url +'job/getToken',
        type: "get",
        dataType:'json',
        success: function(data){
           callback(data);

        }
      });
    };

    function addTokenInputEditInfo(data){
    	console.log('token' +data);
    	$('input:hidden[name="csrf_test_name"]').val(data.hash);
    }


function draftBlog(){
   var draft = '<input type="hidden" name="isDraft" value="1">';
   $(".draft-blog").empty().append(draft);
   $("#fCreateBlog").submit();
}
function editDraftBlog(){
    var draft = '<input type="hidden" name="isDraft" value="1">';
   $(".draft-blog").empty().append(draft);
  $("#fEditBlog").submit();
  //alert($("input[name=isDraft]:hidden").val());
}


