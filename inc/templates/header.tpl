<!DOCTYPE html>
<html lang=en>
<head>
<meta charset="utf-8">
<title>{{if $title}}{{$title}} | {{/if}}{{$blog.title}}</title>
<link href=inc/css/style.css rel=stylesheet />

<link rel=alternate type=application/rss+xml title="RSS Feed" href="?p=feed" />

{{if $headerCode}}
{{$headerCode}}

{{/if}}
</head>
<body>
<header id="masthead" class="site-header" role="banner">
	<div class="container">
		
		<div class="gravatar"><img src="https://secure.gravatar.com/avatar/8e85a3db943a53e5baa1a2e197d08118/?s=100" alt="Gravatar" /></div><!--/ author -->
		
		<div id="brand">
			<h1 class="site-title"><a href="{{$blog.url}}" title="{{$blog.title}}" rel="home">{{$blog.title}}</a> &mdash; <span>{{$blog.subtitle}}</span></h1>
		</div><!-- /brand -->
	
		<nav role="navigation" class="site-navigation main-navigation">
			<ul><li><a href="?p=archive">Archive</a></li>
			<li><a href="?p=colophon">Colophon</a></li>
			<li><a href="?p=about">About</a></li></ul>
		</nav><!-- .site-navigation .main-navigation -->
		
		<div class="clear"></div>
	</div><!--/container -->
		
</header><!-- #masthead .site-header -->

<div class="container">

	<div id="primary">
		<div id="content" role="main">