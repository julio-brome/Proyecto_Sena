var mensaje = "";

function ver_success() {
    $(".alert-success").stop();
    $(".alert-fail").stop();
    $(".alert-success").html(mensaje);
    window.setTimeout(function () {
        $(".alert-success").slideDown(function () {
            $(".alert-success").fadeTo(4000, 500).slideUp(100, function () {
            });
        }); // 500 : Time will remain on the screen
    });
}

function ver_fail() {
    $(".alert-success").stop();
    $(".alert-fail").stop();
    $(".alert-fail").html(mensaje);
    window.setTimeout(function () {
        $(".alert-fail").slideDown(function () {
            $(".alert-fail").fadeTo(4000, 500).slideUp(100,function () {
            });
        }); // 500 : Time will remain on the screen
    });
}

$(document).on('click','.alert-success,.alert-fail', function () {
    $(".alert-success").stop();
    $(".alert-fail").stop();
    return false;
});