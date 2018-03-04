function checkVal(convert, value, maxValue) {
    if(value > maxValue) {
        $('#'+convert).val(
            function (index, value) {
                return value.substr(0, value.length - 1);
            }
        );
    }
}
function checkConvert(convert, value) {
    $('#res-'+convert).html('Wait ...');
    $.get('/api/'+convert, function(data){
        var data = JSON.parse(data)
        , res = data.response * value;
        $('#res-'+convert).html(res);
        $('#input-'+convert).val(res);
        $('.btn-'+convert).prop('disabled', false);
    });
}