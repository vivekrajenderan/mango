$(document).ready(function () {
    $(document).on('click', '.dailydownloadexport', function () {
        var dailyformData = {
            fk_customer_id: $('#fk_customer_id').val(),
            fk_loan_id: $('#fk_loan_id').val(),
        }
        $.ajax({
            url: baseurl + 'reports/dailydownloadexcel',
            type: 'POST',
            data: dailyformData,
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
                    window.location = baseurl+response.filename;
                    deleteexportfile(response.filename);
                } else
                {
                    openDanger(response.msg);
                }
            }
        });
    });
    $(document).on('click', '.loandetaileddownloadexport', function () {
        var dailyformData = {
            fk_customer_id: $('#fk_customer_id').val(),
            fk_loan_id: $('#fk_loan_id').val(),
            fdate: $('#fdate').val(),
            edate: $('#edate').val(),
        }
        $.ajax({
            url: baseurl + 'reports/loandetaileddownloadexcel',
            type: 'POST',
            data: dailyformData,
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
                    window.location = baseurl+response.filename;
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
    $(document).on('click', '.monthlypaymentreport', function () {
        var dailyformData = {
            fk_customer_id: $('#fk_customer_id').val(),
            fk_loan_id: $('#fk_loan_id').val(),
            month: $('#month').val(),
        }
        $.ajax({
            url: baseurl + 'reports/monthlypaymentreportdownloadexcel',
            type: 'GET',
            data: dailyformData,
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
                    window.location = baseurl+response.filename;
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
    $("#monthdate").datepicker({
        format: "yyyy-mm",
        viewMode: "months",
        minViewMode: "months"
    });
    $("#year").datepicker({
        format: "yyyy",
        viewMode: "years",
        minViewMode: "years"
    });

    $("#monthlyReport").submit(function (e)
    {
        var formObj = $(this);
        var formURL = formObj.attr("action");
        var formData = new FormData(this);
        $.ajax({
            url: formURL,
            type: 'POST',
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            dataType: 'json',
            success: function (response)
            {
                if (response.status)
                {
                    $("#ajaxReport").html(response.content);
                } else
                {
                    openDanger(response.msg);
                }

            }
        });
        e.preventDefault();
    });
    $("#yearlyReport").submit(function (e)
    {
        var formObj = $(this);
        var formURL = formObj.attr("action");
        var formData = new FormData(this);
        $.ajax({
            url: formURL,
            type: 'POST',
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            dataType: 'json',
            success: function (response)
            {
                if (response.status)
                {
                    $("#ajaxReport").html(response.content);
                } else
                {
                    openDanger(response.msg);
                }

            }
        });
        e.preventDefault();
    });
});
