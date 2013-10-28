{{include file="header.tpl" title=$page.title}}
					<article class="post">
					
						<h1 class="title">{{$page.title}}</h1>
						
						<div class="the-content">
							{{$page.article|markdown}}
						</div><!-- the-content -->
						
					</article>
{{include file="footer.tpl"}}