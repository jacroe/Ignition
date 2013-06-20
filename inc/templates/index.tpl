{{include file="header.tpl"}}
{{if $posts}}
<article>
<p>
{{foreach $posts as $post}}
<img src="inc/images/{{$post.type}}.png" /> <strong><a href="?id={{$post.slug}}">{{$post.title}}</a></strong> &ndash; {{$post.timeAgo}}<br />
{{/foreach}}
</p>
</article>
{{else}}
{{include file="empty.tpl"}}
{{/if}}
{{include file="footer.tpl"}}