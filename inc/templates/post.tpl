{{include file="header.tpl" title=$post.title}}
			<article class="post">
								
				<h1 class="title">{{$post.title}}</h1>
				
				<div class="post-meta">{{$post.author}} | <time datetime="{{$post.html5Date}}" title="{{$post.date}}">{{$post.timeAgo}}</time> | {{$post.loc}}</div><!--/post-meta -->

				<div class="the-content">
					{{$post.article|markdown}}
				</div><!-- the-content -->
			</article>
{{include file="footer.tpl"}}