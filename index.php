<?php
require_once("ignition.sample.php");
$smarty->assign("blog_title", IGN_TITLE);
$smarty->assign("blog_subtitle", IGN_SUBTITLE);
$smarty->assign("blog_url", IGN_URL);
if($_GET["id"])
{
	$slug = $_GET["id"];
	if(file_exists("posts/$slug.json"))
	{
		$post = json_decode(file_get_contents("posts/$slug.json"));

		$smarty->assign("post_title", $post->title);
		$smarty->assign("post_author", $post->author);
		$smarty->assign("post_slug", $slug);
		$smarty->assign("post_date", $post->date);
		$smarty->assign("post_timeAgo", ign_timeAgo($post->date));
		$smarty->assign("post_loc", $post->loc);
		$smarty->assign("post_article", $post->article);
		$smarty->display("post.tpl");
	}
	else
		$smarty->display("404.tpl");
}
else
{
	foreach (array_reverse(glob("posts/*.json")) as $post)
	{
		$jsonPost = json_decode(file_get_contents($post));
		if(time() < strtotime($jsonPost->date)) continue;
		$slug = str_replace("posts/", "", str_replace(".json", "", $post));
		$posts[] = array("title"=>$jsonPost->title, "author"=>$jsonPost->author, "slug"=>$slug, "date"=>$jsonPost->date, "timeAgo"=>ign_timeAgo($jsonPost->date), "loc"=>$jsonPost->loc, "excerpt"=>$jsonPost->excerpt, "article"=>$jsonPost->article);
		if (count($posts) >= 5) break;
	}
	$smarty->assign("posts", $posts);
	if($_GET["p"] == "feed")
	{
		header('Content-type: application/rss+xml');
		$smarty->display("rss.tpl");
	}
	else $smarty->display("index.tpl");
}