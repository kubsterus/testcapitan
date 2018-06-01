window.onload = function(){
    $("#category_select").change(function(){
        document.location.href = $(this).val();
    });
}