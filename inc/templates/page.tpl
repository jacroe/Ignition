{{include file="header.tpl" title=$page.title}}
<article>
<header>
<h1>{{$page.title}}</h1>
</header>
{{$page.article|markdown}}
</article>
{{include file="footer.tpl"}}