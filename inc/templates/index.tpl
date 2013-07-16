{{include file="header.tpl"}}
{{if $posts}}
{{foreach $posts as $post}}
{{if $post.type == "post"}}
<article class="index type-{{$post.type}}">
<header>
<h1><a href="{{$blog.url}}?id={{$post.slug}}">{{$post.title}}</a></h1>
<p>{{$post.author}} <span style="color:#000;">|</span> <time datetime="{{$post.date}}">{{$post.timeAgo}}</time> <span style="color:#000;">|</span> {{$post.loc}}</p>
</header>
{{$post.article|markdown}}
</article>
{{else if $post.type=="link"}}
<article class="index type-link">
<header>
<h1><a href="{{$post.link}}">{{$post.title}} &rarr;</a></h1>
<p>{{$post.author}} <span style="color:#000;">|</span> <time datetime="{{$post.date}}">{{$post.timeAgo}}</time> <span style="color:#000;">|</span> {{$post.loc}}</p>
</header>
{{$post.article|markdown}}
</article>
{{else if $post.type=="aside"}}
<article class="index type-aside">
{{$post.article|markdown}}
</article>
{{/if}}
{{/foreach}}
{{else}}
{{include file="empty.tpl"}}
{{/if}}
{{include file="footer.tpl"}}