{{include file="header.tpl" title=$post.title}}
			<article class="post">
								
				<h1 class="title">
{{if $post.type == "link"}}
					<a href="{{$post.link}}" title="{{$post.title}}">
						{{$post.title}} &rarr;
					</a>
{{else}}
					{{$post.title}}
{{/if}}
				</h1>
				
				<div class="post-meta">{{$post.author}} | <time datetime="{{$post.html5Date}}" title="{{$post.date}}">{{$post.timeAgo}}</time> | {{$post.location}}{{if $post.tags}} | Tags: {{foreach $post.tags as $pTag}}<a href="?tag={{$pTag}}">{{$pTag}}</a> {{/foreach}}{{/if}}</div><!--/post-meta -->

				<div class="the-content">
					{{if $post.type == "photo"}}<p><img src="{{$post.photo}}" alt="{{$post.title}}" title="{{$post.title}}" /></p>{{/if}}
					{{$post.article}}
				</div><!-- the-content -->
			</article>
{{include file="footer.tpl"}}