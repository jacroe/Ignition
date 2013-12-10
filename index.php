<?php
require_once("ignition.php");
$blog = array("title"=>IGN_TITLE, "subtitle"=>IGN_SUBTITLE, "url"=>IGN_URL);
$user = array("name"=>USER_NAME, "email"=>USER_EMAIL, "location"=>USER_LOCATION);
$smarty->assign("blog", $blog);
$smarty->assign("user", $user);

if($_GET["p"])
{
	if($_GET["p"] == "feed")
	{
		header('Content-type: application/rss+xml');
		$posts = ign_posts_get(10);
		$smarty->assign("posts", $posts);
		$smarty->display("rss.tpl");
	}
	elseif($_GET["p"] == "archive")
	{
		$posts = ign_posts_get(-1);
		$smarty->assign("posts", $posts);
		$smarty->display("archive.tpl");
	}
	elseif($page = ign_pages_getBySlug($_GET["p"]))
	{
		$smarty->assign("page", $page);
		$smarty->assign("type", "page");
		$smarty->display("page.tpl");
	}
	else
	{
		header('HTTP/1.0 404 Not Found');
		$smarty->display("404.tpl");
	}
}
elseif($_GET["id"])
{
	if($post = ign_posts_getBySlug($_GET["id"]))
	{
		$smarty->assign("post", $post);
		$smarty->display("post.tpl");
	}
	else
	{
		header('HTTP/1.0 404 Not Found');
		$smarty->display("404.tpl");
	}
}
elseif($_GET["tag"])
{
	$taggedPosts = ign_posts_getByTag($_GET["tag"]);
	$smarty->assign("posts", $taggedPosts);
	$smarty->assign("tag", $_GET["tag"]);
	$smarty->display("tag.tpl");
}
else
{
	$posts = ign_posts_get(5);
	$smarty->assign("posts", $posts);
	$smarty->display("index.tpl");
}
