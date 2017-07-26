$(window).on('load', function () {
    $.get(ajaxurl, {'action':'click_history_ajax'}, function (d) {


    }, 'json');
})
