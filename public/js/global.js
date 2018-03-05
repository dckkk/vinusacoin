function checkVal(event, convert, value, maxValue) {
    $('#res-'+convert).html('Wait ...');
    $('.btn-'+convert).prop('disabled', true);
    if(value) {
        if(value > maxValue) {
            $('#'+convert).val(
                function (index, value) {
                    return value.substr(0, value.length - 1);
                }
            );
        }
    }
    if(![48,49,50,51,52,53,54,55,56,57,190].includes(event.keyCode)) {
        $('#'+convert).val(
            function (index, value) {
                return value.substr(0, value.length - 1);
            }
        );
    }
}
function checkConvert(convert, value) {
    $.get('/api/'+convert, function(data){
        var data = JSON.parse(data)
        , res = data.response * value;
        if(res > 0) {
            $('#res-'+convert).html(res);
            $('#input-'+convert).val(res);
            $('.btn-'+convert).prop('disabled', false);
        } else {
            $('#res-'+convert).html(0);
        }
    });
}