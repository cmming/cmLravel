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
//删除 专题
$('.resource-delete').on('click',function(){
    var r=confirm("是否删除专题"+$(this).attr('delete-title')+'?')
    if (r==true)
    {
        var url = $(this).attr('delete-url');
        $.ajax({
            url:url,
            method:'POST',
            data:{status:status,'_method':'delete'},
            dataType:'json',
            success:function(data){
                if(data.error ==0){
                    window.location.reload();
                }
            }
        });
    }
});
//删除 通知
$('.notice-delete').on('click',function(){
    var r=confirm("是否删除通知"+$(this).attr('delete-title')+'?')
    if (r==true)
    {
        var url = $(this).attr('delete-url');
        $.ajax({
            url:url,
            method:'POST',
            data:{status:status,'_method':'delete'},
            dataType:'json',
            success:function(data){
                if(data.error ==0){
                    window.location.reload();
                }
            }
        });
    }
});
