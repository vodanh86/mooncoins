
<div class="sc-dkPtyc gnliEL">
@foreach ($comments as $comment)
<article class="sc-gsDJrp jXLjZO">
    <div style="padding-bottom: 15px;">
        <div class="TopRow">
            <div class="TopRowLeft">
            <div style="background: rgb(27, 61, 80); width: 40px; height: 40px; border-radius: 50%; display: flex; justify-content: center; align-items: center; transition: all 0.5s ease 0s;"><img src='{{isset($users[$comment->commented_id]) ? $users[$comment->commented_id]->avatar : "https://lh3.googleusercontent.com/a/AATXAJyXCjGz0eV_iXGFaKglVrALnh6_MV-lJWO-LQBh=s96-c"}}' style="width: 40px; height: 40px; border-radius: 50%;"></div>
            </div>
            <div class="TopRowRight">
            <div class="TimeAndName">
                <div class="Name">{{isset($users[$comment->commented_id]) ? $users[$comment->commented_id]->name : "Anonymous"}}</div>
                <span style="float: left; font-size: 9px; padding: 3px;"><time>{{$comment->created_at}}</time></span>
            </div>
            <div class="CommentContent">{{$comment->comment}} </div>
            </div>
        </div>
    </div>
</article>
@endforeach
</div>