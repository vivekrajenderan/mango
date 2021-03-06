$(document).ready(function () {
    $("#customer-form").validate({
        highlight: function (element) {
            $(element).closest('.elVal').addClass("form-field text-error");
        },
        unhighlight: function (element) {
            $(element).closest('.elVal').removeClass("form-field text-error");
        }, errorElement: 'span',
        rules: {
            cusname: {
                required: true
            },
            cussex: {
                required: true
            },
            cusmobileno: {
                required: true,
                minlength: 10,
                maxlength: 10,
                digits: true,
            },
            accountno: {
                required: true,
                minlength: 1,
                maxlength: 30,
                digits: true,
            },
            cusemail: {
                required: false,
                email: true
            },
            cusaddress: {
                required: true,
                minlength: 10,
                maxlength: 300
            },
            profile: {
                required: true,
                imagefilecheck: true
            },
            aadhardocument: {
                required: true,
                imagefilecheck: true
            }

        },
        messages: {
            cusname: {
                required: "Please enter customer name"
            },
            cussex: {
                required: "Please choose gender"
            },
            cusdob: {
                required: "Please choose D.O.B"
            },
            pan: {
                required: "Please enter the PAN No"
            },
            cusmobileno: {
                required: "Please enter the mobile no"
            },
            accountno: {
                required: "Please enter the Account No"
            },
            cusaddress: {
                required: "Please enter the address"
            },
            profile: {
                required: "Please choose the profile"
            },
            aadhardocument: {
                required: "Please choose the aadhar document"
            }
        },
        errorPlacement: function (error, element) {
            error.appendTo(element.closest(".elVal"));
        },
        submitHandler: function (form) {
            var formData = new FormData($('#customer-form')[0]);
            formData.append('aadhardocument', $('#aadhardocument')[0].files[0]);
            formData.append('profile', $('#profile')[0].files[0]);
            var $form = $("#customer-form");
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
                    window.location = baseurl + 'customers';
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
$(document).on('click', '#profile-close-preview', function () {
    console.log('came');
    $('#profile_image_content .image-preview').popover('hide');
    // Hover befor close the preview
    $('#profile_image_content .image-preview').hover(
            function () {
                $('#profile_image_content .image-preview').popover('show');
            },
            function () {
                $('#profile_image_content .image-preview').popover('hide');
            }
    );
});
$(document).on('click', '#aadhar-close-preview', function () {
    $('#document_image_content .image-preview').popover('hide');
    // Hover befor close the preview
    $('#document_image_content .image-preview').hover(
            function () {
                $('#document_image_content .image-preview').popover('show');
            },
            function () {
                $('#document_image_content .image-preview').popover('hide');
            }
    );
});

$(function () {
    // Create the close button
    var profileclosebtn = $('<button/>', {
        type: "button",
        text: 'x',
        id: 'profile-close-preview',
        style: 'font-size: initial;',
    });
    profileclosebtn.attr("class", "close pull-right");
    // Profile Document
    $('#profile_image_content .image-preview').popover({
        trigger: 'manual',
        html: true,
        title: "<strong>Preview</strong>" + $(profileclosebtn)[0].outerHTML,
        content: "There's no image",
        placement: 'bottom'
    });
    // Clear event
    $('#profile_image_content .image-preview-clear').click(function () {
        $('#profile_image_content .image-preview').attr("data-content", "").popover('hide');
        $('#profile_image_content .image-preview-filename').val("");
        $('#profile_image_content .image-preview-clear').hide();
        $('#profile_image_content .image-preview-input input:file').val("");
        $("#profile_image_content .image-preview-input-title").text("Browse");
    });
    // Create the preview image
    $("#profile_image_content .image-preview-input input:file").change(function () {
        var img = $('<img/>', {
            id: 'dynamic',
            width: 250,
            height: 200
        });
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            $("#profile_image_content .image-preview-input-title").text("Change");
            $("#profile_image_content .image-preview-clear").show();
            $("#profile_image_content .image-preview-filename").val(file.name);
            img.attr('src', e.target.result);
            $("#profile_image_content .image-preview").attr("data-content", $(img)[0].outerHTML).popover("show");
        }
        reader.readAsDataURL(file);
    });
    
     // Aadhar Document
     // Create the close button
    var aadharclosebtn = $('<button/>', {
        type: "button",
        text: 'x',
        id: 'aadhar-close-preview',
        style: 'font-size: initial;',
    });
    aadharclosebtn.attr("class", "close pull-right");
    $('#document_image_content .image-preview').popover({
        trigger: 'manual',
        html: true,
        title: "<strong>Preview</strong>" + $(aadharclosebtn)[0].outerHTML,
        content: "There's no image",
        placement: 'bottom'
    });
    // Clear event
    $('#document_image_content .image-preview-clear').click(function () {
        $('#document_image_content .image-preview').attr("data-content", "").popover('hide');
        $('#document_image_content .image-preview-filename').val("");
        $('#document_image_content .image-preview-clear').hide();
        $('#document_image_content .image-preview-input input:file').val("");
        $("#document_image_content .image-preview-input-title").text("Browse");
    });
    // Create the preview image
    $("#document_image_content .image-preview-input input:file").change(function () {
        var img = $('<img/>', {
            id: 'dynamic',
            width: 250,
            height: 200
        });
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            $("#document_image_content .image-preview-input-title").text("Change");
            $("#document_image_content .image-preview-clear").show();
            $("#document_image_content .image-preview-filename").val(file.name);
            img.attr('src', e.target.result);
            $("#document_image_content .image-preview").attr("data-content", $(img)[0].outerHTML).popover("show");
        }
        reader.readAsDataURL(file);
    });
});

function RemoveImage()
{
    $("#document_image").hide();
    $("#document_image_content").show();
}
function RemoveProfileImage()
{
    $("#profile_image").hide();
    $("#profile_image_content").show();
}

$(document).on('click', '.customerview', function () {
    var custid = $(this).attr('data-id');
    if (custid)
    {
        $.ajax({
            url: baseurl + 'customers/view',
            type: 'POST',
            data: {custid: custid},
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
                    $("#customerviewModal").css({"display": "block"});
                } else
                {
                    openDanger(response.msg);
                }
            }
        });
    }
});

$(document).on("click", ".close, .closebtn", function () {
    $("#customerviewModal").css({"display": "none"});
    $("#deleteEmployemodal").css({"display": "none"});
});

$(document).on("keypress keyup blur", ".allownumericwithdecimal", function (event) {
    $(this).val($(this).val().replace(/[^0-9\.]/g, ''));
    if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
        event.preventDefault();
    }
});

