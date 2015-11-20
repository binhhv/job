$(function(){    
    $('#confirm-store-resume').on('show.bs.modal', function(e) {
      var url = $(e.relatedTarget).data('href');
      console.log(url);
    // $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'););
    $(".btn-ok").on('click',function(){
      //alert("123123");
       $.ajax({
        url: url,
        type: "get",
        dataType:'json',
        success: function(data){
          if(data.status == 'success'){
              $('#confirm-store-resume').modal('hide');
             // window.location.href =base_website+'jobseeker';
              $(e.relatedTarget).css('display','none');
          }
          else{
            $('#confirm-store-resume').modal('hide');
          }
        },
         error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError);
            }
      });
    })
      
  });
})