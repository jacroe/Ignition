{{include file="header.tpl" title="Archive"}}
{{if $posts}}
					<article class="post">
					
						<h1 class="title">Archive</h1>
						
						<div class="the-content">
							<p>
{{foreach $posts as $post}}
							<a href="?id={{$post.slug}}">{{$post.title}}</a> &mdash; Posted {{$post.date|date_format}}<br />
{{/foreach}}
							</p>
						</div><!-- the-content -->
						
					</article>

</article>
{{else}}
{{include file="empty.tpl"}}
{{/if}}
{{include file="footer.tpl"}}