<!DOCTYPE html>
<html lang=en>
<head>
<meta charset="utf-8">
<title>{{if $post_title}}{{$post_title}} | {{/if}}{{$blog_title}}</title>
<link href='http://fonts.googleapis.com/css?family=Bevan' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=EB+Garamond' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Cardo' rel='stylesheet' type='text/css'>
<link href=inc/css/default.css rel=stylesheet type=text/css />
<link rel=alternate type=application/rss+xml title="RSS Feed" href="?p=feed" />
{{if $headerCode}}
{{$headerCode}}
{{/if}}
</head>
<body>
<header>
{{if $post_title}}<h1 id=title><a href=index.php>&larr; {{$blog_title}}</a></h1>
<h1>{{$post_title}}</h1>
{{else}}<h1>{{$blog_title}}</h1>
{{/if}}
{{if $post_type != "page" && isset($post_type)}}
<p class=byline>{{$post_author}} <span style="color:#000;">|</span> <a href="?id={{$post_slug}}" title="{{$post_date}}">{{$post_timeAgo}} ago</a> <span style="color:#000;">|</span> {{$post_loc}}</p>
{{/if}}
</header>