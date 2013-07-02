<!DOCTYPE html>
<html lang=en>
<head>
<meta charset="utf-8">
<title>{{if $title}}{{$title}} | {{/if}}{{$blog.title}}</title>
<link href="http://fonts.googleapis.com/css?family=Bevan" rel="stylesheet" />
<link href="http://fonts.googleapis.com/css?family=EB+Garamond" rel="stylesheet" />
<link href="http://fonts.googleapis.com/css?family=Cardo" rel="stylesheet" />
<link href=inc/css/default.css rel=stylesheet />
<link rel=alternate type=application/rss+xml title="RSS Feed" href="?p=feed" />
{{if $headerCode}}
{{$headerCode}}
{{/if}}
</head>
<body>
<header>
{{if $title}}
<h1 id="title"><a href=./>&larr; {{$blog.title}}</a></h1>
{{else}}
<h1>{{$blog.title}}</h1>
{{/if}}
</header>