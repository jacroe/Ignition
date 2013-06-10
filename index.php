<?php
require_once("ignition.sample.php");
$smarty->assign("blog_title", IGN_TITLE);
$smarty->assign("blog_subtitle", IGN_SUBTITLE);
$smarty->assign("blog_url", IGN_URL);

if($_GET["p"])
{
	if($_GET["p"] == "feed")
	{
		header('Content-type: application/rss+xml');
		$posts = ign_posts_get();
		$smarty->assign("posts", $posts);
		$smarty->display("rss.tpl");
	}
	elseif($page = ign_pages_getBySlug($_GET["p"]))
	{
		$smarty->assign("post_title", $page->title);
		$smarty->assign("post_article", $page->article);
		$smarty->assign("post_type", "page");
		$smarty->display("page.tpl");
	}
	else
		$smarty->display("404.tpl");
}
elseif($_GET["id"])
{
	if($post = ign_posts_getBySlug($_GET["id"]))
	{
		$smarty->assign("post_title", $post->title);
		$smarty->assign("post_author", $post->author);
		$smarty->assign("post_slug", $_GET["id"]);
		$smarty->assign("post_date", $post->date);
		$smarty->assign("post_timeAgo", ign_timeAgo($post->date));
		$smarty->assign("post_loc", $post->loc);
		$smarty->assign("post_article", $post->article);
		$smarty->assign("post_type", $post->type);
		$smarty->display("post.tpl");
	}
	else
		$smarty->display("404.tpl");
}
else
{
	$posts = ign_posts_get();
	$smarty->assign("posts", $posts);
	$smarty->display("index.tpl");
}