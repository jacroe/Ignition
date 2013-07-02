<?php
require_once("ignition.php");
$blog = array("title"=>IGN_TITLE, "subtitle"=>IGN_SUBTITLE, "url"=>IGN_URL);
$smarty->assign("blog", $blog);

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
		$smarty->assign("page", $page);
		$smarty->assign("type", "page");
		$smarty->display("page.tpl");
	}
	else
		$smarty->display("404.tpl");
}
elseif($_GET["id"])
{
	if($post = ign_posts_getBySlug($_GET["id"]))
	{
		$post["date"] = ign_html5Time($post["date"]);
		$smarty->assign("post", $post);
		$smarty->display("post.tpl");
	}
	else
		$smarty->display("404.tpl");
}
else
{
	$posts = ign_posts_get(-1);
	$smarty->assign("posts", $posts);
	$smarty->display("index.tpl");
}
