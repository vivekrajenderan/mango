function openSuccess(successMsg) {
    var alert = document.getElementById('successmsg');
    alert.style.display = "block";
    document.getElementById('success-text').innerHTML = successMsg;
    setTimeout(function () {
        alert.style.display = "none";
    }, 3000);
}

function openDanger(errorMsg) {
    var alerterror = document.getElementById('dangermsg');
    alerterror.style.display = "block";
    document.getElementById('error-text').innerHTML = errorMsg;
    setTimeout(function () {
        alerterror.style.display = "none";
    }, 3000);
}
setTimeout(function () {
    $("#flashsuccess").hide();
    $("#flasherror").hide();
}, 3000);

$(document).on("click", ".howl-close", function () {
    $("#flashsuccess").hide();
    $("#flasherror").hide();
});

function deleteexportfile(filename)
{
    if (filename)
    {
        $.ajax({
            url: baseurl + 'dashboard/DeleteDown/' + filename,
            type: 'GET',            
            success: function (response) {

            }
        });
    }
}