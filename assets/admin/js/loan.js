$(document).ready(function () {
    $("#vechilemodelyear").datepicker({
        format: "yyyy",
        viewMode: "years",
        minViewMode: "years"
    });
    $("#loan-form").validate({
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
            },            
            commission: {
                number: true,
                min: 0,
                max: 100,
            },
            vechilenumber: {
                required: true
            },
            vechilename: {
                required: true
            },
            vechilemodelyear: {
                required: true,
                digits: true,
            },
            vechilercno: {
                required: true
            },
            rcdocument: {
                required: true,
                imagefilecheck: true
            },
            originalloanamount: {
                required: true
            },
            loanperiod: {
                required: true,
            },
            loanperiodfrequency: {
                required: true
            },
            loanintrestrate: {
                required: true
            },
            security1name: {
                required: true
            },
            security1aadhar: {
                required: true,
                digits: true
            },
            security1mobileno: {
                required: true,
                digits: true
            },
            security2aadhar: {
                required: false,
                digits: true
            },
            security2mobileno: {
                required: false,
                digits: true
            },
            security1profile: {
                required: false,
                imagefilecheck: true
            },

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
            },
            commission: {
                number: "Commission Percentage is invalid",
                min: "Commission Percentage is invalid",
                max: "Commission Percentage is invalid",
            },
            vechilenumber: {
                required: "Please enter the vehicle number"
            },
            vechilename: {
                required: "Please enter the vehicle name"
            },
            vechilemodelyear: {
                required: "Please enter the vehicle model year"
            },
            vechilercno: {
                required: "Please enter the vehicle RC No"
            },
            rcdocument: {
                required: "Please choose the RC Document"
            },
            originalloanamount: {
                required: "Please enter the loan amount"
            },
            loanperiod: {
                required: "Please enter the loan period"
            },
            loanperiodfrequency: {
                required: "Please choose the loan period frequency"
            },
            loanintrestrate: {
                required: "Please enter the loan interest rate"
            },
            security1name: {
                required: "Please enter the security1 Name"
            },
            security1aadhar: {
                required: "Please enter the security1 Aadhar"
            },
            security1mobileno: {
                required: "Please enter the security1 Mobile No"
            },
            security1profile: {
                required: "Please choose the security1 Image"
            },

        },
        errorPlacement: function (error, element) {
            error.appendTo(element.closest(".elVal"));
        },
        submitHandler: function (form) {
            var formData = new FormData($('#loan-form')[0]);
            formData.append('rcdocument', $('input[type=file]')[0].files[0]);
            var $form = $("#loan-form");
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
                    window.location = baseurl + 'loan';
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

    $("#payment-form").validate({
        highlight: function (element) {
            $(element).closest('.elVal').addClass("form-field text-error");
        },
        unhighlight: function (element) {
            $(element).closest('.elVal').removeClass("form-field text-error");
        }, errorElement: 'span',
        rules: {
            subamount: {
                required: true
            },
            fineintrest: {
                required: '#fineintrestcheck:checked'
            },
            fineamount: {
                required: '#fineintrestcheck:checked'
            },
        },
        messages: {
            subamount: {
                required: "Please enter the EMI amount"
            },
            fineintrest: {
                required: "Please enter the Fine intrest"
            },
            fineamount: {
                required: "Please enter the Fine amount"
            },
        },
        errorPlacement: function (error, element) {
            error.appendTo(element.closest(".elVal"));
        },
        submitHandler: function (form) {
            var formData = new FormData($('#payment-form')[0]);
            var $form = $("#payment-form");
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
                    window.location = baseurl + 'loan';
                } else
                {
                    openDanger(response.msg);
                }
            });
            return false; // required to block normal submit since you used ajax
        }
    });
});
$('#originalloanamount,#loanperiod,#loanintrestrate').blur(function () {
    var params = {
        originalloanamount: ($('#originalloanamount').val() != '') ? $('#originalloanamount').val() : 1,
        loanperiod: ($('#loanperiod').val() != '') ? $('#loanperiod').val() : 1,
        loanintrestrate: ($('#loanintrestrate').val() != '') ? $('#loanintrestrate').val() : 1,
    }
    $.ajax({
        url: baseurl + 'loan/emiview',
        type: 'POST',
        data: params,
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
                console.log(response);
            } else
            {
                openDanger(response.msg);
            }
        }
    });
});
$('#fk_employee_id').change(function () {
    var amountPercentage = $('option:selected', this).attr('data-default');

    $('#commission').val(parseFloat(amountPercentage).toFixed(2));
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

$(document).on('click', '#profile-close-preview', function () {    
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
$(document).on('click', '#rc-close-preview', function () {
    $('#rc_image_content .image-preview').popover('hide');
    // Hover befor close the preview
    $('#rc_image_content .image-preview').hover(
            function () {
                $('#rc_image_content .image-preview').popover('show');
            },
            function () {
                $('#rc_image_content .image-preview').popover('hide');
            }
    );
});
$(document).on('click', '#customer_profile-close-preview', function () {
    $('#customer_profile_image_content .image-preview').popover('hide');
    // Hover befor close the preview
    $('#customer_profile_image_content .image-preview').hover(
            function () {
                $('#customer_profile_image_content .image-preview').popover('show');
            },
            function () {
                $('#customer_profile_image_content .image-preview').popover('hide');
            }
    );
});


$(document).on('click', '#customer_document-close-preview', function () {
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
    var closebtn = $('<button/>', {
        type: "button",
        text: 'x',
        id: 'rc-close-preview',
        style: 'font-size: initial;',
    });
    closebtn.attr("class", "close pull-right");
    // Set the popover default content
    $('#rc_image_content .image-preview').popover({
        trigger: 'manual',
        html: true,
        title: "<strong>Preview</strong>" + $(closebtn)[0].outerHTML,
        content: "There's no image",
        placement: 'bottom'
    });
    // Clear event
    $('#rc_image_content .image-preview-clear').click(function () {
        $('#rc_image_content .image-preview').attr("data-content", "").popover('hide');
        $('#rc_image_content .image-preview-filename').val("");
        $('#rc_image_content .image-preview-clear').hide();
        $('#rc_image_content .image-preview-input input:file').val("");
        $("#rc_image_content .image-preview-input-title").text("Browse");
    });
    // Create the preview image
    $("#rc_image_content .image-preview-input input:file").change(function () {
        var img = $('<img/>', {
            id: 'dynamic',
            width: 250,
            height: 200
        });
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            $("#rc_image_content .image-preview-input-title").text("Change");
            $("#rc_image_content .image-preview-clear").show();
            $("#rc_image_content .image-preview-filename").val(file.name);
            img.attr('src', e.target.result);
            $("#rc_image_content  .image-preview").attr("data-content", $(img)[0].outerHTML).popover("show");
        }
        reader.readAsDataURL(file);
    });

    // Security1 Image
    var profileclosebtn = $('<button/>', {
        type: "button",
        text: 'x',
        id: 'profile-close-preview',
        style: 'font-size: initial;',
    });
    profileclosebtn.attr("class", "close pull-right");
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
    
    
     // Customer Profile Start
    var customerprofileclosebtn = $('<button/>', {
        type: "button",
        text: 'x',
        id: 'customer_profile-close-preview',
        style: 'font-size: initial;',
    });
    customerprofileclosebtn.attr("class", "close pull-right");
    $('#customer_profile_image_content .image-preview').popover({
        trigger: 'manual',
        html: true,
        title: "<strong>Preview</strong>" + $(customerprofileclosebtn)[0].outerHTML,
        content: "There's no image",
        placement: 'bottom'
    });
    // Clear event
    $('#customer_profile_image_content .image-preview-clear').click(function () {
        $('#customer_profile_image_content .image-preview').attr("data-content", "").popover('hide');
        $('#customer_profile_image_content .image-preview-filename').val("");
        $('#customer_profile_image_content .image-preview-clear').hide();
        $('#customer_profile_image_content .image-preview-input input:file').val("");
        $("#customer_profile_image_content .image-preview-input-title").text("Browse");
    });
    // Create the preview image
    $("#customer_profile_image_content .image-preview-input input:file").change(function () {
        var img = $('<img/>', {
            id: 'dynamic',
            width: 250,
            height: 200
        });
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            $("#customer_profile_image_content .image-preview-input-title").text("Change");
            $("#customer_profile_image_content .image-preview-clear").show();
            $("#customer_profile_image_content .image-preview-filename").val(file.name);
            img.attr('src', e.target.result);
            $("#customer_profile_image_content .image-preview").attr("data-content", $(img)[0].outerHTML).popover("show");
        }
        reader.readAsDataURL(file);
    });
    
    // Customer Profile End
    
    // Proff Start
    var customedocclosebtn = $('<button/>', {
        type: "button",
        text: 'x',
        id: 'customer_document-close-preview',
        style: 'font-size: initial;',
    });
    customedocclosebtn.attr("class", "close pull-right");
    $('#document_image_content .image-preview').popover({
        trigger: 'manual',
        html: true,
        title: "<strong>Preview</strong>" + $(customedocclosebtn)[0].outerHTML,
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
    // Proff End
});

function RemoveImage()
{
    $("#rc_image").hide();
    $("#rc_image_content").show();
}

function ProfileRemoveImage()
{
    $("#profile_image").hide();
    $("#profile_image_content").show();
}

function RemoveAadharImage()
{
    $("#document_image").hide();
    $("#document_image_content").show();
}

function RemoveProfileImage()
{
    $("#customer_profile_image").hide();
    $("#customer_profile_image_content").show();
}
$(document).on('click', '.loanview', function () {
    var loanid = $(this).attr('data-id');
    if (loanid)
    {
        $.ajax({
            url: baseurl + 'loan/view',
            type: 'POST',
            data: {loanid: loanid},
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
                    $("#loanviewModal").css({"display": "block"});
                } else
                {
                    openDanger(response.msg);
                }
            }
        });
    }
});

$(document).on("click", ".close, .closebtn", function () {
    $("#loanviewModal").css({"display": "none"});
    $("#paymentviewModal").css({"display": "none"});
    $("#deleteLoanmodal").css({"display": "none"});
    $("#approveLoanmodal").css({"display": "none"});
});

$(document).on("keypress keyup blur", ".allownumericwithdecimal", function (event) {
    $(this).val($(this).val().replace(/[^0-9\.]/g, ''));
    if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
        event.preventDefault();
    }
});

$(document).on('click', '.switchstatus', function () {
    var loanid = $(this).attr('data-id');
    var status = $(this).attr('data-status');
    if (loanid)
    {
        $.ajax({
            url: baseurl + 'loan/changestatus',
            type: 'POST',
            data: {loanid: loanid, status: status},
            dataType: 'json',
            async: false,
            beforeSend: function () {
                $("#status_" + loanid).addClass('switchdisable');
            },
            complete: function () {
                $("#status_" + loanid).removeClass('switchdisable');
            },
            success: function (response) {
                if (response.status)
                {
                    if (status == 1)
                    {
                        $("#status_" + loanid).attr('data-status', 0);
                        $("#status_" + loanid).prop('checked', false);

                    } else
                    {
                        $("#status_" + loanid).attr('data-status', 1);
                        $("#status_" + loanid).prop('checked', true);

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

$(document).on('click', '.loandelete', function () {
    var loanid = $(this).attr('data-id');
    $("#approveLoanmodal").hide();
    if (loanid)
    {
        $.ajax({
            url: baseurl + 'loan/deletepopup',
            type: 'POST',
            data: {loanid: loanid},
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
                    $("#deleteLoanmodal").css({"display": "block"});
                } else
                {
                    openDanger(response.msg);
                }
            }
        });
    }
});

$(document).on('click', '.approveloan', function () {
    var loanid = $(this).attr('data-id');
    $("#deleteLoanmodal").hide();
    if (loanid)
    {
        $.ajax({
            url: baseurl + 'loan/approvepopup',
            type: 'POST',
            data: {loanid: loanid},
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
                    $("#approveLoanmodal").css({"display": "block"});
                    $(".ui-datepicker").datepicker({
                        format: 'dd/mm/yyyy'
                    });
                } else
                {
                    openDanger(response.msg);
                }
            }
        });
    }
});

$(document).on('click', '.makepayment', function () {
    var loanid = $(this).attr('data-id');
    if (loanid)
    {
        $.ajax({
            url: baseurl + 'loan/paymenthistory',
            type: 'POST',
            data: {loanid: loanid},
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
                    $("#paymentviewModal").css({"display": "block"});
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
        url: baseurl + 'loan/downloadexcel',
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
$(document).on('click', '.loansubmit', function () {
    $("#approve-form").validate({
        highlight: function (element) {
            $(element).closest('.elVal').addClass("form-field text-error");
        },
        unhighlight: function (element) {
            $(element).closest('.elVal').removeClass("form-field text-error");
        }, errorElement: 'span',
        rules: {
            duedate: {
                required: true
            },
        },
        messages: {
            duedate: {
                required: "Please choose the due date"
            }
        },
        errorPlacement: function (error, element) {
            error.appendTo(element.closest(".elVal"));
        },
        submitHandler: function (form) {
            var formData = new FormData($('#approve-form')[0]);
            var $form = $("#approve-form");
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
                    window.location = baseurl + 'loan';
                } else
                {
                    openDanger(response.msg);
                }
            });
            return false; // required to block normal submit since you used ajax
        }
    });

});