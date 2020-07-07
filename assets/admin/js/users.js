$(document).ready(function () {
    $("#users-form").validate({
        highlight: function (element) {
            $(element).closest('.elVal').addClass("form-field text-error");
        },
        unhighlight: function (element) {
            $(element).closest('.elVal').removeClass("form-field text-error");
        }, errorElement: 'span',
        rules: {
            fullname: {
                required: true
            },
            username: {
                required: true,
                noSpace: true
            },
            password: {
                required: true,
                minlength: 5
            },
            confirmpassword: {
                required: true,
                minlength: 5,
                equalTo: "#password"
            },
            fk_usergroups_id: {
                required: true
            },

        },
        messages: {
            fullname: {
                required: "Please enter the full name"
            },
            username: {
                required: "Please enter the user name"
            },
            password: {
                required: "Please enter the password"
            },
            confirmpassword: {
                required: "Please enter the confirm password",
                equalTo: "Enter Confirm Password Same as Password"
            },
            fk_usergroups_id: {
                required: "Please choose the user group"
            },
        },
        errorPlacement: function (error, element) {
            error.appendTo(element.closest(".elVal"));
        },
        submitHandler: function (form) {
            var $form = $("#users-form");
            $.ajax({
                type: $form.attr('method'),
                url: $form.attr('action'),
                data: $form.serialize(),
                dataType: 'json'
            }).done(function (response) {
                if (response.status)
                {
                    window.location = baseurl + 'users';
                } else
                {
                    openDanger(response.msg);
                }
            });
            return false; // required to block normal submit since you used ajax
        }
    });
    $.validator.addMethod("noSpace", function (value, element) {
        return value.indexOf(" ") < 0 && value != "";
    }, "No space please and don't leave it empty");
});

$(document).on('click', '.usersview', function () {
    var userid = $(this).attr('data-id');
    if (userid)
    {
        $.ajax({
            url: baseurl + 'users/view',
            type: 'POST',
            data: {userid: userid},
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
                    $("#usersviewModal").css({"display": "block"});
                } else
                {
                    openDanger(response.msg);
                }
            }
        });
    }
});

$(document).on("click", ".close, .closebtn", function () {
    $("#usersviewModal").css({"display": "none"});
    $("#usersdeletemodal").css({"display": "none"});
});

$(document).on("keypress keyup blur", ".allownumericwithdecimal", function (event) {
    $(this).val($(this).val().replace(/[^0-9\.]/g, ''));
    if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
        event.preventDefault();
    }
});

$(document).on('click', '.switchstatus', function () {
    var userid = $(this).attr('data-id');
    var status = $(this).attr('data-status');
    if (userid)
    {
        $.ajax({
            url: baseurl + 'users/changestatus',
            type: 'POST',
            data: {userid: userid, status: status},
            dataType: 'json',
            async: false,
            beforeSend: function () {
                $("#status_" + userid).addClass('switchdisable');
            },
            complete: function () {
                $("#status_" + userid).removeClass('switchdisable');
            },
            success: function (response) {
                if (response.status)
                {
                    if (status == 1)
                    {
                        $("#status_" + userid).attr('data-status', 0);
                        $("#status_" + userid).prop('checked', false);

                    } else
                    {
                        $("#status_" + userid).attr('data-status', 1);
                        $("#status_" + userid).prop('checked', true);

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

$(document).on('click', '.usersdelete', function () {
    var userid = $(this).attr('data-id');
    if (userid)
    {
        $.ajax({
            url: baseurl + 'users/deletepopup',
            type: 'POST',
            data: {userid: userid},
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
                    $("#usersdeletemodal").css({"display": "block"});
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
        url: baseurl + 'users/downloadexcel',
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