var kpost = kpost || {};

kpost.i_history = function(pid){

    $.get(ajaxurl, {'action':'click_history_ajax', 'pid':pid}, function (d) {


    }, 'json');

}
kpost.show_history = function () {
    
}