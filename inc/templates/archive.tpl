{{include file="header.tpl" title="Archive"}}
{{if $posts}}
<article>
<header>
<h1>Archive</h1>
</header>
{{foreach $posts as $post}}
{{if ! isset($month) or $month != ($post.date|date_format:"%B %Y")}}
{{assign var=month value=($post.date|date_format:"%B %Y")}}
<h1>{{$month}}</h1>
{{/if}}
<a href="?id={{$post.slug}}">{{$post.title}}</a> - Posted {{$post.date|date_format}}<br />
{{/foreach}}
</article>
{{else}}
{{include file="empty.tpl"}}
{{/if}}
{{include file="footer.tpl"}}