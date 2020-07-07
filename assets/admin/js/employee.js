$(document).ready(function () {
    $("#employee-form").validate({
        highlight: function (element) {
            $(element).closest('.elVal').addClass("form-field text-error");
        },
        unhighlight: function (element) {
            $(element).closest('.elVal').removeClass("form-field text-error");
        }, errorElement: 'span',
        rules: {
            empname: {
                required: true
            },
            emplsex: {
                required: true
            },
            dob: {
                required: true
            },
            fk_maritalstatus_id: {
                required: true
            },
            phone: {
                required: true,
                minlength: 10,
                maxlength: 10,
            },
            email: {
                required: false,
                email: true
            },
            address: {
                required: true,
                minlength: 10,
                maxlength: 300
            },
            profileimage: {
                required: true,
                imagefilecheck: true
            }

        },
        messages: {
            empname: {
                required: "Please enter employee name"
            },
            emplsex: {
                required: "Please choose gender"
            },
            dob: {
                required: "Please choose D.O.B"
            },
            fk_maritalstatus_id: {
                required: "Please choose Marital Status"
            },
            phone: {
                required: "Please enter the phone no"
            },
            address: {
                required: "Please enter the address"
            },
            profileimage: {
                required: "Please choose the profile picture"
            }
        },
        errorPlacement: function (error, element) {
            error.appendTo(element.closest(".elVal"));
        },
        submitHandler: function (form) {
            var formData = new FormData($('#employee-form')[0]);
            formData.append('profileimage', $('input[type=file]')[0].files[0]);
            var $form = $("#employee-form");
            $.ajax({
                type: $form.attr('method'),
                url: $form.attr('action'),
                data: formData,
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json'
            }).done(function (response) {

                if (response.status)
                {
                    window.location = baseurl + 'employees';
                } else
                {
                    openDanger(response.msg);
                }
            });
            return false; // required to block normal submit since you used ajax
        }
    });
    $.validator.addMethod("imagefilecheck", function (value, element) {
        var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
        if ($.inArray(value.split('.').pop().toLowerCase(), fileExtension) == -1) {
            return false;
        } else
        {
            return true;
        }
    }, "Please choose format type .jpg, .jpeg, .png, .gif, .bmp");
});
$(document).on('click', '#close-preview', function () {
    $('.image-preview').popover('hide');
    // Hover befor close the preview
    $('.image-preview').hover(
            function () {
                $('.image-preview').popover('show');
            },
            function () {
                $('.image-preview').popover('hide');
            }
    );
});

$(function () {
    // Create the close button
    var closebtn = $('<button/>', {
        type: "button",
        text: 'x',
        id: 'close-preview',
        style: 'font-size: initial;',
    });
    closebtn.attr("class", "close pull-right");
    // Set the popover default content
    $('.image-preview').popover({
        trigger: 'manual',
        html: true,
        title: "<strong>Preview</strong>" + $(closebtn)[0].outerHTML,
        content: "There's no image",
        placement: 'bottom'
    });
    // Clear event
    $('.image-preview-clear').click(function () {
        $('.image-preview').attr("data-content", "").popover('hide');
        $('.image-preview-filename').val("");
        $('.image-preview-clear').hide();
        $('.image-preview-input input:file').val("");
        $(".image-preview-input-title").text("Browse");
    });
    // Create the preview image
    $(".image-preview-input input:file").change(function () {
        var img = $('<img/>', {
            id: 'dynamic',
            width: 250,
            height: 200
        });
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            $(".image-preview-input-title").text("Change");
            $(".image-preview-clear").show();
            $(".image-preview-filename").val(file.name);
            img.attr('src', e.target.result);
            $(".image-preview").attr("data-content", $(img)[0].outerHTML).popover("show");
        }
        reader.readAsDataURL(file);
    });
});

function RemoveImage()
{
    $("#profile_image").hide();
    $("#profile_image_content").show();
}

$(document).on('click', '.employeeview', function () {
    var empid = $(this).attr('data-id');
    if (empid)
    {
        $.ajax({
            url: baseurl + 'employees/view',
            type: 'POST',
            data: {empid: empid},
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
                    $("#employeeviewModal").css({"display": "block"});
                } else
                {
                    openDanger(response.msg);
                }
            }
        });
    }
});

$(document).on("click", ".close, .closebtn", function () {
    $("#employeeviewModal").css({"display": "none"});
    $("#deleteEmployemodal").css({"display": "none"});
});

$(document).on("keypress keyup blur", ".allownumericwithdecimal", function (event) {
    $(this).val($(this).val().replace(/[^0-9\.]/g, ''));
    if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
        event.preventDefault();
    }
});

$(document).on('click', '.switchstatus', function () {
    var empid = $(this).attr('data-id');
    var status = $(this).attr('data-status');
    if (empid)
    {
        $.ajax({
            url: baseurl + 'employees/changestatus',
            type: 'POST',
            data: {empid: empid, status: status},
            dataType: 'json',
            async: false,
            beforeSend: function () {
                $("#status_" + empid).addClass('switchdisable');
            },
            complete: function () {
                $("#status_" + empid).removeClass('switchdisable');
            },
            success: function (response) {
                if (response.status)
                {
                    if (status == 1)
                    {
                        $("#status_" + empid).attr('data-status', 0);
                        $("#status_" + empid).prop('checked', false);

                    } else
                    {
                        $("#status_" + empid).attr('data-status', 1);
                        $("#status_" + empid).prop('checked', true);

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

$(document).on('click', '.employeedelete', function () {
    var empid = $(this).attr('data-id');
    if (empid)
    {
        $.ajax({
            url: baseurl + 'employees/deletepopup',
            type: 'POST',
            data: {empid: empid},
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
                    $("#deleteEmployemodal").css({"display": "block"});
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
        url: baseurl + 'employees/downloadexcel',
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