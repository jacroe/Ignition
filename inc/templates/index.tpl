{{include file="header.tpl"}}
<article>
{{if $posts}}
{{foreach $posts as $post}}
<h1><a href="?id={{$post.slug}}">{{$post.title}}</a></h1>
<p class=byline>{{$post.author}} <span style="color:#000;">|</span> <a title="{{$post.date}}">{{$post.timeAgo}}</a> <span style="color:#000;">|</span> {{$post.loc}}</p>
{{$post.article|markdown}}
{{/foreach}}
{{else}}
{{include file="empty.tpl"}}
{{/if}}
</article>
{{include file="footer.tpl"}}