{{include file="header.tpl" title=$post.title}}
			<article class="post">
								
				<h1 class="title">{{$post.title}}</h1>
				
				<div class="the-content">
					{{$post.article|markdown}}
				</div><!-- the-content -->
			</article>
{{include file="footer.tpl"}}