function checkVal(event, convert, value, maxValue) {
    if(value) {
        if(value > maxValue) {
            $('#'+convert).val(
                function (index, value) {
                    return value.substring(0, value.length - 1);
                }
            );
        } else {
            if(![48,49,50,51,52,53,54,55,56,57,190].includes(event.keyCode)) {
                $('#'+convert).val(
                    function (index, value) {
                        return value.replace(/[^\d]/g, "");
                    }
                );
            } else {
                $('#res-'+convert).html('Wait ...');
                $('.btn-'+convert).prop('disabled', true);
            } 
        }
    }
}
function checkConvert(convert, value, maxValue) {
    if (value > maxValue) {
        $('.warn-'+convert).show();
        $('.warn-'+convert).html("You can't convert/withdraw if your total more than your balance !");
        $('#'+convert).val("");
    } else {
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
}
function checkConvertDeposit(convert, value, id) {
    $.get('/api/'+convert, function(data){
        var data = JSON.parse(data)
        , res = data.response * value;
        if(res > 0) {
            $('#res-'+convert).html(res+id.toString());
            $('#input-'+convert).val(res+id.toString());
            $('.btn-'+convert).prop('disabled', false);
        } else {
            $('#res-'+convert).html(0);
        }
    });
}
function checkPlans(convert, value, maxValue, minDeposit, maxDeposit) {
    if (value > maxValue) {
        $('.warn-'+convert).show();
        $('.warn-'+convert).html("You can't convert/withdraw if your total more than your balance !");
        $('#'+convert).val("");
    } else if(value < minDeposit){
        $('.warn-'+convert).html("The minimum deposit of this plan is "+ minDeposit);
        $('#'+convert).val("");
    } else if(value > maxDeposit){
        $('.warn-'+convert).html("The maximum deposit of this plan is "+ minDeposit);
        $('#'+convert).val("");
    } else {
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
}