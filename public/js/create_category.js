window.onload = function(){
    $("input[name='title']").keyup(function(){
        var val = $(this).val();
        var alias = val.replace(" ", "_");
        alias = alias.toLowerCase();
        alias = alias.replace("-", "_");
        alias = alias.replace("!", "_");
        alias = alias.replace(".", "_");
        alias = alias.replace(",", "_");
        alias = alias.replace("?", "_");
        $("input[name='alias']").val(alias);
    });
}