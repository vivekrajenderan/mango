$(document).ready(function () {
    $("#accounting-form").validate({
        highlight: function (element) {
            $(element).closest('.elVal').addClass("form-field text-error");
        },
        unhighlight: function (element) {
            $(element).closest('.elVal').removeClass("form-field text-error");
        }, errorElement: 'span',
        rules: {
            acctype: {
                required: true
            },
            transamount: {
                required: true
            },
            refno: {
                required: true
            },
            transtext: {
                required: true
            }

        },
        messages: {
            acctype: {
                required: "Please choose account type"
            },
            transamount: {
                required: "Please enter the trans amount"
            },
            refno: {
                required: "Please enter the reference No"
            },
            transtext: {
                required: "Please enter the comments"
            }
        },
        errorPlacement: function (error, element) {
            error.appendTo(element.closest(".elVal"));
        },
        submitHandler: function (form) {            
            var $form = $("#accounting-form");
            $.ajax({
                type: $form.attr('method'),
                url: $form.attr('action'),
                data: $form.serialize(),                
                dataType: 'json'
            }).done(function (response) {

                if (response.status)
                {
                    window.location = baseurl + 'accounting';
                } else
                {
                    openDanger(response.msg);
                }
            });
            return false; // required to block normal submit since you used ajax
        }
    });   
});



$(document).on('click', '.accountingview', function () {
    var accountid = $(this).attr('data-id');
    if (accountid)
    {
        $.ajax({
            url: baseurl + 'accounting/view',
            type: 'POST',
            data: {accountid: accountid},
            dataType: 'json',
            async: false,
            beforeSend: function () {
                $('#loading-image').css('display', 'block');
                $('body').addClass('loading');
            },
            complete: function () {
                $('#loading-image').css('display', 'none');
                $("body").removeClass("loading");
            },
            success: function (response) {
                if (response.status)
                {
                    $("#popupshow").html(response.viewhtml);
                    $("#accountingviewModal").css({"display": "block"});
                } else
                {
                    openDanger(response.msg);
                }
            }
        });
    }
});

$(document).on("click", ".close, .closebtn", function () {
    $("#accountingviewModal").css({"display": "none"});
    $("#deleteAccountingmodal").css({"display": "none"});
});

$(document).on("keypress keyup blur", ".allownumericwithdecimal", function (event) {
    $(this).val($(this).val().replace(/[^0-9\.]/g, ''));
    if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
        event.preventDefault();
    }
});

$(document).on('click', '.switchstatus', function () {
    var accountid = $(this).attr('data-id');
    var status = $(this).attr('data-status');
    if (accountid)
    {
        $.ajax({
            url: baseurl + 'accounting/changestatus',
            type: 'POST',
            data: {accountid: accountid, status: status},
            dataType: 'json',
            async: false,
            beforeSend: function () {
                $("#status_" + accountid).addClass('switchdisable');
            },
            complete: function () {
                $("#status_" + accountid).removeClass('switchdisable');
            },
            success: function (response) {
                if (response.status)
                {
                    if (status == 1)
                    {
                        $("#status_" + accountid).attr('data-status', 0);
                        $("#status_" + accountid).prop('checked', false);

                    } else
                    {
                        $("#status_" + accountid).attr('data-status', 1);
                        $("#status_" + accountid).prop('checked', true);

                    }
                    openSuccess(response.msg);
                } else
                {
                    openDanger(response.msg);
                }
            }
        });
    }
});

$(document).on('click', '.accountingdelete', function () {
    var accountid = $(this).attr('data-id');
    if (accountid)
    {
        $.ajax({
            url: baseurl + 'accounting/deletepopup',
            type: 'POST',
            data: {accountid: accountid},
            dataType: 'json',
            async: false,
            beforeSend: function () {
                $('#loading-image').css('display', 'block');
                $('body').addClass('loading');
            },
            complete: function () {
                $('#loading-image').css('display', 'none');
                $("body").removeClass("loading");
            },
            success: function (response) {
                if (response.status)
                {
                    $("#popupshow").html(response.viewhtml);
                    $("#deleteAccountingmodal").css({"display": "block"});
                } else
                {
                    openDanger(response.msg);
                }
            }
        });
    }
});

$(document).on('click', '.downloadexport', function () {
    $.ajax({
        url: baseurl + 'accounting/downloadexcel',
        type: 'POST',
        dataType: 'json',
        async: false,
        beforeSend: function () {
            $('#loading-image').css('display', 'block');
            $('body').addClass('loading');
        },
        complete: function () {
            $('#loading-image').css('display', 'none');
            $("body").removeClass("loading");
        },
        success: function (response) {
            if (response.status)
            {
                window.location = response.filename;
                deleteexportfile(response.filename);
            } else
            {
                openDanger(response.msg);
            }
        }
    });

});