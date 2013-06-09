<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
<channel>
<atom:link href="{{$blog_url}}?p=feed" rel="self" type="application/rss+xml" />
	<title>{{$blog_title}}</title>
	<link>{{$blog_url}}</link>
	<description>{{$blog_subtitle}}</description>
	{{foreach $posts as $post}}
	<item>
		<title>{{$post.title}}</title>
		<link>{{$blog_url}}?id={{$post.slug}}</link>
		<guid>{{$blog_url}}?id={{$post.slug}}</guid>
		<pubDate>{{$post.date}}</pubDate>
		<description><![CDATA[{{$post.article|markdown}}]]></description>
	</item>
	{{/foreach}}
</channel>
</rss>