$(document).ready(function () {
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
