var kpost = kpost || {};

kpost.i_history = function(pid){

    $.get(ajaxurl, {'action':'click_history_ajax', 'pid':pid}, function (d) {


    }, 'json');

}

var ksosh = ksosh || {};

ksosh.indexShare = function(){

    if(is_single_page || is_mobile){
        return ;
    }

    $("div[id^='kxxx-sosh-']").each(function(){
        var pid = $(this).attr('id');
        var postId = $(this).attr('data-post-id');
        var atitle = $('#post-' + postId + ' .entry-title a');

        var params = {
            // 分享的链接，默认使用location.href
            url: atitle.attr('href'),
            // 分享的标题，默认使用document.title
            title: atitle.text(),
            // 分享的摘要，默认使用<meta name="description" content="">content的值
            digest: '',
            // 分享的图片，默认获取本页面第一个img元素的src
            pic: '',
            // 选择要显示的分享站点，顺序同sites数组顺序，
            // 支持设置的站点有weixin,yixin,weibo,qzone,tqq,douban,renren,tieba
            sites: ['weixin', 'weibo', 'qzone']
        };

        sosh('#' + pid, params);
    })

}

ksosh.singleShare = function(){
    if(!is_single_page){
        return ;
    }
    var postId = $('#kxxx-sosh').attr('data-post-id');
    var atitle = $('#post-' + postId + ' .kxxx-single-title');

    var params = {
        // 分享的链接，默认使用location.href
        url: '',
        // 分享的标题，默认使用document.title
        title: atitle.text(),
        // 分享的摘要，默认使用<meta name="description" content="">content的值
        digest: '',
        // 分享的图片，默认获取本页面第一个img元素的src
        pic: '',
        // 选择要显示的分享站点，顺序同sites数组顺序，
        // 支持设置的站点有weixin,yixin,weibo,qzone,tqq,douban,renren,tieba
        sites: ['weixin', 'weibo', 'qzone']
    };
    if(is_mobile){
        soshm('#kxxx-sosh', params);
    }else{
        sosh('#kxxx-sosh', params);
    }
}

$(function () {
    ksosh.indexShare();
    ksosh.singleShare();
})