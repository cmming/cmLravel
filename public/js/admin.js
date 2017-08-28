/**
 * Created by Administrator on 2017/8/28.
 */

var api_base_url = 'http://192.168.0.88/laravel/ldg/blog/public/admin';
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})
$('.post-audit').on('click',function(){
    var post_id = $(this).attr('post-id'),status = $(this).attr('post-action-status');
    $.ajax({
        url:api_base_url+'/posts/'+post_id+'/status',
        method:'post',
        data:{status:status},
        dataType:'json',
        success:function(data){
            consol.log(data);
            if(data.error ==0){
                window.location.href = 'http://192.168.0.88/laravel/ldg/blog/public/admin/posts';
            }
        }
    });
});