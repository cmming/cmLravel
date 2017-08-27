
@if($target_user->id != \Auth::id())
    <div>
        {{--吐过当前用户 已经关注了该用户，那么只能 取消关注，--}}
        @if(\Auth::user()->hasStart($target_user->id))
            <button class="btn btn-default like-button" like-value="1" like-user="{{$target_user->id}}" type="button">取消关注</button>
        @else
            <button class="btn btn-default like-button" like-value="0" like-user="{{$target_user->id}}" type="button">关注
            </button>
        @endif
    </div>
@endif