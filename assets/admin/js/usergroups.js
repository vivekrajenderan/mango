$(document).ready(function () {
    $("#usergroup-form").validate({
        highlight: function (element) {
            $(element).closest('.elVal').addClass("form-field text-error");
        },
        unhighlight: function (element) {
            $(element).closest('.elVal').removeClass("form-field text-error");
        }, errorElement: 'span',
        rules: {
            groupname: {
                required: true
            }
        },
        messages: {
            groupname: {
                required: "Please enter group name"
            }
        },
        errorPlacement: function (error, element) {
            error.appendTo(element.closest(".elVal"));
        },
        submitHandler: function (form) {
            var $form = $("#usergroup-form");
            $.ajax({
                type: $form.attr('method'),
                url: $form.attr('action'),
                data: $form.serialize(),
                dataType: 'json'
            }).done(function (response) {

                if (response.status)
                {
                    window.location = baseurl + 'usergroups';
                } else
                {
                    openDanger(response.msg);
                }
            });
            return false;
        }
    });
});

$(document).on('click', '.usergroupsview', function () {
    var usergroupid = $(this).attr('data-id');
    if (usergroupid)
    {
        $.ajax({
            url: baseurl + 'usergroups/view',
            type: 'POST',
            data: {usergroupid: usergroupid},
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
                    $("#usergroupsviewModal").css({"display": "block"});
                } else
                {
                    openDanger(response.msg);
                }
            }
        });
    }
});

$(document).on("click", ".close, .closebtn", function () {
    $("#usergroupsviewModal").css({"display": "none"});
    $("#deleteUsergroupModal").css({"display": "none"});
});

$(document).on('click', '.switchstatus', function () {
    var usergroupid = $(this).attr('data-id');
    var status = $(this).attr('data-status');
    if (usergroupid)
    {
        $.ajax({
            url: baseurl + 'usergroups/changestatus',
            type: 'POST',
            data: {usergroupid: usergroupid, status: status},
            dataType: 'json',
            async: false,
            beforeSend: function () {
                $("#status_" + usergroupid).addClass('switchdisable');
            },
            complete: function () {
                $("#status_" + usergroupid).removeClass('switchdisable');
            },
            success: function (response) {
                if (response.status)
                {
                    if (status == 1)
                    {
                        $("#status_" + usergroupid).attr('data-status', 0);
                        $("#status_" + usergroupid).prop('checked', false);

                    } else
                    {
                        $("#status_" + usergroupid).attr('data-status', 1);
                        $("#status_" + usergroupid).prop('checked', true);

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

$(document).on('click', '.usergroupsdelete', function () {
    var usergroupid = $(this).attr('data-id');
    if (usergroupid)
    {
        $.ajax({
            url: baseurl + 'usergroups/deletepopup',
            type: 'POST',
            data: {usergroupid: usergroupid},
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
                    $("#deleteUsergroupModal").css({"display": "block"});
                } else
                {
                    openDanger(response.msg);
                }
            }
        });
    }
});