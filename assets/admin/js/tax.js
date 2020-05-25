$(document).ready(function () {
    $("#tax-form").validate({
        highlight: function (element) {
            $(element).closest('.elVal').addClass("form-field text-error");
        },
        unhighlight: function (element) {
            $(element).closest('.elVal').removeClass("form-field text-error");
        }, errorElement: 'span',
        rules: {
            taxname: {
                required: true
            }
        },
        messages: {
            taxname: {
                required: "Please enter tax name"
            }
        },
        errorPlacement: function (error, element) {
            error.appendTo(element.closest(".elVal"));
        },
        submitHandler: function (form) {
            var $form = $("#tax-form");
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

    var wrapper = $(".input_fields_wrap"); //Fields wrapper
    var add_button = $(".add_field_button"); //Add button ID

    var x = 1; //initlal text box count
    $(add_button).click(function (e) { //on add input button click
        e.preventDefault();
        x++; //text box increment
        $(wrapper).append('<div class="form-group"><div class="form-line"><input type="text" name="grouptaxname[]" data-id="0" class="form-control measure" placeholder="Name"/><span class="remove_field pull-right"><a href="javascript:void(0);"><i class="material-icons">remove_circle</i></a></span></div></div>'); //add input box

    });
    $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
        e.preventDefault();
        $(this).parent('div').remove();
        x--;
    })

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

var taxgroupadd = 1;
function taxgroup_fields() {

    taxgroupadd++;
    var objTo = document.getElementById('taxgroup_fields')
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "form-group removeclass" + taxgroupadd);
    var rdiv = 'removeclass' + taxgroupadd;
    divtest.innerHTML = '<div class="col-sm-3 nopadding"><div class="form-group"> <input type="text" class="form-control" id="taxgroupname" name="taxgroupname[]" value="" placeholder="Tax Group Name"></div></div><div class="col-sm-3 nopadding"><div class="form-group"> <input type="text" class="form-control" id="taxgrouppercentage" name="taxgrouppercentage[]" value="" placeholder="Percentage"></div></div><div class="col-sm-3 nopadding"><div class="form-group"> <input type="text" class="form-control" id="taxgroupcomments" name="taxgroupcomments[]" value="" placeholder="Comments"></div></div><div class="col-sm-3 nopadding"><div class="form-group"><div class="input-group"><div class="input-group-btn"> <button class="btn btn-danger" type="button" onclick="remove_taxgroup_fields(' + taxgroupadd + ');"> <span class="fa fa-minus" aria-hidden="true"></span> </button></div></div></div></div><div class="clear"></div>';

    objTo.appendChild(divtest)
}
function remove_taxgroup_fields(rid) {
    $('.removeclass' + rid).remove();
}