$(document).on('click', '.switchstatus', function () {
    var custid = $(this).attr('data-id');
    var status = $(this).attr('data-status');
    if (custid)
    {
        $.ajax({
            url: baseurl + 'customers/changestatus',
            type: 'POST',
            data: {custid: custid, status: status},
            dataType: 'json',
            async: false,
            beforeSend: function () {
                $("#status_" + custid).addClass('switchdisable');
            },
            complete: function () {
                $("#status_" + custid).removeClass('switchdisable');
            },
            success: function (response) {
                if (response.status)
                {
                    if (status == 1)
                    {
                        $("#status_" + custid).attr('data-status', 0);
                        $("#status_" + custid).prop('checked', false);

                    } else
                    {
                        $("#status_" + custid).attr('data-status', 1);
                        $("#status_" + custid).prop('checked', true);

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

$(document).on('click', '.customerdelete', function () {
    var custid = $(this).attr('data-id');
    if (custid)
    {
        $.ajax({
            url: baseurl + 'customers/deletepopup',
            type: 'POST',
            data: {custid: custid},
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
        url: baseurl + 'customers/downloadexcel',
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
                setTimeout(function () {
                    deleteexportfile(response.filename);
                }, 3000);

            } else
            {
                openDanger(response.msg);
            }
        }
    });

});