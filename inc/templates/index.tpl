{{include file="header.tpl"}}
{{if $posts}}
<article>
<p>
{{foreach $posts as $post}}
<strong><a href="?id={{$post.slug}}" class="bloglink link-{{$post.type}}">{{$post.title}}</a></strong> &ndash; {{$post.timeAgo}}<br />
{{/foreach}}
</p>
</article>
{{else}}
{{include file="empty.tpl"}}
{{/if}}
{{include file="footer.tpl"}}