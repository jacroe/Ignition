<?php

function ign_posts_get($num = 5)
{
	foreach (array_reverse(glob(IGN_PATH."data/posts/*.json")) as $post)
	{
		$jsonPost = json_decode(file_get_contents($post));
		$slug = str_replace(IGN_PATH."data/posts/", "", str_replace(".json", "", $post));
		$posts[] = array("title"=>$jsonPost->title, "author"=>$jsonPost->author, "slug"=>$slug, "date"=>$jsonPost->date, "timeAgo"=>ign_timeAgo($jsonPost->date), "loc"=>$jsonPost->loc, "excerpt"=>$jsonPost->excerpt, "article"=>$jsonPost->article, "type"=>$jsonPost->type);
		if (count($posts) >= $num && $num != -1) break;
	}

	return $posts;
}

function ign_posts_getBySlug($slug)
{
	if(file_exists(IGN_PATH."data/posts/$slug.json"))
	{
		$jsonPost = json_decode(file_get_contents(IGN_PATH."data/posts/$slug.json"));
		return array("title"=>$jsonPost->title, "author"=>$jsonPost->author, "slug"=>$slug, "date"=>$jsonPost->date, "timeAgo"=>ign_timeAgo($jsonPost->date), "loc"=>$jsonPost->loc, "excerpt"=>$jsonPost->excerpt, "article"=>$jsonPost->article, "type"=>$jsonPost->type);
	}
	else
		return false;
}