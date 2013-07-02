<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
<channel>
<atom:link href="{{$blog.url}}?p=feed" rel="self" type="application/rss+xml" />
	<title>{{$blog.title}}</title>
	<link>{{$blog.url}}</link>
	<description>{{$blog.subtitle}}</description>
	{{foreach $posts as $post}}
	<item>
		<title>{{$post.title}}</title>
		<link>{{$blog.url}}?id={{$post.slug}}</link>
		<guid>{{$blog.url}}?id={{$post.slug}}</guid>
		<pubDate>{{$post.date}}</pubDate>
		<description><![CDATA[{{$post.article|markdown}}]]></description>
	</item>
	{{/foreach}}
</channel>
</rss>