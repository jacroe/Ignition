{{include file="header.tpl" title=$post.title}}
<article class="post-{{$post.type}}">
<header>
<h1>{{$post.title}}</h1>
<p>{{$post.author}} <span style="color:#000;">|</span> <time datetime="{{$post.date}}">{{$post.timeAgo}}</time> <span style="color:#000;">|</span> {{$post.loc}}</p>
</header>
{{$post.article|markdown}}
</article>
{{include file="footer.tpl"}}