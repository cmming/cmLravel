var api_base_url = 'http://192.168.0.88/laravel/ldg/blog/public/';
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})
var editor = new wangEditor('content');
if(editor.config!=undefined){
    (editor.config.uploadImgUrl = api_base_url+'/posts/image/upload');
// 设置 headers（举例）
    editor.config.uploadHeaders = {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    };

    editor.create();
}


//为 关注 人

$('.like-button').on('click', function () {
    var isLike = $(this).attr('like-value'), target_id = $(this).attr('like-user'), me = this;
    //取消关注
    if (isLike == 1) {
        $.ajax({
            url: api_base_url + '/user/' + target_id + '/unFan',
            method: 'POST',
            dataType: 'json',
            success: function (data) {
                if (data.error == 0) {
                    $(me).attr('like-value', 1);
                    $(me).text('取消关注');
                }else{
                    alert(data.msg);
                }
            }
        })
    } else {
        $.ajax({
            url: api_base_url + '/user/' + target_id + '/fan',
            method: 'POST',
            dataType: 'json',
            success: function (data) {
                if (data.error == 0) {
                    $(me).attr('like-value', 1);
                    $(me).text('取消关注');
                }else{
                    alert(data.msg);
                }
            }
        })
    }
})