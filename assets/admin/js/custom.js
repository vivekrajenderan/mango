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