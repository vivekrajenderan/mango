$(document).ready(function () {
    $("#employee-form").validate({
        highlight: function (element) {
            $(element).closest('.elVal').addClass("form-field text-error");
        },
        unhighlight: function (element) {
            $(element).closest('.elVal').removeClass("form-field text-error");
        }, errorElement: 'span',
        rules: {
            empl_name: {
                required: true
            },
            emplsex: {
                required: true
            },
            empl_dob: {
                required: true
            },
            fk_employeestatus_id: {
                required: true
            },
            empl_phone: {
                required: true,
                minlength: 10,
                maxlength: 10,
                Exist_Channel: true
            },
            empl_address: {
                required: true,
                minlength: 10,
                maxlength: 300
            },
            empl_pic: {
                required: true,
                imagefilecheck: true
            }

        },
        messages: {
            empl_name: {
                required: "Please enter employee name"
            },
            emplsex: {
                required: "Please choose gender"
            },
            empl_dob: {
                required: "Please choose D.O.B"
            },
            fk_employeestatus_id: {
                required: "Please choose Marital Status"
            },
            empl_phone: {
                required: "Please enter the phone no"
            },
            empl_address: {
                required: "Please enter the phone no"
            }
        },
        errorPlacement: function (error, element) {
            error.appendTo(element.closest(".elVal"));
        },
        submitHandler: function (form) {
            var formData = new FormData($('#employee-form')[0]);
            formData.append('channel_logo', $('input[type=file]')[0].files[0]);
            var $form = $("#category-form");
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

                if (response.status == "1")
                {
                    //window.location = "<?php echo base_url(); ?>admin/category/channel_list";
                } else
                {
                    $('.alert-danger').show();
                    $('.alert-danger').html(response.msg);
                    setTimeout(function () {
                        $('.alert-danger').hide('slow');
                    }, 4000);
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