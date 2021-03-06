function getPreview(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#preview').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
        $("input[name='image']").val("");
    }
}

window.onload = function(){
    $("#picture").change(function() {
        getPreview(this);
    });
}