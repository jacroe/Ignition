{{include file="header.tpl"}}
{{if $posts}}
{{foreach $posts as $post}}
<article class="post">
	<h1 class="title">
		<a href="?id={{$post.slug}}" title="{{$post.title}}">
			{{$post.title}}
		</a>
	</h1>
	<div class="the-content">
		{{$post.article|markdown}}
	</div><!-- the-content -->
	
</article>

{{/foreach}}
{{else}}
<article class="post error">
	<h1 class="404">Nothing posted yet</h1>
</article>
{{/if}}
{{include file="footer.tpl"}}