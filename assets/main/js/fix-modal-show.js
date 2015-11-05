$(function(){
	    function reposition() {
        var page = $('#page'),
            dialog = page.find('#modalTypeRegister .modal-dialog');
        $("#modalTypeRegister").css('display', 'block');
        
        // Dividing by two centers the modal exactly, but dividing by three 
        // or four works better for larger screens.c
        console.log("dialog height " + dialog.height());
        console.log("window height " + document.documentElement.clientHeight);
        $("#modalTypeRegister").css("margin-top", Math.max(0, (document.documentElement.clientHeight - dialog.height()) /2) - 50);
    }
    // Reposition when a modal is shown
    $('#modalTypeRegister').on('show.bs.modal', reposition);
    // Reposition when the window is resized
    $(window).on('resize', function() {
        $('#modalTypeRegister:visible').each(reposition);
    });
});