{{include file="header.tpl"}}
{{if $posts}}
{{foreach $posts as $post}}
<article class="{{$post.type}}">
{{if $post.type == "post"}}
<h1><a href="?id={{$post.slug}}">{{$post.title}}</a></h1>
<p class=byline><a title="{{$post.date}}">{{$post.timeAgo}} ago</a> <span style="color:#000;">|</span> {{$post.loc}}</p>
{{$post.article}}
{{elseif $post.type == "aside"}}
{{$post.article}}
<p class="byline"><a href="?id={{$post.slug}}">&#x25C6; {{$post.timeAgo}}</a></p>
{{/if}}
</article>

{{/foreach}}
{{else}}
{{include file="empty.tpl"}}
{{/if}}
{{include file="footer.tpl"}}